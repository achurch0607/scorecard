@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Score Card
                
                        <select  id="course" onchange="showDiv(this)">
                            <option value="0">Choose Your Course</option>
                            <option value="Creekside">Creekside</option>
                            <option value="Taylorsville">Taylorsville</option>
                            <option value="Roots">Roots</option>
                        </select>
                    <span id="finishRound">Save Score</span><input type="checkbox" id="finishRound" name="finishRound" style="margin-left: 5px;">
                                <input type='button' onclick="updateScore()" id="updateScore" value="Update Score">
                </div>
                    <table id="scoreboard" style="display: none;">
                        <div class="row">
                            
                            <div class="col-md-8 col-md-offset-2" id='topRow' hidden>
<!--                                <label id="finishRound">Save Score</label> <input type="checkbox" id="finishRound" name="finishRound">
                                <input type='button' onclick="updateScore()" id="updateScore" value="Update Score">-->
                                <!--<input type='button' id="lastRound"  onclick="getLastRound()" value="Show Last Round">-->
                                
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="col-md-2" id='total' ></div>
                                    <div class="col-md-2" id='ace' ></div>
                                    <div class="col-md-2" id="birdies"></div>
                                    <div class="col-md-2" id="pars" col-md-2></div> 
                                    <div class="col-md-2" id='bogey' col-md-1 ></div>
                                    <div class="col-md-2" id='double'col-md-2 ></div>
                                </div>
                                
                            </div>   
                        </div>
                            @for ($current; $current <= $holes; $current++) 
                                <tr>
                                <th style="padding: 2px; color:green;" id='currentHole'> {{$current}} </th>
                                <td style="padding: 2px;"><input id="score" class='{{$current}}' type="number" name="score[]" min="1" size="3" value="3" onchange="scoreColors(this,value)"></td>
                                <td style="padding: 2px;"><input id="notes" type="text" name="notes[]" min="1" size="50" value=""></td>
                                </tr>
                            @endfor
                    </table>
                    
                
                
            </div>
            
        </div>
    </div>

</div>

@endsection
