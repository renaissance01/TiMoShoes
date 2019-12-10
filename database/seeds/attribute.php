<?php

use Illuminate\Database\Seeder;

class attribute extends Seeder
{
    /**
     * Bảng thuộc tính: size, màu,...
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute')->delete();
        DB::table('attribute')->insert([
            ['id'=>1,'name'=>'Size'],
            ['id'=>2,'name'=>'color'],
        ]);
    }
}
