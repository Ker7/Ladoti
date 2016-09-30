<?php

use Illuminate\Database\Seeder;

class UserFieldDLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufdatalog')->delete();
        
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
    }
}
