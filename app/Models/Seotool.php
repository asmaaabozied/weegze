<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class Seotool extends Model
{
    use Translatable;
    public $translatedAttributes = [ 'google_analytics','meta_keys'];

    protected $fillable = ['google_analytics','meta_keys'];
    public $timestamps = false;
}
