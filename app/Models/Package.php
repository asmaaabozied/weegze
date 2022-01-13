<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Translatable;

    public $translatedAttributes = [ 'title', 'subtitle'];
    protected $fillable = ['user_id','price'];

    public $timestamps = false;

}
