<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAssignedVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_assigned_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->default(0);
            $table->double('price')->default(0);
            $table->double('sale_price')->default(0);
            $table->integer('product_id')->default(0);
            $table->integer('status')->default(0);
            $table->integer('stock_managable')->default(0);
            $table->double('weight')->default(0);
            $table->double('height')->default(0);
            $table->double('width')->default(0);
            $table->double('length')->default(0);
            $table->string('type')->nullable();
            $table->integer('attribute_id')->nullable();
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
        Schema::dropIfExists('product_assigned_variations');
    }
}
