<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesProductTable extends Migration
{
    /**
     * 1 thuộc tính có thể nằm trong nhiều sản phẩm. Ví dụ: cùng là size M nhưng có nhiều quần cùng có size M
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values_product', function (Blueprint $table) {
            $table->integer('values_id')->unsigned();
            $table->foreign('values_id')->references('id')->on('values')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values_product');
    }
}
