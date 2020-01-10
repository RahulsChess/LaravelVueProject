<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'qty', 'desc',
    ];
    public $timestamps = true;


    public function productImages(){
        return $this->hasMany(ProductImage::class);
     }

     public function productPrices(){
        return $this->hasMany(ProductPrice::class);
     }
}
