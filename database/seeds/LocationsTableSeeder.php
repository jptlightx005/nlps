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
        $brgy->lat = 676;
        $brgy->long = 343;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Dawis';
        $brgy->lat = 713;
        $brgy->long = 299;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Baclayan';
        $brgy->lat = 645;
        $brgy->long = 375;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Badiang';
        $brgy->lat = 660;
        $brgy->long = 242;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Balabag';
        $brgy->lat = 706;
        $brgy->long = 447;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Bilidan';
        $brgy->lat = 555;
        $brgy->long = 524;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Bita-og Gaja';
        $brgy->lat = 553;
        $brgy->long = 556;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Bololacao';
        $brgy->lat = 619;
        $brgy->long = 278;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Burot';
        $brgy->lat = 385;
        $brgy->long = 440;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Cabilauan';
        $brgy->lat = 457;
        $brgy->long = 480;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Cabugao';
        $brgy->lat = 364;
        $brgy->long = 335;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Cagban';
        $brgy->lat = 295;
        $brgy->long = 362;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Calumbuyan';
        $brgy->lat = 739;
        $brgy->long = 458;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Damires';
        $brgy->lat = 660;
        $brgy->long = 575;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'General Delgado';
        $brgy->lat = 294;
        $brgy->long = 287;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Guinobatan';
        $brgy->lat = 527;
        $brgy->long = 274;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Janipa-an Oeste';
        $brgy->lat = 459;
        $brgy->long = 241;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Jelicuon Este';
        $brgy->lat = 677;
        $brgy->long = 621;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Jelicuon Oeste';
        $brgy->lat = 339;
        $brgy->long = 247;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Pasil';
        $brgy->lat = 703;
        $brgy->long = 620;
        $brgy->save();

        $brgy = new Location();
        $brgy->location_name = 'Wari-wari';
        $brgy->lat = 494;
        $brgy->long = 385;
        $brgy->save();
        
        
    }
}