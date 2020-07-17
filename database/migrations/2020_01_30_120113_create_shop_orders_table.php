<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->default(0);
            $table->text('orderID')->nullable();
            $table->integer('user_id')->default(0);
            $table->longText('shipping_address')->nullable();
            $table->longText('billing_address')->nullable();
            $table->longText('payment_detail')->nullable();
            $table->longText('carge_detail')->nullable();
            $table->double('amount')->default(0);
            $table->string('payment_by')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('shop_orders');
    }
}
