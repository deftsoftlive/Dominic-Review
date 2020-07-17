<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->default(0);
            $table->integer('product_id')->default(0);
            $table->integer('shop_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('type')->default(0);
            $table->string('key')->default(0);
            $table->integer('value')->default(0);
            $table->integer('product_view')->default(0);
            $table->integer('product_variant')->default(0);
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
        Schema::dropIfExists('product_attributes');
    }
}
