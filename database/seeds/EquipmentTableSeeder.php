<?php

use Illuminate\Database\Seeder;

use App\Equipment;
class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipment = new Equipment;
        $equipment->equipment_name = "Knife";
        $equipment->description = "Kutsilyo";
        $equipment->save();

        $equipment = new Equipment;
        $equipment->equipment_name = "Gun";
        $equipment->description = "Baril";
        $equipment->save();
    }
}
