<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use Translatable;

    protected $fillable = ['name', 'sign', 'key', 'value', 'is_default'];
    public $timestamps = false;


    public $translatedAttributes = ['name', 'description'];

    public function Products()
    {
        return $this->belongsToMany(Product::class)->withPivot('values');

    }
}
