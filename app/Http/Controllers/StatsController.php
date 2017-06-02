<?php

namespace App\Http\Controllers;
use Auth;
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

    public function index()
    {
//        $holes = 20;
//        $current = 1;
        $rounds = self::getRounds();
            
        $user = Auth::user();
        $displayRound = array();
        return view('stats', compact('rounds', 'user'));
    }
    
    /**
     * 
     * @return multi-dimensional array of all the rounds for the user. Sorted by datatables in the UI
     */
    public function getRounds()
    {
        $user = Auth::user();
        $allRounds = DB::table('scorecard')
                ->select(DB::raw('*'))
                ->where('user', '=', $user->id)
                ->get();


        var_dump($allRounds[0]->score);
         return compact('allRounds');
    }
    
    /**
     * @input accepts array $score and returns the count of pars, birdies bogies, double+ and aces
     * @return array $scoreNamesCount
     */
    public function getScoreNamesCount($score)
    {
        $scoreNamesCount['ace'] = 0;
        $scoreNamesCount['birdie'] = 0;
        $scoreNamesCount['par'] = 0;
        $scoreNamesCount['bogey'] = 0;
        $scoreNamesCount['double'] = 0;
        
        foreach($score as $v){
            switch ($v){
                case 1 :
                    ++$scoreNamesCount['ace'] ;
                    break;
                case 2 :
                    ++$scoreNamesCount['birdie'];
                    break;
                case 3 :
                    $scoreNamesCount['par'];
                    break;
                case 4 : 
                    $scoreNamesCount['bogey'];
                    break;
                case ($v > 5):
                    $scoreNamesCount['double'];
                    break;
                    
                        
            }
        }
        return $scoreNamesCount;
    }
}
