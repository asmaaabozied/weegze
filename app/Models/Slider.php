<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Translatable;
    public $translatedAttributes = [ 'subtitle_text', 'title_text', 'details_text'];

    protected $fillable = ['subtitle_size','subtitle_color','subtitle_anime','title_size','title_color','title_anime','details_size','details_color','details_anime','photo','position','link'];
    public $timestamps = false;
}
