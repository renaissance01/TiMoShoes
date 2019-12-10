<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code',50)->unique();//mã không được trùng
            $table->string('name')->unique();; //không được phép để trống
            $table->string('slug')->unique();; //không được phép để trống
            $table->decimal('price', 18, 0)->default(0);
            $table->tinyInteger('featured')->unsigned();//sản phẩm nổi bật dạng không dấu -
            $table->tinyInteger('state')->unsigned();
            $table->text('info')->nullable(); //cho phép rỗng
            $table->text('describe')->nullable();
            $table->string('img');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade'); //onDelete là không ràng buộc
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
