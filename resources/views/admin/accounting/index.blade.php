@extends('admin.layout.template')
@section('admin.styles')

@endsection
@section('admin-title')
    Fees
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Fees</h1>
        </div>
        <div id="breadcrumb">
            <a href="{{route('dashboard.home')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{route('accounting.index')}}" class="current">School Fees</a>
        </div>
        <div class="container-fluid">
          <div class="row">

             <div class="col-xs-12 col-sm-6">
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" title="Generate payment report of students">Generate Report</button>

               <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Filter to Export</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <form method="post" action="{{route('accounting.expSCHFEES')}}" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <div class="col-sm-12 col-xs-12 col-md-12">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Department</label>
                                <select class="form-control" name="department_id" id="exampleFormControlSelect1">
                                  <option value="">Select</option>
                                  @foreach($department as $dept)
                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Email/Matric No.</label>
                                <input type="text" name="matric_no"  class="form-control form-control-lg" placeholder="Matric No. or Email">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Date</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <label class="col-sm-2">From</label><input type="date" name="date_from"  class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-6">
                                    <label class="col-sm-2">To</label><input type="date" name="date_to"  class="form-control form-control-sm">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-9 col-xs-6 col-md-9">
                                  <!-- to move button right-->
                                </div>
                                <div class="col-sm-2 col-xs-6 col-md-2">
                                  <button type="submit" class="btn btn-success">download</button>
                                </div>
                              </div>
                            </div>
                          </form>
                      </div>






                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                  </div>
               </div>
               </div>
            </div>

            <div class="col-xs-12 col-md-12">
              <div class="widget-box">
                  <div class="widget-title">
                      <span class="icon">
                          <i class="fa fa-th"></i>
                      </span>
                      <h5>Finance Report</h5>
                  </div>
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
              <div id="justclear2">{{$pay_made->links()}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop

@section('admin.scripts')
$('#myModal').modal('handleUpdate');


@endsection
