@extends('admin.layout.template')

@section('admin-title')
    System Settings
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>System Settings</h1>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/students" class="current">system Settings</a>
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
                            <h5>System settings</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <span>
                                @foreach($errors->all() as $error)
                                    <strong style="color: red">*{{ $error }}</strong> <br>
                                @endforeach
                                @if(Session::has('error'))
                                    <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                                @endif
                            </span>
                            @if(Session::has('success'))
                                <div class="alert alert-info">
                                    {{Session::get('success')}}
                                    <a href="#" data-dismiss="alert" class="close">×</a>
                                </div>
                            @endif
                            <form method="post" action="{{route('settings.update')}}" class="form-horizontal">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Setting</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Current Session</td>
                                            <td>
                                                <input type="number" name="current_session" value="{{$settings['current_session']}}" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Open Date</td>
                                            <td>
                                                <input type="date" name="admission_open_date" value="{{$settings['admission_open_date']}}" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Close Date</td>
                                            <td>
                                                <input type="date" name="admission_close_date" value="{{$settings['admission_close_date']}}" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Late Payment Fee</td>
                                            <td>
                                                <input type="number" name="late_payment_fee" value="{{$settings['late_payment_fee']}}" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Payment Fee</td>
                                            <td>
                                                <input type="number" name="admission_payment_fee" value="{{$settings['admission_payment_fee']}}" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Acceptance Payment Fee</td>
                                            <td>
                                                <input type="number" name="acceptance_payment_fee" value="{{$settings['acceptance_payment_fee']}}" class="form-control">
                                            </td>
                                        </tr>
                                        {{--
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="" value="{{$settings['']}}" class="form-control">
                                                </td>
                                            </tr>
                                        --}}
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
