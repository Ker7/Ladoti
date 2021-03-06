<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Faker\Factory as Factory;

class FieldsHabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userfield_habit')->delete();
        
        $faker = Factory::create();
        
        /* Kõigepealt teeme iga fieldi trackimiseks special Habiti, mida ei kuvata välja ega midagi
         */
        
        $i = 1;  // index for table id column
        
        foreach (range(1,21) as $userfield_id){
            DB::table('userfield_habit')->insert([
                'id' => $i,
                
                'internal' => true, //
                'userfield_id' => $userfield_id,
                //'date' => $faker->dateTimeBetween('-3 month', 'now')->format('Y-m-d'),
                'habit_id' => 14,       //Hardcoded "_log" named habit
                
                'unit_id' => 1,         // IF Field datalog, then unit is piece
                'unit_name' => "%",     
                
                //'value' => Rand(0,100),
                //'field_id' => $index,
                'active' => 1,          // WWW III PPP
                'public' => 0,
                'created_at' => Carbon::now(),
                
                'comment' => 'For tracking the Field.'
                //'comment' => $faker->sentence
            ]);
            $i++;
        }
        
        /* Enda kontole hakkan lisama test habiteid */
        $array_data = array();
        $array_data[8] = ['unit_id' => 1,   'unit_name' => ''];
        
        /* Enda kontole hakkan lisama test habiteid */
        foreach (range(8,14) as $userfield_id){
            DB::table('userfield_habit')->insert([
                'id' => $i,
                
                'internal' => false, //
                'userfield_id' => $userfield_id,
                //'date' => $faker->dateTimeBetween('-3 month', 'now')->format('Y-m-d'),
                'habit_id' => ($userfield_id-7),       //Hardcoded "_log" named habit
                
                'unit_id' => 1,         // IF Field datalog, then unit is piece
                'unit_name' => "%",     
                
                //'value' => Rand(0,100),
                //'field_id' => $index,
                'active' => 1,          // WWW III PPP
                'public' => 0,
                'created_at' => Carbon::now(),
                
                'comment' => 'For tracking the Field.'
                //'comment' => $faker->sentence
            ]);
            $i++;
        }
    }
}
