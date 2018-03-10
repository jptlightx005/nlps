<?php

use Illuminate\Database\Seeder;

class CrimeCommittedTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('crime_committed')->delete();
        
        \DB::table('crime_committed')->insert(array (
            0 => 
            array (
                'id' => 1,
                'suspect_id' => 1,
                'location_id' => 5,
                'crime_type' => 'Homicide',
                'created_at' => '2018-02-02 06:02:53',
                'updated_at' => '2018-02-02 06:02:53',
            ),
            1 => 
            array (
                'id' => 2,
                'suspect_id' => 2,
                'location_id' => 5,
                'crime_type' => 'Infanticide',
                'created_at' => '2018-02-02 07:52:50',
                'updated_at' => '2018-02-02 07:52:50',
            ),
            2 => 
            array (
                'id' => 3,
                'suspect_id' => 3,
                'location_id' => 5,
                'crime_type' => 'Murder',
                'created_at' => '2018-02-02 07:55:13',
                'updated_at' => '2018-02-02 07:55:13',
            ),
            3 => 
            array (
                'id' => 4,
                'suspect_id' => 4,
                'location_id' => 2,
                'crime_type' => 'Physical Injuries',
                'created_at' => '2018-02-02 11:39:28',
                'updated_at' => '2018-02-02 11:39:28',
            ),
        ));
        
        
    }
}