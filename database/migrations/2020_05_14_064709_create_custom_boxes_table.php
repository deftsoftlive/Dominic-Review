<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('position');
            $table->string('title');
            $table->longText('description');
            $table->longText('more_text');
            $table->string('image');
            $table->string('status');
            $table->integer('sort');
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
        Schema::dropIfExists('custom_boxes');
    }
}
