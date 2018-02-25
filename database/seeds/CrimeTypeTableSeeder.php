<?php

use Illuminate\Database\Seeder;
use App\CrimeType;
class CrimeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new CrimeType();
        $type->crime_type = "Parricide";
        $type->description = "Parricide";
        $type->save();

        $type = new CrimeType();
        $type->crime_type = "Murder";
        $type->description = "Murder";
        $type->save();

        $type = new CrimeType();
        $type->crime_type = "Homicide";
        $type->description = "Homicide";
        $type->save();

        $type = new CrimeType();
        $type->crime_type = "Abortion";
        $type->description = "Abortion";
        $type->save();

        $type = new CrimeType();
        $type->crime_type = "Infanticide";
        $type->description = "Infanticide";
        $type->save();

        $type = new CrimeType();
        $type->crime_type = "Physical Injuries";
        $type->description = "Physical Injuries";
        $type->save();
    }
}
