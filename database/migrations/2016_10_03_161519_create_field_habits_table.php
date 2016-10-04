<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userfield_habit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userfield_id');
            $table->integer('habit_id');
            
                /* How is this Habit, thats bound to a Field and a User, being measured? */
            $table->integer('unit_of_measure_id');  // @Todo Gets name & type for premade Units ~from~ another table
            
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
        Schema::drop('userfield_habit');
    }
}
