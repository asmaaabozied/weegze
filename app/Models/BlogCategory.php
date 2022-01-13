<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use Translatable;

    protected $fillable = ['name', 'slug','description'];
    public $translatedAttributes = ['name', 'description'];
    public $timestamps = false;

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'category_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }
}
