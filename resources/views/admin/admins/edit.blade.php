@extends('admin.layout.template')

@section('admin-title')
    Edit Admin
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Admins</h1>
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
                                        <form method="post" action="{{route('admins.update', $admin)}}" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">First Name*:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" value="{{ old('first_name', $admin->user->first_name) }}" type="text" placeholder="First Name" name="first_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Middle Name*:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" value="{{ old('middle_name', $admin->user->middle_name) }}" type="text" placeholder="Middle Name" name="middle_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Last Name*:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" value="{{ old('last_name', $admin->user->last_name) }}" type="text" placeholder="Last Name" name="last_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Password:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" type="password" placeholder="Password" name="password" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Retype Password:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" type="password" placeholder="Retype Password" name="c_password" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Permission Level*:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control" name="permission_level" id="" required>
                                                        <option selected value="">Select a permission level for the admin</option>
                                                        <option value="basic" @if ($admin->permission_level == 'basic')selected @endif>Basic</option>
                                                        <option value="intermediate" @if ($admin->permission_level == 'intermediate')selected @endif>Intermediate</option>
                                                        <option value="super" @if ($admin->permission_level == 'super')selected @endif>Super</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                            {{ csrf_field() }}{{ method_field('PUT') }}
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

@stop
