@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
        <div class="col-sm-4">

            <div class="col-sm-4" id='total' ></div>
            <div class="col-sm-4" id='ace' ></div>
            <div class="col-sm-4" id="birdies"></div>
            <div class="col-sm-4" id="pars"></div> 
            <div class="col-sm-4" id='bogey'></div>
            <div class="col-sm-4" id='double'></div>

        </div>
    <div class="col-sm-4">
        <div id="scoreButtons" class="col-sm-4">
        <input type='button' onclick="updateScore()"  value="Update Score " class="btn btn-default"> 
            <div class="checkbox-inline">
                <label><input type="checkbox" id="finishRound" name="finishRound">Save Score</label>
            </div>
       </div>
        <h3>         
            <select  id="course" >
                <option value="0">Choose Your Course</option>
                <option value="Creekside">Creekside</option>
                <option value="Taylorsville">Taylorsville</option>
                <option value="Roots">Roots</option>
            </select>
        </h3>
            <table id="scoreboard" >  
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

@endsection