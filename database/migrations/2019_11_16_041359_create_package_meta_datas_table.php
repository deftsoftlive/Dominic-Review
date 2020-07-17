<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageMetaDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_meta_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('user_id');
            $table->string('type');
            $table->string('key');
            $table->string('key_value');
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
        Schema::dropIfExists('package_meta_datas');
    }
}
