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
        $this->call(UsersTableSeeder::class);
        $this->call(CrimeTypeTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(SuspectsTableSeeder::class);
        // $this->call(CrimeCommittedTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
    }
}
