@extends('admin.layout.template')

@section('admin-title')
    Departments
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Departments</h1>
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
                    @if($departments->count())
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Department</th>
                            <th>HOD</th>
                            <th>Department's Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->hod}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>
                                        @if (Gate::allows('edit-department'))
                                        <a href="{{route('departments.edit', ['department' => $data->id])}}">Edit</a>
                                        @if (Gate::allows('delete-department')) |
                                        <form style="display: inline" id="department-{{$data->id}}"
                                              method="post"
                                              action="{{route('departments.destroy', ['department' => $data->id])}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{csrf_field()}}
                                        </form>
                                        <a onclick="event.preventDefault();
if (confirm('Are you sure you want to delete this record?')) document.getElementById('department-{{$data->id}}').submit()" href="{{route('departments.destroy', ['department' => $data->id])}}">Delete</a>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No Departments!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop
