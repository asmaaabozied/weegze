<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Page extends Model
{
    use Translatable;

    public $translatedAttributes = ['title','details'];
    protected $fillable = [ 'meta_tag', 'meta_description','title','slug'];
    public $timestamps = false;
}
