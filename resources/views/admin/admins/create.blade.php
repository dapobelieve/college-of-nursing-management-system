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
                            <form class="form-horizontal ajax-form" action="{{route('admins.store')}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" required>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
