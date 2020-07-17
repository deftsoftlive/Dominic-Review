<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_id');
            $table->string('child_id');
            $table->string('school');
            $table->string('core_lang');
            $table->string('con1_first_name');
            $table->string('con1_last_name');
            $table->string('con1_phone');
            $table->string('con1_email');
            $table->string('con1_relationship');
            $table->string('con1_if_other');
            $table->string('con2_first_name');
            $table->string('con2_last_name');
            $table->string('con2_phone');
            $table->string('con2_email');
            $table->string('con2_relationship');
            $table->string('con2_if_other');
            $table->string('surgery_name_add');
            $table->string('surgery_phone');
            $table->string('med_aware_cond');
            $table->string('food_al');
            $table->string('add_req');
            $table->string('toilet_ass');
            $table->string('pres_med');
            $table->string('beh_need');
            $table->string('beh_str');
            $table->string('football');
            $table->string('tennis');
            $table->string('basketball');
            $table->string('netball');
            $table->string('athletics');
            $table->string('dodgeball');
            $table->string('archery');
            $table->string('cricket');
            $table->string('hockey');
            $table->string('gymnastics');
            $table->string('yoga');
            $table->string('arts');
            $table->string('movies');
            $table->string('comp_games');
            $table->string('reading');
            $table->string('media');
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
        Schema::dropIfExists('children_details');
    }
}
