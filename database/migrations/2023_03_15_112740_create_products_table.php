<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('color',200);
            $table->text('thumbnail');
            $table->text('img');
            $table->text('content')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('user_id');  
            $table->unsignedBigInteger('cat_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('total');
            $table->foreign('cat_id')->references('id')->on('product_cats')->onDelete('cascade');
            $table->timestamps();
        });
    }
    // Schema::create('oders', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger('product_id');
    //     $table->unsignedBigInteger('total');
    //     $table->string('user');
    //     $table->string('email', 255);
    //     $table->string('phone_number');
    //     $table->string('address');
    //     $table->enum('status',['Đang xử lí','Đang vận chuyển','Hủy đơn hàng', 'Thành công']);
    //     $table->timestamps();
    // });
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
