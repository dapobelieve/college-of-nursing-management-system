@extends('admin.layout.template')

@section('admin-title')
  Applicants - Add Score
@endsection

@section('admin-content')

<div id="content">
    <div id="content-header">
        <h1>Add result Applicants</h1>
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
                                    <form method="post" action="{{route('applicants.update', ['studentapplicant' => $studentapplicant->id])}}" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Score:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input id="name" value="{{ $studentapplicant->score }}" type="text" placeholder="Provide Score" name="score" class="form-control input-sm" required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Admission Status.</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <select class="form-control input-sm" name="ad_sta" required>
                                                  <option value="{{$studentapplicant->admission_status}}">{{$studentapplicant->admission_status}}</option>
                                                  <option value="NO">NO</option>
                                                  <option value="YES">YES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
