@extends('admin.layout.template')
@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Roles</h1>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/roles" class="current">Roles</a>
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
                            <h5>User Roles</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>No.Users</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-center">{{ $role->users()->count() }}</td>
                                            <td class="text-center">
                                            <a href="/admin/edit-role/{{$role->id}}" class="btn btn-default btn-sm">Permissions</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
