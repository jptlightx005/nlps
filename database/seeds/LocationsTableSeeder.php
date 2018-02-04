<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'location_name' => 'Barasan',
                'long' => '122.5527906',
                'lat' => '10.8562350',
                'created_at' => '2018-02-02 06:01:47',
                'updated_at' => '2018-02-02 06:01:47',
            ),
            1 => 
            array (
                'id' => 2,
                'location_name' => 'Ban-ag',
                'long' => '122.5443792',
                'lat' => '10.8501657',
                'created_at' => '2018-02-02 06:01:55',
                'updated_at' => '2018-02-02 06:01:55',
            ),
            2 => 
            array (
                'id' => 3,
                'location_name' => 'Dalid',
                'long' => '122.5505590',
                'lat' => '10.8454451',
                'created_at' => '2018-02-02 06:02:01',
                'updated_at' => '2018-02-02 06:02:01',
            ),
            3 => 
            array (
                'id' => 4,
                'location_name' => 'Bantay',
                'long' => '122.5358820',
                'lat' => '10.8712390',
                'created_at' => '2018-02-02 06:02:06',
                'updated_at' => '2018-02-02 06:02:06',
            ),
            4 => 
            array (
                'id' => 5,
                'location_name' => 'Pungsod',
                'long' => '122.5475550',
                'lat' => '10.8591010',
                'created_at' => '2018-02-02 06:02:13',
                'updated_at' => '2018-02-02 06:02:13',
            ),
            5 => 
            array (
                'id' => 6,
                'location_name' => 'Buayahon',
                'long' => '122.5393152',
                'lat' => '10.8593539',
                'created_at' => '2018-02-02 06:02:20',
                'updated_at' => '2018-02-02 06:02:20',
            ),
        ));
        
        
    }
}