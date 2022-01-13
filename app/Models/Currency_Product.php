<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Currency_Product extends Model
{

    protected $table="currency_product";

    protected $fillable = ['values', 'currency_id','product_id'];



}
