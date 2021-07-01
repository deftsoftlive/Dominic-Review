<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarlyBirdManagementCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('early_bird_management_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_category_id')->nullable();
            $table->string('early_bird_date')->nullable();
            $table->string('early_bird_time')->nullable();
            $table->string('early_bird_option')->nullable();
            $table->string('tennis_discount_percentage')->nullable();
            $table->string('tennis_discount_percentage_option')->nullable();
            $table->string('football_discount_percentage')->nullable();
            $table->string('football_discount_percentage_option')->nullable();
            $table->string('school_discount_percentage')->nullable();
            $table->string('school_discount_percentage_option')->nullable();
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
        Schema::dropIfExists('early_bird_management_courses');
    }
}
