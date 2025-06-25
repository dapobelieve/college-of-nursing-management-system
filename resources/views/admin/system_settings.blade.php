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
        <div class="container">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12 col-lg-12 text-center">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="fa fa-th"></i>
                            </span>
                            <h5>System settings</h5>
                        </div>
                        <div class="widget-content nopadding">
                            
                                @foreach($errors->all() as $error)
                                <span>
                                    <strong style="color: red">*{{ $error }}</strong> <br>
                                    </span>
                                @endforeach
                                @if(Session::has('error'))
                                <span>
                                    <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                                    </span>
                                @endif
                            
                            @if(Session::has('success'))
                                <div class="alert alert-info">
                                    {{Session::get('success')}}
                                    <a href="#" data-dismiss="alert" class="close">×</a>
                                </div>
                            @endif
                            <form method="post" action="{{route('settings.update')}}" class="form-horizontal">
                                <table class="settings-table" style="background-color: #3F3B3B;font-size:13px; color:white">
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
                                                <input type="text" name="current_session" value="{{$settings['current_session']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Reg. No starts (e.g CNM/21B/)</td>
                                            <td>
                                                <input type="text" name="registration_number" value="{{$settings['registration_number']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Open Date</td>
                                            <td>
                                                <input type="date" name="admission_open_date" value="{{$settings['admission_open_date']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Close Date</td>
                                            <td>
                                                <input type="date" name="admission_close_date" value="{{$settings['admission_close_date']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Late Payment Fee</td>
                                            <td>
                                                <input type="number" name="late_payment_fee" value="{{$settings['late_payment_fee']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Payment Fee</td>
                                            <td>
                                                <input type="number" name="admission_payment_fee" value="{{$settings['admission_payment_fee']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Acceptance Payment Fee</td>
                                            <td>
                                                <input type="number" name="acceptance_payment_fee" value="{{$settings['acceptance_payment_fee']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Exam Date For Nursing</td>
                                            <td>
                                                <input type="date" name="admission_exam_date_nursing" value="{{$settings['admission_exam_date_nursing']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Exam Date For Midwifery</td>
                                            <td>
                                                <input type="date" name="admission_exam_date_midwifery" value="{{$settings['admission_exam_date_midwifery']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Maintenance</td>
                                            <td>
                                              @if($settings['maintenance'] == 'YES')
                                              <input type="checkbox" name="maintenance" class="custom-control-input"  checked id="customControlAutosizing">
                                              <label class="badge badge-success">ENABLED</label><span> unclick to disable maintenace</span>
                                              @else
                                              <input type="checkbox" name="maintenance" class="custom-control-input" id="customControlAutosizing">
                                              <label class="badge badge-danger">DISABLED</label><span> click to enable maintenace</span>
                                              @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admission Subaccount (Access)</td>
                                            <td>
                                                <input type="text" name="admission_sub_account" value="{{$settings['admission_sub_account']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nursing Subaccount</td>
                                            <td>
                                                <input type="text" name="GNursing_sub_account" value="{{$settings['GNursing_sub_account']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Basic Midwifery Subaccount</td>
                                            <td>
                                                <input type="text" name="BMidwifery_sub_account" value="{{$settings['BMidwifery_sub_account']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Current Session A</td>
                                            <td>
                                                <input type="text" name="current_sessionA" value="{{$settings['current_sessionA']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Current Session B</td>
                                            <td>
                                                <input type="text" name="current_sessionB" value="{{$settings['current_sessionB']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Support Email Address</td>
                                            <td>
                                                <input type="text" name="Support_Email" value="{{$settings['Support_Email']}}" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sender's Domain Email</td>
                                            <td>
                                                <input type="text" name="Domain_Email" value="{{$settings['Domain_Email']}}" class="form-control" required>
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
