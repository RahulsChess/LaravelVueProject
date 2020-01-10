<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable = [
        'product_id', 'image'
    ];
    public $timestamps = true;

     public function products(){
        return $this->belongsTo(Product::class);
     }
}
