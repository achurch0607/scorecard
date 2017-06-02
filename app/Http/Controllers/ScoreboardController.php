<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
//use Illuminate\Http\Request;
use Request;
use Log;
use DB;


class StatsController extends Controller
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
        $holes = 20;
        $current = 1;
        return view('stats', compact('holes','current'));
    }
    


}
