@extends('admin.layout.template')

@section('admin-title')
    Dashboard
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header" class="mini">
            <h1>Dashboard</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current">Dashboard</a>
        </div>
        <div class="container-fluid">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="fa fa-signal"></i></span>
                            <h5>Site Statistics</h5>
                            <div class="buttons">
                                <a href="#" class="btn"><i class="fa fa-refresh"></i> <span class="text">Update stats</span></a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <ul class="site-stats">
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $users->count() }}</strong> <small>Total Users</small></div></li>
                                        <li class="divider"></li>
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $students->count() }}</strong> <small>Total Students</small></div></li>
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $lecturers->count() }}</strong> <small>Total Lecturers</small></div></li>
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $admins->count() }}</strong> <small>Total Admins</small></div></li>
                                        <li class="divider"></li>
                                        <li><div class="cc"><i class="fa fa-bullhorn"></i> <strong>{{ $posts->count() }}</strong> <small>Total Posts</small></div></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-8">

                                  <div class="box box-success">
                                      <div class="box-header with-border">
                                        <h3 class="box-title">Pie Chart</h3>

                                        <div class="box-tools pull-right">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                      </div>
                                      <div class="box-body">
                                          <canvas id="myChart" width="400" height="150"></canvas>                                        
                                      </div>
                                      <!-- /.box-body -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


@stop
