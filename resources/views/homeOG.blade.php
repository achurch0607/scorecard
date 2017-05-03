@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                       <input type="checkbox" id="finishRound" name="finishRound">Save Score 
                        <input type='button' onclick="updateScore()" id="updateScore" value="Update Score">

                   
                </div>
             <div class="col-md-4 col-md-offset-6">
                        
                    
                        <select  id="course" onchange="showDiv(this)">
                            <option value="0">Choose Your Course</option>
                            <option value="Creekside">Creekside</option>
                            <option value="Taylorsville">Taylorsville</option>
                            <option value="Roots">Roots</option>
                        </select>
            </div>
                    
                        <div class="row">                            
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
                        <tr>
                    <table id="scoreboard" style="display: none;">  
                        </tr>
                            @for ($current; $current <= $holes; $current++) 
                                <tr>
                                
                                <th style="padding: 2px; color:green;" id='currentHole'> {{$current}} </th>
                                <td style="padding: 2px;"><input id="score" class='{{$current}}' type="number" name="score[]" min="1" size="3" value="3" onchange="scoreColors(this,value)"></td>
                                <td style="padding: 2px;"><input id="notes" type="text" name="notes[]" min="1" size="auto" value=""></td>
                                </tr>
                            @endfor
                    </table>
                    
                
                
            </div>
            
        </div>
    </div>

</div>

@endsection
