<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUfdatalogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ufdatalog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userfield_id');
            $table->integer('fieldhabit_id')->nullable();
            $table->date('date');
            $table->integer('value_int'); //0-100
            $table->integer('value_time');
            $table->integer('value_decimal');
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ufdatalog');
    }
}
