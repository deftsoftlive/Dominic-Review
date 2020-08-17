<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competition_id');
            $table->integer('match_id');
            $table->string('tp_in_match');
            $table->string('tp_won');
            $table->string('total_1serves_in');
            $table->string('total_2serves_in');
            $table->string('total_double_faults');
            $table->string('total_aces');
            $table->string('total_1serve_by_op');
            $table->string('total_2serve_by_op');
            $table->string('total_double_fault_by_op');
            $table->string('tp_won_in_1serve');
            $table->string('tp_won_in_2serve');
            $table->string('tp_won_ops_1sereve');
            $table->string('tp_won_ops_2sereve');
            $table->string('tp_won_rally_4shots');
            $table->string('tp_won_rally_5shots');
            $table->string('total_shots_match');
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
        Schema::dropIfExists('match_stats');
    }
}
