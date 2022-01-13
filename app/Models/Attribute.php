<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Attribute extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = ['attributable_id', 'attributable_type', 'name', 'input_name', 'price_status', 'details_status'];

    public function attributable() {
      return $this->morphTo();
    }

    public function attribute_options() {
      return $this->hasMany('App\Models\AttributeOption');
    }
}
