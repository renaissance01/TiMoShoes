<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id'=>1,'product_code'=>'M01','name'=>'Giày thể thao nam M01','slug'=>'giay-the-thao-nam-m01','price'=>100000,'featured'=>1,'state'=>1,'img'=>'no-img.jpg','category_id'=>1],
            ['id'=>2,'product_code'=>'M02','name'=>'Giày thể thao nam M02','slug'=>'giay-the-thao-nam-m02','price'=>200000,'featured'=>1,'state'=>0,'img'=>'no-img.jpg','category_id'=>1],
            ['id'=>3,'product_code'=>'M03','name'=>'Giày thể thao nam M03','slug'=>'giay-the-thao-nam-m03','price'=>300000,'featured'=>0,'state'=>1,'img'=>'no-img.jpg','category_id'=>1],
            ['id'=>4,'product_code'=>'M04','name'=>'Giày thể thao nam M04','slug'=>'giay-the-thao-nam-m04','price'=>400000,'featured'=>1,'state'=>1,'img'=>'no-img.jpg','category_id'=>1],
            ['id'=>5,'product_code'=>'M05','name'=>'Giày thể thao nam M05','slug'=>'giay-the-thao-nam-m05','price'=>500000,'featured'=>1,'state'=>1,'img'=>'no-img.jpg','category_id'=>1],
        ]);
    }
}
