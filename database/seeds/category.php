<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        DB::table('category')->insert([
            ['id'=>1,'name'=>'Nam','slug'=>'nam','parent'=>0],
            ['id'=>2,'name'=>'Giày Nam','slug'=>'giay-nam','parent'=>1],
            ['id'=>3,'name'=>'Nữ','slug'=>'nu','parent'=>0],
            ['id'=>4,'name'=>'Giày Nữ','slug'=>'giay-nu','parent'=>3]
        ]);
    }
}
