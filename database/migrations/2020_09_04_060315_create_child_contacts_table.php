<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id');
            $table->integer('type');
            $table->string('first_name');
            $table->string('surname');
            $table->string('phone');
            $table->string('email');
            $table->string('relationship');
            $table->string('who_are_they');
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
        Schema::dropIfExists('child_contacts');
    }
}
