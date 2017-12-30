<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mapper::map(10.872001027667604, 122.57285513977047, ['zoom' => 14,
                                'eventClick' => 'clickedMyLocation(this);', 
                                'eventAfterLoad' => 'mapDidLoad(this);',
                                'type' => 'HYBRID']);

        return view('dashboard');
    }
}
