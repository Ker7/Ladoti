<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('FieldsSeeder');
        $this->call('UserFieldSeeder');
        $this->call('UserFieldDLSeeder');
    }
}
