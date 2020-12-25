<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_no');
            $table->integer('parent_id');
            $table->integer('player_id');
            $table->integer('account_id');
            $table->integer('course_id');
            $table->integer('price');
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
        Schema::dropIfExists('package_courses');
    }
}
