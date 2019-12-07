@extends('admin.layout.template')

@section('admin-title')
    Create Fee
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Fees</h1>
        </div>
        <div id="breadcrumb">
            <a href="{{route('dashboard.home')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
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
                                        <form method="post" action="{{route('fees.store')}}" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Department</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" name="department_id">
                                                        @foreach ($departments as $dept)
                                                            <option value="{{$dept->id}}" @if ($dept->id == old('department_id'))selected @endif>{{$dept->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Level</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" name="level">
                                                        @foreach (['100', '200', '300', '400', '500'] as $level)
                                                            <option value="{{$level}}" @if ($level == old('level'))selected @endif>{{$level}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Description" class="col-sm-3 col-md-3 col-lg-2 control-label">Indigene</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input value="{{ old('indigene') }}" id="amount" name="indigene" placeholder="Indigene Fee" type="number" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Description" class="col-sm-3 col-md-3 col-lg-2 control-label">Non indigene</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input value="{{ old('non_indigene') }}" id="amount" name="non_indigene" placeholder="Non indigene Fee" type="number" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
            </div>
        </div>
    </div>

@stop
