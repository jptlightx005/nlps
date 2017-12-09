<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master = new User();
	    $master->name = 'John Smith';
	    $master->username = 'admin';
	    $master->email = 'admin@nlps.com';
	    $master->password = bcrypt('password');
	    $master->role = 'admin';
	    $master->save();
    }
}
