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
                                        <form method="post" action="{{route('courses.update', ['course' => $course->id])}}" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Department</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" name="department_id" id="">
                                                        @foreach($departments as $dep)
                                                            <option @if($course->department->id == $dep->id) selected @endif value="{{$dep->id}}">{{$dep->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Course Title:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" value="{{ $course->title }}" type="text" placeholder="Department Name" name="title" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Course Code:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" value="{{ $course->code }}" type="text" placeholder="Code" name="code" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Course Units:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" min="1" value="{{ $course->units }}" type="number" placeholder="Units" name="units" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Semester:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control" name="semester" id="">
                                                        <option @if($course->semester == 1) selected @endif value="1">First</option>
                                                        <option @if($course->semester == 2) selected @endif value="2">Second</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="level" class="col-sm-3 col-md-3 col-lg-2 control-label">Level:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="level" min="100" value="{{ $course->level }}" type="number" placeholder="Level" name="level" class="form-control input-sm" />
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
