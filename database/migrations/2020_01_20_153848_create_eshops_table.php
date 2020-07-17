<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('slug')->nullable();
            $table->integer('vendor_id');
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('eshops');
    }
}
