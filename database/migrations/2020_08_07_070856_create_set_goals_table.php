<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goal_id');
            $table->integer('player_id');
            $table->integer('parent_id');
            $table->longText('parent_comment');
            $table->longText('coach_id');
            $table->string('coach_comment');
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
        Schema::dropIfExists('set_goals');
    }
}
