@extends('admin.layout.template')

@section('admin-title')
    Edit Course
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Courses</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current"></a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div style="display: flex;  align-items: center" class="widget-title">
                                </div>
                                <div class="widget-content">
                                    <span>
                                        @foreach($errors->all() as $error)
                                            <strong style="color: red">*{{ $error }}</strong> <br>
                                        @endforeach
                                        @if(Session::has('error'))
                                            <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                                        @endif
                                    </span>
                                    <div class="row">
                                        @if(Session::has('success'))
                                            <strong style="color: green">* {{ Session::get('success') }}</strong>
                                        @endif

                                        <form style="display: grid; grid-template-columns: 1fr 1fr" method="post" action="{{route('students.update', ['student' => $student->id])}}" class="form-horizontal">
                                            <div class="">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Full Name:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly id="first_name" value="{{ $student->user->last_name.', '.$student->user->first_name.' '.$student->user->last_name }}" type="text" class="form-control input-sm" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Matric No.:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly value="{{$student->matric_no}}" type="text"  class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Department:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{ $student->department->name}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Gender:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly value="{{$student->user->sex}}" type="text" placeholder="Last Name" name="last_name" class="form-control input-sm" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Phone Number:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input name="phone"  value="{{$student->user->phone }}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Date of Birth:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{date("Y-m-d", strtotime($student->user->dob))}}" type="date"  class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <input type="hidden" name="role" value="2">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Email:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{ $student->user->email}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Sponsor's name:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{ $student->sponsors_name}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="">
                                              <div class="form-group">
                                                  <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">sponsor's phone:</label>
                                                  <div class="col-sm-9 col-md-6 col-lg-6">
                                                      <input readonly  value="{{ $student->sponsors_phone}}" type="text" class="form-control input-sm" />
                                                  </div>
                                              </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">State of origin</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly value="{{$state->name}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">LGA</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly value="{{$lga->lga}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Address:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <textarea value="" name="address" cols="30" rows="6" class="form-control">{{$student->user->address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">city</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input name="city" value="{{$student->user->city}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Activity</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        @if($student->user->is_active == 'ACTIVE')
                                                        <input type="checkbox" name="activity" class="custom-control-input" checked id="customControlAutosizing">
                                                        <label class="badge badge-success">ACTIVE</label>
                                                        @else
                                                        <input type="checkbox" name="activity" class="custom-control-input" id="customControlAutosizing">
                                                        <label class="badge badge-danger">DISABLED</label>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

@stop
