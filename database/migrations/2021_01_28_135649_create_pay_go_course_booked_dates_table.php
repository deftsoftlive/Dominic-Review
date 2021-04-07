<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayGoCourseBookedDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_go_course_booked_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id');
            $table->integer('booked_date_id');
            $table->integer('course_id');
            $table->integer('child_id');
            $table->boolean('occupied')->default(0);
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
        Schema::dropIfExists('pay_go_course_booked_dates');
    }
}
