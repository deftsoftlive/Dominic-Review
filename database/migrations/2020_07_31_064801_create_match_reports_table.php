<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id');
            $table->string('opponent_name');
            $table->string('start_time');
            $table->string('surface_type');
            $table->string('condition');
            $table->string('result');
            $table->string('score');
            $table->string('wht_went_well');
            $table->string('wht_could_better');
            $table->string('other_comments');
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
        Schema::dropIfExists('match_reports');
    }
}
