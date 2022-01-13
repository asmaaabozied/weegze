<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class PaymentGateway extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'details', 'subtitle'];
    protected $guarded=[];
    public $timestamps = false;
}
