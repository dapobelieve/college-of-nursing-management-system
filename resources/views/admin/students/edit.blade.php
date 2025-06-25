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
                                                        <input readonly id="first_name" value="{{ $student->user->last_name.', '.$student->user->first_name.' '.$student->user->middle_name }}" type="text" class="form-control input-sm" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Matric No.:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input name="matric_no" value="{{$student->matric_no}}" type="text"  class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Department:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{ $student->department->name}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Level:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input name="level" value="{{ $student->level}}" type="text" class="form-control input-sm" />
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
                                                        <input  name="email" value="{{ $student->user->email}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Sponsor's name:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{ $student->sponsors_name}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">sponsor's phone:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input readonly  value="{{ $student->sponsors_phone}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="">
                                              <div class="row">
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
                                                        <textarea value="" name="address" cols="30" rows="3" class="form-control">{{$student->user->address}}</textarea>
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
                                                        <input type="checkbox" name="is_active" class="custom-control-input"  checked id="customControlAutosizing">
                                                        <label class="badge badge-success">ACTIVE</label><span> unclick to disable student</span>
                                                        @else
                                                        <input type="checkbox" name="is_active" class="custom-control-input" id="customControlAutosizing">
                                                        <label class="badge badge-danger">DISABLED</label><span> click to enable student</span>
                                                        @endif
                                                    </div>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                <div class="col-md-9 col-lg-9">
                                                @if($result !== null)
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">Exam type:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->exam_type}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">Exam number:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->exam_no}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">Mathematics:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->mathematics}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">English:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->english}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">Physics:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->physics}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">Chemistry:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->chemistry}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <label for="name" class="col-sm-4 col-md-4 col-lg-3 control-label">Biology:</label>
                                                          <p class="col-sm-9 col-md-6 col-lg-6">{{$result->biology}}</p>
                                                    </div>
                                                @endif
                                                </div>
                                                <div class="col-md-3 col-lg-3">
                                                  <label for="name" class="col-sm-12 col-md-12 col-lg-12 control-label"><strong><i class="text-primary">Passport Section</i></storng></label>
                                                    <div id="jstrefresh">
                                                  @if(isset($student->user->images[0]->url))
                                                    @if(date("Y-m-d", strtotime($student->user->images[0]->updated_at)) > '2021-08-10')
                                                      <img class="ml-2 img-thumbnail rounded" src="{{$student->user->images[0]->url}}" height="80" width="120" alt="Generic placeholder image">
                                                      @else
                                                      <input type="file" name="pport" class="form-control col-md-12" id="pdata">
                                                      <input type="hidden" name="stid" value="{{$student->id}}">
                                                      <button class="btn-info" type="uploadpp" id="uploadpp">Upload</button>
                                                      @endif
                                                  @else
                                                    <input type="file" name="pport" class="form-control col-md-12" id="pdata">
                                                    <input type="hidden" name="stid" value="{{$student->id}}">
                                                    <button class="btn-info" type="uploadpp" id="uploadpp">Upload</button>
                                                  @endif
                                                </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary btn-sm">Update Profile</button>
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

@section('admin.scripts')
  $("#uploadpp").click(function(e){
    e.preventDefault();
    var file = $("input[name=pport]").prop('files')[0];
    if(file == undefined){
    var mark='<p class="text-center text-danger jstref">You need to upload a jpeg/jpg file</p>'
            $('.jstref').empty();
            $('#jstrefresh').append(mark);
    }else{
    var form = new FormData();
            form.append('media', file);
            form.append('stid', $('input[name=stid]').val());
            form.append("_token", "{{ csrf_token() }}");
    var url = "{{ route('students.upload')}}";
    $(this).prop("disabled", true);
    $.ajax({
      type: "POST",
      url: url,
      cache: false,
      contentType: false,
      processData: false,
      data:form,
      success: function(data){

        if(data != 'false'){
        $('#jstrefresh').empty();
            var newurl= data;
            var mark= '<img class="ml-2 img-thumbnail rounded" src='+newurl+' height="80" width="120" alt="Generic placeholder image">';
              $('#jstrefresh').append(mark);
        }else{
            var mark='<p class="text-center text-danger">Passport Upload failed!! </p>'
            $('#jstrefresh').append(mark);
        }

      }
      }); $(this).prop("disabled", false);
      }
  });



@endsection
