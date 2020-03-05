@extends('layouts.app')

@section('title')
Portal - Course Registration
@endsection
@section('content')

        <div class="col-md-9">
            <div class="card">
              <div class="card-header bg-success text-center">Dashboard - Course Registration <span class="text-uppercase"> ({{$user->last_name." ".$user->first_name}})</span></div>
              <form method="POST" action="{{ route('portal.coursereg') }}" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="col">

                  </div>
                  <div class="col">
                    <div class="form-group row">
                      <label for="department" class="col-md-8 col-form-label text-md-right">{{ __('Select session paid for') }}</label>
                      <input type="hidden" name="hidde" id="hidde" value='{{$dept->id}}'>
                        <div class="col-md-4">
                          <select class="form-control" id="reg_session" name="reg_session" required>
                            <option value=""> </option>
                            @if($level['first'] == $level['second'])
                              <option value="{{$level['first']}}">{{$level['first']}}</option>
                            @else
                              <option value="{{$level['first']}}">{{$level['first']}}</option>
                              @if($timed == "elapsed")
                                <option value="{{$level['second']}}">{{$level['second']}}</option>
                              @endif
                            @endif
                          </select>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="form-group row">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Unit</th>
                            <th>Department</th>
                            <th>Register</th>
                          </tr>
                          </thead>
                          <tbody id="coursedata">

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0 ml-3">
                  <div class="col-md-12 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Register Courses') }}
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    $(document).ready(function(e){
      var url = "{{ URL::action('CourseController@recieveAjax', ['id'=>'id', 'dept'=>'depta'])}}";

        $('#reg_session').change(function(){
        var valueD = $('#reg_session').val();
        var depart = $('#hidde').val();
        var deptname = "<?php echo $dept->name ?>";
              $.ajax({
                type:"GET",
                dataType: 'json',
                url: url.replace("id", valueD).replace("depta", depart),
                success: function(result){
                  var output ="";
                  for (var i = 0; i < result.length; i++) {
                    output +="<tr>";
                    output+= "<td>"+(i+1)+"</td>";
                    output+= '<td class="font-italic"><small>'+result[i].code+'</small></td>';
                    output+= '<td class="font-italic"><small>'+result[i].title+'</small></td>';
                    output+= "<td>"+result[i].units+"</td>";
                    output+= "<td>"+deptname+"</td>";
                    output+= '<td><input class="form-check-input ml-4" type="checkbox" name="cou_reg[]" value="'+result[i].id+'" id="remember" required></td>';
                    output += "</tr>";
                  }


                  $('#coursedata').html(output);
              }
            });


          });

          });
@endsection
