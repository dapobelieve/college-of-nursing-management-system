@extends('admin.layout.template')

@section('admin-title')
    Admins
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Admins</h1>
            <div class="btn-group">
                <a href="{{route('admins.create')}}" class="btn btn-large" title="Create Admin"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/admins" class="current">Admins</a>
        </div>
        <div class="container-fluid">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="fa fa-th"></i>
                            </span>
                            <h5>Admins</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @if(Session::has('success'))
                                <div class="alert alert-info">
                                    {{Session::get('success')}}
                                    <a href="#" data-dismiss="alert" class="close">×</a>
                                </div>
                            @elseif(Session::has('error'))
                                <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                            @endif
                            @if ($admins->total() > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Permission Level</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->user->full_name }}</td>
                                                <td>{{ $admin->user->email }}</td>
                                                <td>{{ ucwords($admin->permission_level) }} Admin</td>
                                                <td class="text-center">
                                                    <a href="{{route('admins.edit', $admin)}}">Edit</a>
                                                    @if(Gate::allows('delete-admin', $admin)) |
                                                    <form style="display: inline" id="admin-{{$admin->id}}" method="post" action="{{route('admins.destroy', $admin)}}">{{ method_field("DELETE")}}{{csrf_field()}}</form>
                                                    <a onclick="event.preventDefault();if (confirm('Are you sure you want to delete this admin?')) document.getElementById('admin-{{$admin->id}}').submit()" href="{{route('admins.destroy', $admin)}}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $admins->links() }}
                            @else
                                <div class="p-5 text-center">
                                    <p class="lead">0 admins found!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
