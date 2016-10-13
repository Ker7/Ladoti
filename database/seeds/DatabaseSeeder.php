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
        $this->call('FieldsSeeder');
        $this->call('UsersSeeder');
        $this->call('UserFieldSeeder');
        $this->call('UserFieldHabitDLSeeder');
        $this->call('HabitsSeeder');
        $this->call('FieldsHabitSeeder');
    }
}
