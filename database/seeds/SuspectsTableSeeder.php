<?php

use Illuminate\Database\Seeder;

class SuspectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suspects')->delete();
        
        \DB::table('suspects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'first_name' => 'John',
                'middle_name' => 'Smith',
                'last_name' => 'Doe',
                'qualifier' => '',
                'alias' => 'The Man Hoe',
                'whole_body' => '',
                'front' => '',
                'left_face' => '',
                'right_face' => '',
                'created_at' => '2018-02-02 06:02:53',
                'updated_at' => '2018-02-02 06:02:53',
                'convicted' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'first_name' => 'George',
                'middle_name' => 'Washington',
                'last_name' => 'Bush',
                'qualifier' => '',
                'alias' => 'The Insider',
                'whole_body' => '',
                'front' => '',
                'left_face' => '',
                'right_face' => '',
                'created_at' => '2018-02-02 07:52:49',
                'updated_at' => '2018-02-02 07:52:49',
                'convicted' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'first_name' => 'Robin',
                'middle_name' => 'A',
                'last_name' => 'Padilla',
                'qualifier' => '',
                'alias' => 'Benoy',
                'whole_body' => '',
                'front' => '',
                'left_face' => '',
                'right_face' => '',
                'created_at' => '2018-02-02 07:55:13',
                'updated_at' => '2018-02-02 07:55:13',
                'convicted' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'first_name' => 'Kotori',
                'middle_name' => 'Kousaka',
                'last_name' => 'Minami',
                'qualifier' => '',
                'alias' => 'The Birb',
                'whole_body' => '',
                'front' => '',
                'left_face' => '',
                'right_face' => '',
                'created_at' => '2018-02-02 11:39:28',
                'updated_at' => '2018-02-02 11:39:28',
                'convicted' => 0,
            ),
        ));
        
        
    }
}