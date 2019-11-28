@extends('admin.layout.template')

@section('admin-title')
    Departments
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Lecturers</h1>
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
                    @if($lecturers->count())
                        <table class="table table-bordered table-striped table-hover data-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lecturers as $lecturer)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$lecturer->user->first_name." ". $lecturer->user->last_name }}</td>
                                    <td>{{$lecturer->rank}}</td>
                                    <td>{{$lecturer->department->name}}</td>
                                    <td>{{$lecturer->user->email}}</td>
                                    <td>{{$lecturer->user->phone}}</td>
                                    <td>
                                        <a href="{{route('lecturers.edit', ['lecturers' => $lecturer->id])}}">Edit</a> |
                                        <form style="display: inline" id="lecturers-{{$lecturer->id}}"
                                              method="post"
                                              action="{{route('lecturers.destroy', ['lecturers' => $lecturer->id])}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{csrf_field()}}
                                        </form>
                                        <a onclick="event.preventDefault();
                                            if (confirm('Are you sure you want to delete this record?')) document.getElementById('lecturers-{{$lecturer->id}}').submit()" href="{{route('lecturers.destroy', ['lecturers' => $lecturer->id])}}">Delete</a>
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
