<?php

use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->delete();
        
        $fields = array(
            array('id' => 1,'name' => 'pieceful'),
            array('id' => 2,'name' => 'timeful'),
            array('id' => 3,'name' => 'percentful')
            );
        
        //"#FF6384","#4BC0C0","#9476AB","#E7E9ED","#36A2EB","#D4BA6A","#420029","#E7E9ED"
        DB::table('units')->insert($fields);
    }
}
