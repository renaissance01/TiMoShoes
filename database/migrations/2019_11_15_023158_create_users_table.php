<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',50)->unique();//không cho phép trùng
            $table->string('password');
            $table->string('full')->nullable();//cho phép trống
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('level');//kiểu số nguyên nhỏ nhất
            $table->string('remember_token',100)->nullable();//để 100 kí tự vì là kiểu lưu trữ của token
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
