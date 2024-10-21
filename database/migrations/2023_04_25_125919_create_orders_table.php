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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//ID khách hàng
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('orderCode');//ID đơn hàng hàng
            // $table->unsignedBigInteger('product_id');//ID sản phẩm
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('total');//số lượng mua
            $table->string('address');//địa chỉ
            $table->string('phone_number');//địa chỉ
            $table->string('email');//địa chỉ
            $table->string('username');//địa chỉ
            $table->unsignedBigInteger('total_order');//Tổng giá trị đơn hàng
            $table->enum('status',['Thành công', 'Đang chờ gửi hàng','Đã hủy','Đang vận chuyển']);
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
        Schema::dropIfExists('orders');
    }
};
