<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Faker\Factory as Factory;

class UserFieldHabitDLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dotilog')->delete();
        
        
        /*
        $fields = array(
            array('id' => 1,'userfield_id' => 1,'date' => '2016-09-30','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 2,'userfield_id' => 1,'date' => '2016-09-29','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 3,'userfield_id' => 2,'date' => '2016-09-29','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 4,'userfield_id' => 2,'date' => '2016-09-28','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 5,'userfield_id' => 2,'date' => '2016-09-27','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 6,'userfield_id' => 2,'date' => '2016-09-26','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 7,'userfield_id' => 2,'date' => '2016-09-25','value' => Rand(0,100),'comment' => 'Tere'),
            array('id' => 8,'userfield_id' => 3,'date' => '2016-09-24','value' => Rand(0,100),'comment' => 'Tere')
            );
        DB::table('ufdatalog')->insert($fields);
        */
        
        //use Faker\Factory as Factory;
        $faker = Factory::create();
        
        $i = 1;
        foreach (range(1, 21) as $fieldhabit){
            foreach (range(1,96) as $index) {
                DB::table('dotilog')->insert([
                    'id' => $i,
                    'fieldhabit_id' => $fieldhabit,
                    
                    'date_log' => Carbon::now()->subDays($index)->format('Y-m-d'),//$faker->dateTime('-'.$i.' day')->format('Y-m-d'),
                    //'date_log' => $faker->dateTimeBetween('-3 month', 'now')->format('Y-m-d'),
                    //'time' => $faker->dateTimeBetween('-1 day', 'now')->format('H:i:s'),  // For Fieldlog it is okay to just use date, time is NULL
                    
                    'value_decimal' => Rand(20,100),
                    'comment' => $faker->sentence
                ]);
                $i++;
            }
        }
        
    }
}
