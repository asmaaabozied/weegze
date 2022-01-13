<?php

namespace App\Models;

use App\Models\Currency;

use App\Models\Generalsetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Product extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'details', 'policy'];

    protected $fillable = ['user_id', 'category_id', 'product_type', 'affiliate_link', 'sku', 'subcategory_id',
        'childcategory_id', 'attributes', 'photo', 'size', 'size_qty', 'size_price', 'color',
        'price', 'previous_price', 'stock', 'status', 'views', 'tags', 'featured', 'best', 'top', 'hot', 'latest',
        'big', 'trending', 'sale', 'features', 'colors', 'product_condition', 'ship', 'meta_tag', 'meta_description',
        'youtube', 'type', 'file', 'license', 'license_qty', 'link', 'platform', 'region', 'licence_type', 'measure',
        'discount_date', 'is_discount', 'whole_sell_qty', 'whole_sell_discount', 'catalog_id', 'slug', 'tax_id',
        'price_dollars', 'price_egyptian', 'price_riyals', 'price_sudanese', 'discount_id', 'discount', 'typetax_id'
    ];

    public static function filterProducts($collection)
    {
        foreach ($collection as $key => $data) {
            if ($data->user_id != 0) {
//                if($data->user->is_vendor != 2){
                unset($collection[$key]);
//                }
            }
            if (isset($_GET['max'])) {
                if ($data->vendorSizePrice() >= $_GET['max']) {
                    unset($collection[$key]);
                }
            }
            $data->price = $data->vendorSizePrice();
        }
        return $collection;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function childcategory()
    {
        return $this->belongsTo('App\Models\Childcategory')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }


    public function tax()
    {
        return $this->belongsTo('App\Models\Tax', 'tax_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function clicks()
    {
        return $this->hasMany('App\Models\ProductClick');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report', 'user_id');
    }

    public function vendorPrice()
    {
        $gs = Generalsetting::findOrFail(1);
        $price = $this->price;
        if ($this->user_id != 0) {
            $price = $this->price + $gs->fixed_commission + ($this->price / 100) * $gs->percentage_commission;
        }


        return $price;
    }

    public function vendorSizePrice()
    {
        $gs = Generalsetting::findOrFail(1);
        $price = $this->price;
        if ($this->user_id != 0) {
            $price = $this->price + $gs->fixed_commission + ($this->price / 100) * $gs->percentage_commission;
        }
        if (!empty($this->size)) {
            $price += $this->size_price[0];
        }

        // Attribute Section

        $attributes = $this->attributes["attributes"];
        if (!empty($attributes)) {
            $attrArr = json_decode($attributes, true);
        }

        if (!empty($attrArr)) {
            foreach ($attrArr as $attrKey => $attrVal) {
                if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {

                    foreach ($attrVal['values'] as $optionKey => $optionVal) {
//                  $price += $attrVal['prices'][$optionKey];
                        // only the first price counts
                        break;
                    }

                }
            }
        }


        // Attribute Section Ends


        return $price;
    }


    public function setCurrency()
    {
        $gs = Generalsetting::findOrFail(1);
        $price = $this->price;
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        if ($curr->sign == 'SAR') {
//            $price = $this->price;

            $price = round($price * $curr->value, 2);

        } elseif ($curr->sign == '$') {
            $prices = round($price * $curr->value, 2);
//            $price = $this->price * 0.27;

        } elseif ($curr->sign == 'EG') {
            $prices = round($price * $curr->value, 2);
//            $price = $this->price * 4;

        } elseif ($curr->sign == 'SS') {

            $prices = round($price * $curr->value, 2);
//            $price = $this->price * 113;

        } else {
            $price = round($price * $curr->value, 2);
        }
//        elseif ($curr->sign=='$')
//        $price = round($price * $curr->value,2);
//        if($gs->currency_format == 0){
//            return $curr->sign.$price;
//        }
//
//        else{
//            return $price.$curr->sign;
//        }
    }


    public function showPrice()
    {
        $gs = Generalsetting::findOrFail(1);

        $price = $this->price;
        $discountType = $this->typetax_id;
        $discountvalue = $this->discount;


        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));

            $currs = $curr->products->where('id', $this->id);


        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
            $currs = $curr->products->where('id', $this->id);

        }

        foreach ($currs as $value) {
            $price = $value->pivot->values;

        }


        if ($this->typetax_id == 'Fixed value') {
            $price = $price - $discountvalue;


        } elseif ($this->typetax_id == 'Percentage') {
            $price = $price - ($price * ($discountvalue / 100));

        }
        elseif($this->typetax_id == null){

            $price=$price;
        }

        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }


    }


    public function currenies()
    {
        return $this->belongsToMany(Currency::class)->withPivot('values');
    }


    public function SHOWDATAPRICE()
    {
        $gs = Generalsetting::findOrFail(1);

        $price = $this->price;
        $discountType = $this->typetax_id;
        $discountvalue = $this->discount;


        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));

            $currs = $curr->products->where('id', $this->id);


        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
            $currs = $curr->products->where('id', $this->id);

        }

        foreach ($currs as $value) {
            $price = $value->pivot->values;

        }


        if ($this->typetax_id == 'Fixed value') {
            $price = $price - $discountvalue;


        } elseif ($this->typetax_id == 'Percentage') {
            $price = $price - ($price * ($discountvalue / 100));

        }

        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }


    }

    public function showProductCurrency($id)
    {
      return  Currency_Product::where('currency_id', $id)->where('product_id', $this->id)->first()->values ?? '';

    }

    public function showPreviousPrice()
    {
        $gs = Generalsetting::findOrFail(1);

        $price = $this->price;


        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));

            $currs = $curr->products->where('id', $this->id);


        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
            $currs = $curr->products->where('id', $this->id);

        }

        foreach ($currs as $value) {
            $price = $value->pivot->values;

        }


        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }


    }

