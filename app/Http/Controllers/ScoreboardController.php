<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
//use Illuminate\Http\Request;
use Request;
use Log;
use DB;


class ScoreboardController extends Controller
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
        return view('scorecard', compact('holes','current'));
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


}
