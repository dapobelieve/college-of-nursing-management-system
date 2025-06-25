@extends('admin.layout.template')

@section('admin-title')
    Dashboard
@endsection

@section('admin-content')

<div id="content">
  <div id="content-header" class="mini">
    <h1>Dashboard</h1>
    <ul class="mini-stats box-3">
      <li>
        <div class="left sparkline_bar_good"><span>2,4,9,7,12,10,12</span>+10%</div>
        <div class="right">
          <strong>{{ $activeStudents->count() }}</strong>
          Active Students
        </div>
      </li>
      <li>
        <div class="left sparkline_bar_neutral"><span>{{$usersperday}}{{$userstoday->count() }}</span>
        @if($users->count() != 0){{number_format(($userstoday->count()/$users->count())*100, 2) }}% today @endif</div>
        <div class="right">
          <strong>{{ $users->count() }}</strong>
          Applicants
        </div>
      </li>
      <li>
        <div class="left sparkline_bar_bad"><span>3,5,9,7,12,20,10</span>+50%</div>
        <div class="right">
          <strong>8650</strong>
          Orders
        </div>
      </li>
    </ul>
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
                                <a href="{{route('dashboard.home')}}" class="btn"><i class="fa fa-refresh"></i> <span class="text">Update stats</span></a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <ul class="site-stats">
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $users->count() }}</strong> <small>Total number of applications</small></div></li>
                                        <li class="divider"></li>
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $userstoday->count() }}</strong> <small>Total number of applications today</small></div></li>
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $students->count() }}</strong> <small>Total Students</small></div></li>
                                        <li><div class="cc"><i class="fa fa-group"></i> <strong>{{ $admins->count() }}</strong> <small>Total Admins</small></div></li>
                                        <li class="divider"></li>
                                        <li><div class="cc"><i class="fa fa-bullhorn"></i> <strong>{{ $posts->count() }}</strong> <small>Total Posts</small></div></li>
                                    </ul>
                                    <input type="hidden" id="getMonthStat" value="{{ $paymentPerMonth }}" >
                                </div>
                                <div class="col-xs-12 col-md-8">
                                  <div class="widget-box">
                                                  <div class="widget-title">
                                                  	<span class="icon pull-right"><i class="fa fa-ellipsis-h"></i></span>
                                                  	<h5 class="pull-right">Tabs on left</h5>
                                                      <ul class="nav nav-tabs">
                                                          <li class="active"><a data-toggle="tab" href="#tab1">School Fees</a></li>
                                                          <li><a data-toggle="tab" href="#tab2">Admission</a></li>
                                                      </ul>
                                                  </div>
                                                  <div class="widget-content tab-content">
                                                      <div id="tab1" class="tab-pane active">
                                                        <div class="widget-content nopadding">
                                        								<table class="table table-bordered table-striped table-hover">
                                        									<thead>
                                        										<tr>
                                        											<th>Name</th>
                                        											<th>department</th>
                                        											<th>Amount Paid</th>
                                        											<th>Payment Date</th>
                                        										</tr>
                                        									</thead>
                                        									<tbody>
                                                            @foreach($pay_made as $data)
                                        										<tr>
                                        											<td class="text-uppercase"><i class="fa fa-male"></i> {{ $data->student->user->last_name}} {{$data->student->user->first_name}}</td>
                                        											<td class="text-uppercase">{{$data->student->department->name}}</td>
                                        											<td class="text-primary"> N{{$data->amount}}</td>
                                        											<td>{{date("d-M-Y", strtotime($data->created_at))}}</td>
                                        										</tr>
                                                            @endforeach
                                        									</tbody>
                                        								</table>
                                        							</div>
                                                    </div>
                                                      <div id="tab2" class="tab-pane">
                                                        <div class="widget-content nopadding">
                                        								<table class="table table-bordered table-striped table-hover">
                                        									<thead>
                                        										<tr>
                                        											<th>Name</th>
                                        											<th>Amount Paid</th>
                                        											<th>Payment Date</th>
                                        										</tr>
                                        									</thead>
                                        									<tbody>
                                                            @foreach($pay_app as $data)
                                        										<tr>
                                        											<td class="text-uppercase"><i class="fa fa-male"></i> {{ $data->studentapplicant->surname}} {{$data->studentapplicant->first_name}}</td>
                                        											<td class="text-primary"> N{{$data->amount}}</td>
                                        											<td>{{date("d-M-Y", strtotime($data->created_at))}}</td>
                                        										</tr>
                                                            @endforeach
                                        									</tbody>
                                        								</table>
                                        							</div>
                                                      </div>
                                                  </div>
                                              </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
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


@endsection
@section('admin.scripts')

var getMonthlyStat = JSON.parse(document.getElementById('getMonthStat').value);
console.log(getMonthlyStat);
const keys = Object.keys(getMonthlyStat);
const values = Object.values(getMonthlyStat);
//-------------
   //- BAR CHART -
   //-------------
   var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: keys,
        datasets: [{
            label: 'School Fees',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
                }
        }
    }
});
@endsection

