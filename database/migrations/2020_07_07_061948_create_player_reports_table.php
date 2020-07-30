<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('player_id');
            $table->integer('season_id');
            $table->integer('course_id');
            $table->string('date');
            $table->string('term');
            $table->longText('selected_options');
            $table->longText('coach_comment');
            $table->longText('feedback');
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
        Schema::dropIfExists('player_reports');
    }
}
