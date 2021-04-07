<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->LongText('video_category')->nullable();
            $table->string('url');
            $table->LongText('description')->nullable();
            $table->boolean('status')->default(1);
            $table->string('users')->nullable();
            $table->LongText('linked_coaches')->nullable();          
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
        Schema::dropIfExists('videos_managements');
    }
}
