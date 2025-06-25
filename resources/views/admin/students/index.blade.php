@extends('admin.layout.template')

@section('admin-title')
    Students
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Students</h1>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/students" class="current">Students</a>
        </div>
        <div class="container-fluid">
          @if(Session::has('success'))
              <strong style="color: green">* {{ Session::get('success') }}</strong>
          @endif
          <div class="row">
            <div class="col-xs-6">
              <div class="dropdown">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Sort by department  <span class="caret"></span></button>
                  <ul class="dropdown-menu dropdown-info">
                    @foreach($dept as $department)
                      <li class="divider"></li>
											<li><a href="{{route('students.index2dep', ['id' => $department->id])}}">{{$department->name}}</a>
                    @endforeach
										</ul>
                </div>
            </div>

            <div class="col-xs-6 nopadding">
              <form class="form-inline">
                @csrf
                <div class="form-group mx-sm-3 mb-2 input-group nopadding">
                  <input type="text" class="form-control  @error('user') is-invalid @enderror" value="{{ old('user') }}" name="user" placeholder="Search by Matric_no/Email" required>
                  @error('user')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              <!--   <input class="btn btn-primary mb-2" type="submit" value="Submit">-->
               <button type="submit"  id="studentapproved" class="btn btn-primary mb-2" title="search student with reference or email"> <i class="fa fa-search"></i>Search</button>
              </form>
            </div>

          </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="fa fa-th"></i>
                            </span>
                            <h5>Students</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @if ($students->count() > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Matric.No</th>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id='justclear'>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{$student->user->last_name." ".$student->user->first_name." ".$student->user->middle_name}}</td>
                                                <td>{{ $student->matric_no }}</td>
                                                <td>{{ $student->department->name }}</td>
                                                @if($student->user->is_active == "ACTIVE")
                                                <td><label class="badge badge-success">{{ $student->user->is_active}}</label></td>
                                                @else
                                                  <td><label class="badge badge-danger">{{ $student->user->is_active}}</label></td>
                                                @endif
                                                <td class="text-center">
                                                    <a href="{{route('students.edit', ['student' => $student->id])}}" class="btn btn-primary btn-sm">Details</a>

                                                    <a href="{{route('students.showresult', ['id' => $student->id])}}" class="btn btn-info btn-sm">Add Result</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                              <div id="justclear2">{{ $students->links() }}</div>

                            @else
                                <div class="p-5 text-center">
                                    <p class="lead">0 students found!</p>
                                </div>
                            @endif

                            <div class="container">
                            <div class="row">
                              <label class="text text-danger">*Extra care needs to be taken while updating*</labe>
                            </div>
                            <div class="row" style="">
                              <form class="form-inline" method="post" action="{{ route('students.matricCSV') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" style="background-color:#91908c;">
                                  <label for="inputPassword2" class="sr-only">Excel File</label>
                                  <input type="hidden" name="_method" value="PUT">
                                  <select id="sel-val" class="form-control input-sm" name="csv_option" required>
                                                        <option selected value="">Select</option>
                                                        <option value="matric_no">Update Matric No.</option>
                                                        <option value="level">Upgrade Level</option>
                                                        <option value="reg_student">Register Student</option>
                                                    </select>
                                    <label id="sel-msg" class="text-danger"></label>
                                    <input id="name" value="{{ old('file_csv') }}" type="file" placeholder="Upload a csv file" title="" name="file_csv" class="form-control input-sm" required/>
                                    @error('file_csv')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" title="Import a CSV file accordingly">Import Excel</button>
                              </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('admin.scripts')

$(function () {
$('[data-toggle="popover"]').popover()
})


  $("#sel-val").click(function(){
    if($("#sel-val").val() == "level"){
    $("#sel-msg").empty();
    $("#sel-msg").html('it must contain two columns of matric no and level respectively');
    }else if($("#sel-val").val() == "matric_no"){
        $("#sel-msg").empty();
        $("#sel-msg").html('it must conatin two columns which is admission no and matric no respectively');
    }else if($("#sel-val").val() == "reg_student"){
        $("#sel-msg").empty();
        $("#sel-msg").html('this must contain student details');
    }else{
    $("#sel-msg").empty();
    }
});


  $("#studentapproved").click(function(e){
    e.preventDefault();
    var user = $("input[name=user]").val();

    var url = "{{ route('students.search')}}";
    $(this).prop("disabled", true);
    $.ajax({
      type: "POST",
      url: url,
      data:{user:user,  "_token": "{{ csrf_token() }}"},
      success: function(data){
        $('#justclear').empty();
        $('#justclear2').empty();
        if(data != false){

        var newurl ="{{route('students.edit', ['studentss' => 'studentss'])}}";
        newurl = newurl.replace("studentss", data.id);
        var newurl2 ="{{route('students.showresult', ['id' => 'id'])}}";
        newurl2 = newurl2.replace("id", data.id)
        var details = "<a href="+newurl+" title='Edit student Details'>Details</a>";
        var addscore = "<a href="+newurl2+" title='Edit student Details'>Add Result</a>";
        if (data.is_active = "ACTIVE") {
          var act = "<label class='badge badge-success'>"+data.is_active+"</label>";
        } else {
          var act = "<label class='badge badge-danger'>"+data.is_active+"</label>";
        }
        var mark = "<tr><td>"+data.id+"</td><td>"+data.last_name+" "+data.first_name+" "+data.middle_name+"</td><td>"+data.department_id+"</td><td>"+act+"</td><td>"+details+" | "+addscore+"</td></tr>";
        $('#justclear').append(mark);

      }else{
        $('#justclear').append("<b>NO Matric number or email address present</b>");
      }
      }
      }); $(this).prop("disabled", false);
  });



@endsection
