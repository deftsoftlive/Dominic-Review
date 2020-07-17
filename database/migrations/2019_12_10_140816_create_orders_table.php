<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->default(0);
            $table->integer('business_id')->default(0);
            $table->integer('deal_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->integer('event_id')->default(0);
            $table->integer('category_id')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
