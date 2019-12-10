<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantTable extends Migration
{
    /**
     * Biến thể: là sự kết hợp giữa 2 hay nhiều giá trị của thuộc tính ví dụ: Size M và màu Đỏ, Size L và màu Trắng
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 18, 0)->default(0);//kiểu tiền tệ mặc định là 0 đồng
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
        Schema::dropIfExists('variant');
    }
}
