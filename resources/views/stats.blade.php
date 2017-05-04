
@extends('layouts.app')

@section('content')

    <div id="wrapper">

       

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Disc Head Stuff</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="total" style="text-align: right;"></div>
                                    <div>Total</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-chain-broken fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="ace"></div>
                                    <div>ACE!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-twitter-square fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="birdies" ></div>
                                    <div>Birdie</div>
                                </div>
                            </div>
                        </div>
                 
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="pars"></div>
                                    <div>PAR</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bomb fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="bogey"></div>
                                    <div>BOGEY</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-2 col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flag-o fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="double"></div>
                                    <div>Double +</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <div class="checkbox">
                                    <label><input type="checkbox" value=""id="finishRound" name="finishRound">Save Score</label>
                            </div>
                            <div class="alert alert-success" id="saved" style="display:none; color:black;">
                                    <strong>Your score has been saved to the database Jackass!</strong> 
                                </div>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <select  id="course">
                                                        <option value="0">Choose Your Course</option>
                                                        <option value="Creekside">Creekside</option>
                                                        <option value="Taylorsville">Taylorsville</option>
                                                        <option value="Roots">Roots</option>
                                                    </select>
                                            <button type='button' class="btn btn-default btn-xs" onclick="updateScore()"  > Update Score</button>
                                       
                                 
                                 
                                        </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Score</th>
                                                    <th>Notes</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($current; $current <= $holes; $current++) 
                                                <tr>
                                                    <td id='currentHole'>{{$current}}</td>
                                                    <td>
                                                        <button id="minus{{$current}}" data-inline="true"><b>-</b></button>
                                                        <input id="score{{$current}}" class='{{$current}}' type="text" size="3" value="3" name="score[]"value="3" onchange="scoreColors(this,value)" disabled="disabled">
                                                        <button id="plus{{$current}}" data-inline="true"><b>+</b></button>
                                                    </td>
                                                    <td><input id="notes" type="text" name="notes[]" min="1"  value=""></td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Your Latest Scores
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>
@endsection