<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Product::where('product_type','=','affiliate')->orderBy('id','desc')->get();

         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)

                            ->editColumn('price', function(Product $data) {
                                $sign = Currency::where('is_default','=',1)->first();
                                $price = $sign->sign.$data->price;
                                return  $price;
                            })
                            ->editColumn('stock', function(Product $data) {
                                $stck = (string)$data->stock;
                                if($stck == "0")
                                return "Out Of Stock";
                                elseif($stck == null)
                                return "Unlimited";
                                else
                                return $data->stock;
                            })
                            ->addColumn('status', function(Product $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-prod-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>'.trans('site.active').'</option><<option data-val="0" value="'. route('admin-prod-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>'.trans('site.inactive').'</option>/select></div>';
                            })
                            ->addColumn('action', function(Product $data) {
                                return '<div class="godropdown"><button class="go-dropdown-toggle"> '.trans('site.action').'<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-import-edit',$data->id) . '"> <i class="fas fa-edit"></i> '.trans('site.edit').'</a><a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="'.$data->id.'"><i class="fas fa-eye"></i> '.trans('site.View Gallery').'</a><a href="' . route('admin-prod-feature',$data->id) . '" class="feature"> <i class="fas fa-star"></i> '.trans('site.Highlight').'</a><a href="javascript:;" data-href="' . route('admin-affiliate-prod-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>'.trans('site.delete').' </a></div></div>';
                            })
                            ->rawColumns(['name', 'status', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.productimport.index');
    }

    //*** GET Request
    public function createImport()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default','=',1)->first();

        $currency_All = Currency::get();
        $currency = $currency_All->mapWithKeys(function ($curr, $key) use ($currency_All) {
            return [$curr['key'] => $currency_All];
        })->map(function ($item) {
            return $item->pluck('value', 'key');
        });

        $baseChange = $currency[$sign->key];

        $currecny_json = $currency->map(function ($items, $parentkey) use ($baseChange) {
            $from = $baseChange[$parentkey];
            $result = [];
            $final = [];
            foreach ($items as $key => $item) {
                $from_currecny = $baseChange[$key];
                $result[$key] = round(($from_currecny / $from), 2);
            }

            return $result;

        })->toArray();
        return view('admin.productimport.createone',compact('cats','sign','currecny_json'));
    }

    //*** GET Request
    public function importCSV()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default','=',1)->first();
        return view('admin.productimport.importcsv',compact('cats','sign'));
    }

    //*** POST Request
    public function uploadUpdate(Request $request,$id)
    {
        //--- Validation Section
        $rules = [
          'image' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Product::findOrFail($id);

        //--- Validation Section Ends
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().str_random(8).'.png';
        $path = 'assets/images/products/'.$image_name;
        file_put_contents($path, $image);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/products/'.$data->photo)) {
                        unlink(public_path().'/assets/images/products/'.$data->photo);
                    }
                }
                        $input['photo'] = $image_name;
         $data->update($input);


        return response()->json(['status'=>true,'file_name' => $image_name]);
    }

    //*** POST Request
    public function store(Request $request)
    {



        $request->validate([
            'photo' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',
            'currency.*' => 'required|numeric|min:0',
            'price' => 'required|same:currency.0',


            'sku'=>'required',




        ]);
//        if($request->image_source == 'file')
//        {
//            //--- Validation Section
//            $rules = [
////                   'photo'      => 'required',
////                   'file'       => 'mimes:zip'
//                    ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
//        //--- Validation Section Ends
//
//        }

        //--- Logic Section
            $data = new Product;
            $sign = Currency::where('is_default','=',1)->first();
            $input = $request->all();

            // Check File
            if ($file = $request->file('file'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/files',$name);
                $input['file'] = $name;
            }

            $input['photo'] = "";
            if($request->photo != ""){
                $image = $request->photo;
                list($type, $image) = explode(';', $image);
                list(, $image)      = explode(',', $image);
                $image = base64_decode($image);
                $image_name = time().str_random(8).'.png';
                $path = 'assets/images/products/'.$image_name;
                file_put_contents($path, $image);
                $input['photo'] = $image_name;
            }else{
                $input['photo'] = $request->photolink;
            }

            // Check Physical
            if($request->type == "Physical")
            {

//                    //--- Validation Section
//                    $rules = ['sku'      => 'min:8|unique:products'];
//
//                    $validator = Validator::make($request->all(), $rules);
//
//                    if ($validator->fails()) {
//                        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//                    }
                    //--- Validation Section Ends



            // Check Condition
            if ($request->product_condition_check == ""){
                $input['product_condition'] = 0;
            }

            // Check Shipping Time
            if ($request->shipping_time_check == ""){
                $input['ship'] = null;
            }

            // Check Size
            if(empty($request->size_check ))
            {
                $input['size'] = null;
                $input['size_qty'] = null;
                $input['size_price'] = null;
            }
            else{
                    if(in_array(null, $request->size) || in_array(null, $request->size_qty))
                    {
                        $input['size'] = null;
                        $input['size_qty'] = null;
                        $input['size_price'] = null;
                    }
                    else
                    {
                        $input['size'] = implode(',', $request->size);
                        $input['size_qty'] = implode(',', $request->size_qty);
                        $input['size_price'] = implode(',', $request->size_price);
                    }
            }

            // Check Color
            if(empty($request->color_check))
            {
                $input['color'] = null;
            }
            else{
                $input['color'] = implode(',', $request->color);
            }

            // Check Measurement
            if ($request->mesasure_check == "")
             {
                $input['measure'] = null;
             }

            }

            // Check Seo
        if (empty($request->seo_check))
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
         else {
        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
         }

             // Check License

            if($request->type == "License")
            {

                if(in_array(null, $request->license) || in_array(null, $request->license_qty))
                {
                    $input['license'] = null;
                    $input['license_qty'] = null;
                }
                else
                {
                    $input['license'] = implode(',,', $request->license);
                    $input['license_qty'] = implode(',', $request->license_qty);
                }

            }

             // Check Features
            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;
                $input['colors'] = null;
            }
            else
            {
                $input['features'] = implode(',', str_replace(',',' ',$request->features));
                $input['colors'] = implode(',', str_replace(',',' ',$request->colors));
            }

            //tags
            if (!empty($request->tags))
             {
                $input['tags'] = implode(',', $request->tags);
             }

            // Conert Price According to Currency
             $input['price'] = ($input['price'] / $sign->value);
             $input['previous_price'] = ($input['previous_price'] / $sign->value);
             $input['product_type'] = "affiliate";

            // Save Data
                $data->fill($input)->save();

            // Set SLug
                $prod = Product::find($data->id);

//                if($prod->type != 'Physical'){
//                    $prod->slug = str_slug($data->name,'-').'-'.strtolower(str_random(3).$data->id.str_random(3));
//                }
//                else {
//                    $prod->slug = str_slug($data->name,'-').'-'.strtolower($data->sku);
//                }
//                $fimageData = public_path().'/assets/images/products/'.$prod->photo;
//                if(filter_var($prod->photo,FILTER_VALIDATE_URL)){
//                    $fimageData = $prod->photo;
//                }
//
//                $img = Image::make($fimageData)->resize(285, 285);
//                $thumbnail = time().str_random(8).'.jpg';
//                $img->save(public_path().'/assets/images/thumbnails/'.$thumbnail);
//                $prod->thumbnail  = $thumbnail;
//                $prod->update();

            // Add To Gallery If any
                $lastid = $data->id;
                if ($files = $request->file('gallery')){
                    foreach ($files as  $key => $file){
//                        if(in_array($key, $request->galval))
//                        {
                    $gallery = new Gallery;
                    $name = time().$file->getClientOriginalName();
                    $img = Image::make($file->getRealPath())->resize(800, 800);
                    $thumbnail = time().str_random(8).'.jpg';
                    $img->save(public_path().'/assets/images/galleries/'.$name);
                    $gallery['photo'] = $name;
                    $gallery['product_id'] = $lastid;
                    $gallery->save();
//                        }
                    }
                }
        //logic Section Ends
        session()->flash('success', __('site.added_successfully'));
        return back();
        //--- Redirect Section
//        $msg = 'New Affiliate Product Added Successfully.<a href="'.route('admin-import-index').'">View Product Lists.</a>';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $cats = Category::all();
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();


        $currency_All = Currency::get();
        $currency = $currency_All->mapWithKeys(function ($curr, $key) use ($currency_All) {
            return [$curr['key'] => $currency_All];
        })->map(function ($item) {
            return $item->pluck('value', 'key');
        });

        $baseChange = $currency[$sign->key];

        $currecny_json = $currency->map(function ($items, $parentkey) use ($baseChange) {
            $from = $baseChange[$parentkey];
            $result = [];
            $final = [];
            foreach ($items as $key => $item) {
                $from_currecny = $baseChange[$key];
                $result[$key] = round(($from_currecny / $from), 2);
            }

            return $result;

        })->toArray();
        return view('admin.productimport.editone',compact('cats','data','sign','currecny_json'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        $prod = Product::find($id);

        //--- Validation Section Ends
        $request->validate([
            'photo' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',
            'currency.*' => 'required|numeric|min:0',
            'price' => 'required|same:currency.0',


            'sku'=>'required',




        ]);

        //-- Logic Section
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();

            //Check Types
            if($request->type_check == 1)
            {
                $input['link'] = null;
            }
            else
            {
                if($data->file!=null){
                        if (file_exists(public_path().'/assets/files/'.$data->file)) {
                        unlink(public_path().'/assets/files/'.$data->file);
                    }
                }
                $input['file'] = null;
            }

        if($request->image_source == 'file'){
                $input['photo'] = $request->photo;
            }else{
                $input['photo'] = $request->photolink;
            }


            // Check Physical
            if($data->type == "Physical")
            {

                    //--- Validation Section
//                    $rules = ['sku' => 'min:8|unique:products,sku,'.$id];
//
//                    $validator = Validator::make($request->all(), $rules);
//
//                    if ($validator->fails()) {
//                        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//                    }
                    //--- Validation Section Ends


                        // Check Condition
                        if ($request->product_condition_check == ""){
                            $input['product_condition'] = 0;
                        }

                        // Check Shipping Time
                        if ($request->shipping_time_check == ""){
                            $input['ship'] = null;
                        }

                        // Check Size

                        if(empty($request->size_check ))
                        {
                            $input['size'] = null;
                            $input['size_qty'] = null;
                            $input['size_price'] = null;
                        }
                        else{
                                if(in_array(null, $request->size) || in_array(null, $request->size_qty) || in_array(null, $request->size_price))
                                {
                                    $input['size'] = null;
                                    $input['size_qty'] = null;
                                    $input['size_price'] = null;
                                }
                                else
                                {
                                    $input['size'] = implode(',', $request->size);
                                    $input['size_qty'] = implode(',', $request->size_qty);
                                    $input['size_price'] = implode(',', $request->size_price);
                                }
                        }

                        // Check Color
                        if(empty($request->color_check ))
                        {
                            $input['color'] = null;
                        }
                        else{
                            if (!empty($request->color))
                             {
                                $input['color'] = implode(',', $request->color);
                             }
                            if (empty($request->color))
                             {
                                $input['color'] = null;
                             }
                        }

                        // Check Measure
                    if ($request->measure_check == "")
                     {
                        $input['measure'] = null;
                     }
            }

            // Check Seo
        if (empty($request->seo_check))
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
         else {
        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
         }

        // Check License
        if($data->type == "License")
        {

        if(!in_array(null, $request->license) && !in_array(null, $request->license_qty))
        {
            $input['license'] = implode(',,', $request->license);
            $input['license_qty'] = implode(',', $request->license_qty);
        }
        else
        {
            if(in_array(null, $request->license) || in_array(null, $request->license_qty))
            {
                $input['license'] = null;
                $input['license_qty'] = null;
            }
            else
            {
                $license = explode(',,', $prod->license);
                $license_qty = explode(',', $prod->license_qty);
                $input['license'] = implode(',,', $license);
                $input['license_qty'] = implode(',', $license_qty);
            }
        }

        }
            // Check Features
            if(!in_array(null, $request->features) && !in_array(null, $request->colors))
            {
                    $input['features'] = implode(',', str_replace(',',' ',$request->features));
                    $input['colors'] = implode(',', str_replace(',',' ',$request->colors));
            }
            else
            {
                if(in_array(null, $request->features) || in_array(null, $request->colors))
                {
                    $input['features'] = null;
                    $input['colors'] = null;
                }
                else
                {
                    $features = explode(',', $data->features);
                    $colors = explode(',', $data->colors);
                    $input['features'] = implode(',', $features);
                    $input['colors'] = implode(',', $colors);
                }
            }

        //Product Tags
        if (!empty($request->tags))
         {
            $input['tags'] = implode(',', $request->tags);
         }
        if (empty($request->tags))
         {
            $input['tags'] = null;
         }

         $input['price'] = $input['price'] / $sign->value;
         $input['previous_price'] = $input['previous_price'] / $sign->value;

         $data->update($input);

        // Set SLug
         $prod->slug = str_slug($data->name,'-').'-'.strtolower($data->sku);

        //-- Logic Section Ends

                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/thumbnails/'.$data->thumbnail)) {
//                        unlink(public_path().'/assets/images/thumbnails/'.$data->thumbnail);
                    }
                }

        $fimageData = public_path().'/assets/images/products/'.$prod->photo;

        if(filter_var($prod->photo,FILTER_VALIDATE_URL)){
            $fimageData = $prod->photo;
        }

        $img = Image::make($fimageData)->resize(285, 285);
        $thumbnail = time().str_random(8).'.jpg';
        $img->save(public_path().'/assets/images/thumbnails/'.$thumbnail);
        $prod->thumbnail  = $thumbnail;
        $prod->update();

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));

        return back();
//        $msg = 'Product Updated Successfully.<a href="'.route('admin-import-index').'">View Product Lists.</a>';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
