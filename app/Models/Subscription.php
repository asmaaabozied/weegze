<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use Translatable;

    public $translatedAttributes = ['title','details'];

    protected $fillable = ['currency','currency_code','price','days','allowed_products','valueday'];

    public $timestamps = false;

    public function subs()
    {
        return $this->hasMany('App\Models\UserSubscription','subscription_id');
    }

}
