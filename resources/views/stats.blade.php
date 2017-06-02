@extends('layouts.app')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-21">
                    <h1 class="page-header">Disc Head Statistics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Click your score to view round detials    
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width: 25px;">Total</th>
                                        <th>Course</th>
                                        <th>Date</th>
                                        <th style="width:60%;">score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($rounds['allRounds'] as $v) 
                                        @php 
                                            $score = json_decode($v->score,true); 
                                 
                                        @endphp
                                        <tr class="odd gradeX">
                                            <td style="width: 25px;">{{($v->total - 60)}}</td>
                                            <td>{{$v->course}}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td style="width: 130px;">
                                            @foreach($score['score'] as $key => $val)  
                                                @php$hole = ($key+1)@endphp

                                                <?$notes = $score['notes'][$key] != NULL ? 'notes: '. $score['notes'][$key] : '';?>
                                                {{'hole '.$hole.' => ' . $val . '  '.$notes. '  '}}
                                            @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <a class="btn btn-default btn-lg btn-block"href="/home">Start New Round</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
@endsection