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
            array(
                'id' => 1,
                'user_id' => 2,
                'field_id' => 1,
                'clicked' => 0,
                'active' => 1,
                'public' => 1
                ),
            array(
                'id' => 2,
                'user_id' => 2,
                'field_id' => 2,
                'clicked' => 0,
                'active' => 1,
                'public' => 1
                ),
            array(
                'id' => 3,
                'user_id' => 1,
                'field_id' => 3,
                'clicked' => 1,
                'active' => 1,
                'public' => 1
                )
            );
        
        DB::table('field_user')->insert($fields);
    }
}
