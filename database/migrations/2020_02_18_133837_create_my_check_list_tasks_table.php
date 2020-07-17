<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyCheckListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_check_list_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->default(0);
            $table->longText('task')->nullable();
            $table->string('task_date')->nullable();
            $table->integer('category_id')->defult(0);
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('my_check_list_tasks');
    }
}
