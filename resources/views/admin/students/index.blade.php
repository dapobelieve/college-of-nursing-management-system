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
          <div class="row">
            <div class="col-sm-2">
              <label for="inputState">Sort by department</label>
              <div class="dropdown">
                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select by clicking
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($dept as $department)
                    <strong><a class="dropdown-item" href="{{route('students.index2dep', ['id' => $department->id])}}">{{$department->name}}</a></strong>
                    <br>
                    @endforeach
                  </div>
                </div>
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
                                    <tbody>
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
                                {{ $students->links() }}

                            @else
                                <div class="p-5 text-center">
                                    <p class="lead">0 students found!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
