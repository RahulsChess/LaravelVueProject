<?php

use Illuminate\Database\Seeder;



use App\Product;
use App\ProductImage;
use App\ProductPrice;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
         $product=Product::create([
            'name' => 'Washing Machine',
            'desc' => 'New Brand IN the market washing machine use to clean cloth deeply',
            'qty'=>30,
        ]);


        $data = array(
            array( 'product_id'=> $product->id,
            'image'=>'upload/1577179159.jpeg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')),
            array( 'product_id'=> $product->id,
            'image'=>'upload/1577358092.jpeg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')),
            array( 'product_id'=> $product->id,
            'image'=>'upload/1577435382.jpeg','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')),

        );

        ProductImage::insert($data); // Eloquent approach


        $detail = array(
            array( 'product_id'=> $product->id,
            'size'=>'S','price'=>'500','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')),
            array( 'product_id'=> $product->id,
            'size'=>'M','price'=>'600','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')),
            array( 'product_id'=> $product->id,
            'size'=>'L','price'=>'700','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')),

        );

        ProductPrice::insert($detail);


    }
}


