<?php

use Illuminate\Database\Seeder;

class UserFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_user')->delete();
        
        $fields = array(
            array('id' => 1,'user_id' => 2,'field_id' => 1,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 2,'user_id' => 2,'field_id' => 2,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 3,'user_id' => 2,'field_id' => 3,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 4,'user_id' => 2,'field_id' => 4,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 5,'user_id' => 2,'field_id' => 5,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 6,'user_id' => 2,'field_id' => 6,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 7,'user_id' => 2,'field_id' => 7,'clicked' => 0,'active' => 1,'public' => 1),
            array('id' => 8,'user_id' => 1,'field_id' => 3,'clicked' => 1,'active' => 1,'public' => 1)
            );
        
        DB::table('field_user')->insert($fields);
    }
}
