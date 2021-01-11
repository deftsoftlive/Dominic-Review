<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayGoCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_go_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->LongText('description');
            $table->LongText('season');
            $table->LongText('type');
            $table->string('title');
            $table->string('image');
            $table->string('age');
            $table->string('session_date');
            $table->string('location');
            $table->string('day_time');
            $table->string('more_info');
            $table->string('player');
            $table->integer('price');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('pay_go_courses');
    }
}
