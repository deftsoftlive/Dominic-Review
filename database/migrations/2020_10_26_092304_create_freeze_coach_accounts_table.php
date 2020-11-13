<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreezeCoachAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freeze_coach_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile')->nullable();
            $table->integer('reports')->nullable();
            $table->integer('matches')->nullable();
            $table->integer('goals')->nullable();
            $table->integer('players')->nullable();
            $table->integer('bookings')->nullable();
            $table->integer('notifications')->nullable();
            $table->integer('wallet')->nullable();
            $table->integer('settings')->nullable();
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
        Schema::dropIfExists('freeze_coach_accounts');
    }
}
