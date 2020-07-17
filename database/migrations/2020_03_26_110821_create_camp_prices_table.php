<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('camp_id');
            $table->string('week');

            $table->string('mon_earlydrop');
            $table->string('mon_morning');
            $table->string('mon_lunch');
            $table->string('mon_noon');
            $table->string('mon_fullday');
            $table->string('mon_late_pickup');

            $table->string('tue_earlydrop');
            $table->string('tue_morning');
            $table->string('tue_lunch');
            $table->string('tue_noon');
            $table->string('tue_fullday');
            $table->string('tue_late_pickup');

            $table->string('wed_earlydrop');
            $table->string('wed_morning');
            $table->string('wed_lunch');
            $table->string('wed_noon');
            $table->string('wed_fullday');
            $table->string('wed_late_pickup');

            $table->string('thur_earlydrop');
            $table->string('thur_morning');
            $table->string('thur_lunch');
            $table->string('thur_noon');
            $table->string('thur_fullday');
            $table->string('thur_late_pickup');

            $table->string('fri_earlydrop');
            $table->string('fri_morning');
            $table->string('fri_lunch');
            $table->string('fri_noon');
            $table->string('fri_fullday');
            $table->string('fri_late_pickup');

            $table->string('fullweek_earlydrop');
            $table->string('fullweek_morning');
            $table->string('fullweek_lunch');
            $table->string('fullweek_noon');
            $table->string('fullweek_fullday');
            $table->string('fullweek_late_pickup');
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
        Schema::dropIfExists('camp_prices');
    }
}
