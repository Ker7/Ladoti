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
            $table->integer('habit_id')->nullable();    // IF no habit then it's a Field datalog, the Habit is just tracking that
            
                /* How is This Habit being measured? */
                /* @Todo Gets name & type for premade Units ~from~ another table
                 * 1 - decimal, numeric - 1, 6314.34, 3.1415
                 * 2 - timespan - 17.3 sec, 4,33 mins, 2:13:23 (2h13m23s)
                 * 3 - percentage
                 */
            $table->integer('unit_id')->default(1);
            
                /* Name like "pieces", "pages", "things" we use to count
                 */
            $table->string('unit_name');
                
            // $table->string('habittag_id'); For ManyToMany we don't need a key here
            
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
