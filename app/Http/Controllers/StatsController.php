<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
//use Illuminate\Http\Request;
use Request;
use Log;
use DB;


class HomeController extends Controller
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
        return view('home', compact('holes','current'));
    }
    
    public function scoreboard()
    {
        
        $input = Request::all();
        
//        return;
        //save round to database when finishRound is checked
        $score['score'] = $input['score'];
        $score['notes'] = $input['notes'];
        $insertScore = json_encode($score);
//        return;
        $total = array_sum($input['score']);
        $date = date("Y-m-d H:i:s"); 
        if ($input['finish'] == 'true'){
            var_dump($input['score']);          
            DB::table('scorecard')->insert([
                ['user' => '1', 'course' => $input['course'], 'score' => $insertScore,'total' => $total, 'finishRound' => '1', 'created_at' => $date ],              
            ]);
        }
        
        return (compact('input'));
        
    }
    
    public function getLastRound()
    {
//        $id = Auth::user()->id;
        
        $input = Request::all();
//        $score = json_decode($input['score']);
//        $lastRound = DB::select('select * from scorecard where user = ? and course = ?', 1, 'Creekside');
        $lastRound = DB::table('scorecard')
                ->select(DB::raw('*'))
                ->where('course', '=','Creekside')
                ->get();
//        $score = json_decode($input['score']);
//        $lastRound = 'WTF';
//        var_dump($score);
         return compact('lastRound','input');
    }
}
