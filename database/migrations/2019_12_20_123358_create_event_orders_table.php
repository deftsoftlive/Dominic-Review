<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('OrderID')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('event_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('deal_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('type')->nullable();
            $table->double('package_price')->nullable();
            $table->double('discounted_price')->nullable();
            $table->double('subtotal')->nullable();
            $table->string('coupon_code')->nullable();
            $table->integer('status')->nullable();
            $table->integer('order_status')->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('payment_status')->nullable();
            $table->longText('pyayment_data')->nullable();
            $table->longText('related_tableData')->nullable();
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
        Schema::dropIfExists('event_orders');
    }
}
