@extends('admin.layout.template')

@section('admin-title')
    Courses
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
                    @if(Session::has('success'))
                        <div class="alert alert-info">
                            {{Session::get('success')}}
                            <a href="#" data-dismiss="alert" class="close">×</a>
                        </div>
                    @endif
                    @if($courses->count())
                        <table class="table table-bordered table-striped table-hover data-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Code</th>
                                <th>Units</th>
                                <th>Level</th>
                                <th>Semester</th>
                                <th>Department</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->units}}</td>
                                    <td>{{$data->level}}</td>
                                    <td>{{$data->semester}}</td>
                                    <td>{{$data->department->name}}</td>
                                    <td>
                                        @if (Gate::allows('edit-course'))
                                        <a href="{{route('courses.edit', ['courses' => $data->id])}}">Edit</a>
                                        @if (Gate::allows('delete-course')) |
                                        <form style="display: inline" id="courses-{{$data->id}}"
                                              method="post"
                                              action="{{route('courses.destroy', ['courses' => $data->id])}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{csrf_field()}}
                                        </form>
                                        <a onclick="event.preventDefault();
                                            if (confirm('Are you sure you want to delete this record?')) document.getElementById('courses-{{$data->id}}').submit()" href="{{route('courses.destroy', ['courses' => $data->id])}}">Delete</a>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$courses->links()}}
                        </table>
                    @else
                        <p>No Courses yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop
