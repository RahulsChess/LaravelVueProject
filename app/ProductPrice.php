<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'product_id', 'size','price'
    ];
    public $timestamps = true;


    public function products(){
        return $this->belongsTo(Product::class);
     }
}
