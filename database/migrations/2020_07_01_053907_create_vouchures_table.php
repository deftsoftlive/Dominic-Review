<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('uses')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('amount')->nullable();
            $table->float('flat_discount')->nullable();
            $table->string('courses')->nullable();
            $table->string('camps')->nullable();
            $table->string('products')->nullable();
            $table->int('status')->nullable();
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
        Schema::dropIfExists('vouchures');
    }
}
