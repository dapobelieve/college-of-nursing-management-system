@extends('admin.layout.template')

@section('admin-title')
    Create Admin
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Create Admin</h1>
            <div class="btn-group">
                <a href="{{route('admins.index')}}" class="btn btn-large" title="Admins"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{route('admins.index')}}" title="Go to Admins" class="tip-bottom">Admins</a>
            <a href="{{route('admins.create')}}" class="current">Create Admin</a>
        </div>
        <div class="container-fluid">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="fa fa-align-justify"></i>
                            </span>
                            <h5>Create New Admin</h5>
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
                                <form method="post" action="{{route('admins.store')}}" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">First Name:</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <input id="name" value="{{ old('first_name') }}" type="text" placeholder="First Name" name="first_name" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Middle Name:</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <input id="name" value="{{ old('middle_name') }}" type="text" placeholder="Middle Name" name="middle_name" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Last Name:</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <input id="name" value="{{ old('last_name') }}" type="text" placeholder="Last Name" name="last_name" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Email:</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <input id="name" value="{{ old('email') }}" type="email" placeholder="Email" name="email" class="form-control input-sm" />
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
                                        <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Permission Level:</label>
                                        <div class="col-sm-9 col-md-6 col-lg-6">
                                            <select class="form-control" name="permission_level" id="" required>
                                                <option selected value="">Select a permission level for the admin</option>
                                                <option value="basic">Basic</option>
                                                <option value="intermediate">Intermediate</option>
                                                <option value="super">Super</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
