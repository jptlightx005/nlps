<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $brgy = new Location();
        $brgy->location_name = 'Poblacion';
        $brgy->area_id = 'brgy-poblacion';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Dawis';
        $brgy->area_id = 'brgy-dawis';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Baclayan';
        $brgy->area_id = 'brgy-baclayan';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Badiang';
        $brgy->area_id = 'brgy-badiang';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Balabag';
        $brgy->area_id = 'brgy-balabag';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Bilidan';
        $brgy->area_id = 'brgy-bilidan';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Bita-og Gaja';
        $brgy->area_id = 'brgy-bitaog-gaja';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Bololacao';
        $brgy->area_id = 'brgy-bololacao';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Burot';
        $brgy->area_id = 'brgy-burot';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Cabilauan';
        $brgy->area_id = 'brgy-cabilauan';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Cabugao';
        $brgy->area_id = 'brgy-cabugao';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Cagban';
        $brgy->area_id = 'brgy-cagban';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Calumbuyan';
        $brgy->area_id = 'brgy-calumbuyan';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Damires';
        $brgy->area_id = 'brgy-damires';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'General Delgado';
        $brgy->area_id = 'brgy-general-delgado';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Guinobatan';
        $brgy->area_id = 'brgy-guinobatan';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Janipa-an Oeste';
        $brgy->area_id = 'brgy-janipaan-oeste';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Jelicuon Este';
        $brgy->area_id = 'brgy-jelicuon-este';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Jelicuon Oeste';
        $brgy->area_id = 'brgy-jelicuon-oeste';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Pasil';
        $brgy->area_id = 'brgy-pasil';
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Wari-wari';
        $brgy->area_id = 'brgy-wariwari';
        $brgy->save();
        
        
    }
}