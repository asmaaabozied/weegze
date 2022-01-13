<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = "visitors";
    protected $fillable = ['ip', 'iso_code', 'country', 'city', 'state', 'state_name', 'postal_code', 'lat', 'lon', 'timezone', 'continent', 'currency', 'default1', 'cached','type','product_id','blog_id'];


    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog','blog_id');
    }

}
