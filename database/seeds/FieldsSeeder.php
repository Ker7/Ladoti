<?php

use Illuminate\Database\Seeder;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->delete();
        
        $fields = array(
            array('id' => 1,'name' => 'Tervis',             'color' => '#978654','author_user' => 1,'clicked' => 0),
            array('id' => 2,'name' => 'Vaimsus',            'color' => '#123123','author_user' => 2,'clicked' => 0),
            array('id' => 3,'name' => 'Finants',            'color' => '#123123','author_user' => 2,'clicked' => 1),
            array('id' => 4,'name' => 'Sotsialiseerumine',  'color' => '#123123','author_user' => 2,'clicked' => 1),
            array('id' => 5,'name' => 'Muusika',            'color' => '#123123','author_user' => 2,'clicked' => 1),
            array('id' => 6,'name' => 'Programmeerimine',   'color' => '#123123','author_user' => 2,'clicked' => 1),
            array('id' => 7,'name' => 'Töö',                'color' => '#123123','author_user' => 2,'clicked' => 1)
            );
        
        DB::table('fields')->insert($fields);
    }
}
