<?php

use Illuminate\Database\Seeder;

class values_product extends Seeder
{
    /**
     * 1 thuộc tính có thể nằm trong nhiều sản phẩm. Ví dụ: cùng là size M nhưng có nhiều quần cùng có size M
     *
     * @return void
     */
    public function run()
    {
        DB::table('values_product')->delete();
        DB::table('values_product')->insert([
            ['product_id'=>1,'values_id'=>1],
            ['product_id'=>1,'values_id'=>2],
            ['product_id'=>1,'values_id'=>4],

            ['product_id'=>2,'values_id'=>2],
            ['product_id'=>2,'values_id'=>3],
            ['product_id'=>2,'values_id'=>5],

            ['product_id'=>3,'values_id'=>3],
            ['product_id'=>3,'values_id'=>5],
            ['product_id'=>3,'values_id'=>6],

            ['product_id'=>4,'values_id'=>2],
            ['product_id'=>4,'values_id'=>4],
            ['product_id'=>4,'values_id'=>6],

            ['product_id'=>5,'values_id'=>2],
            ['product_id'=>5,'values_id'=>4],
            ['product_id'=>5,'values_id'=>5],

        ]);
    }
}
