<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        $users = array(
            array(
                'id' => 1,
                'name' => 'JohSenna',
                'email' => 'js@mail.com',
                'password' => Hash::make('asd'),
                'privilege' => 1
                ),
            array(
                'id' => 2,
                'name' => 'Kert',
                'email' => 'kert@mail.com',
                'password' => Hash::make('asd'),
                'privilege' => 1
                ),
            array(
                'id' => 3,
                'name' => 'Andrus',
                'email' => 'andrus@mail.com',
                'password' => Hash::make('asd'),
                'privilege' => 1
                )
            );
        
        DB::table('users')->insert($users);
    }
}