//    public function showPreviousPrice()
//    {
//        $gs = Generalsetting::findOrFail(1);
//        $price = $this->price;
//
//        if ($this->user_id != 0) {
//            $price = $this->price;
//
////            $price = $this->price + $gs->fixed_commission + ($this->price/100) * $gs->percentage_commission ;
//        }
//
//        if (!empty($this->size)) {
//            $price += $this->size_price[0];
////            $price = $this->price;
//
//        }
//
//        // Attribute Section
//
//        $attributes = $this->attributes["attributes"];
//        if (!empty($attributes)) {
//            $attrArr = json_decode($attributes, true);
//        }
//        // dd($attrArr);
//        if (!empty($attrArr)) {
//            foreach ($attrArr as $attrKey => $attrVal) {
//                if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {
//
//                    foreach ($attrVal['values'] as $optionKey => $optionVal) {
//                        $price += $attrVal['prices'][$optionKey];
//                        // only the first price counts
//                        break;
//                    }
//
//                }
//            }
//        }
//
//
//        // Attribute Section Ends
//
//
//        if (Session::has('currency')) {
//            $curr = Currency::find(Session::get('currency'));
//        } else {
//            $curr = Currency::where('is_default', '=', 1)->first();
//        }
//
//
////        $price = round(($price) * $curr->value,2);
//        $price = $this->price;
//
//
//        if ($curr->sign == 'SAR') {
//            $price = $this->price;
//
//
////            $price = round($price * $curr->value,2);
//
//        } elseif ($curr->sign == '$') {
////            $prices = round($price * $curr->value,2);
//            $price = $this->price * 0.27;
//
//        } elseif ($curr->sign == 'EG') {
////            $prices = round($price * $curr->value,2);
//            $price = $this->price * 0.27 * 16;
//
//        } elseif ($curr->sign == 'SS') {
//
////            $prices = round($price * $curr->value,2);
//            $price = $this->price * 0.27 * 426;
//
//        } else {
//            $price = round($price * $curr->value, 2);
//        }
//
//
//        if ($gs->currency_format == 0) {
//            return $curr->sign . $price;
//        } else {
//            return $price . $curr->sign;
//        }
//
//
//    }


//    public function showPreviousPrice()
//    {
//        $gs = Generalsetting::findOrFail(1);
//        $price = $this->previous_price;
//        if (!$price) {
//            return '';
//        }
//        if ($this->user_id != 0) {
//            $price = $this->previous_price + $gs->fixed_commission + ($this->previous_price / 100) * $gs->percentage_commission;
//        }
//
//        if (!empty($this->size)) {
//            $price += $this->size_price[0];
//        }
//
//        // Attribute Section
//
//        $attributes = $this->attributes["attributes"];
//        if (!empty($attributes)) {
//            $attrArr = json_decode($attributes, true);
//        }
//        // dd($attrArr);
//        if (!empty($attrArr)) {
//            foreach ($attrArr as $attrKey => $attrVal) {
//                if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {
//
//                    foreach ($attrVal['values'] as $optionKey => $optionVal) {
//                        $price += $attrVal['prices'][$optionKey];
//                        // only the first price counts
//                        break;
//                    }
//
//                }
//            }
//        }
//
//
//        // Attribute Section Ends
//
//
//        if (Session::has('currency')) {
//            $curr = Currency::find(Session::get('currency'));
//        } else {
//            $curr = Currency::where('is_default', '=', 1)->first();
//        }
//        $price = round($price * $curr->value, 2);
//        if ($gs->currency_format == 0) {
//            return $curr->sign . $price;
//        } else {
//            return $price . $curr->sign;
//        }
//    }

    public static function convertPrice($price)
    {
        $gs = Generalsetting::findOrFail(1);
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $price = round($price * $curr->value, 2);
        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }
    }

    public static function vendorConvertPrice($price)
    {
        $gs = Generalsetting::findOrFail(1);

        $curr = Currency::where('is_default', '=', 1)->first();
        $price = round($price * $curr->value, 2);
        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }
    }

    public static function convertPreviousPrice($price)
    {
        $gs = Generalsetting::findOrFail(1);
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $price = round($price * $curr->value, 2);
        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }
    }

    public function showName()
    {
        $name = mb_strlen($this->name, 'utf-8') > 55 ? mb_substr($this->name, 0, 55, 'utf-8') . '...' : $this->name;
        return $name;
    }


    public function emptyStock()
    {
        $stck = (string)$this->stock;
        if ($stck == "0") {
            return true;
        }
    }

    public static function showTags()
    {
        $tags = null;
        $tagz = '';
        $name = Product::where('status', '=', 1)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            if (!empty($nm)) {
                foreach ($nm as $n) {
                    $tagz .= $n . ',';
                }
            }
        }
        $tags = array_unique(explode(',', $tagz));
        return $tags;
    }


    public function getSizeAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getSizeQtyAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getSizePriceAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getColorAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getTagsAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getMetaTagAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getFeaturesAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getColorsAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getLicenseAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',,', $value);
    }

    public function getLicenseQtyAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getWholeSellQtyAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getWholeSellDiscountAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }


}
