@extends('admin.layout.template')

@section('admin-title')
    Import Applicant's Result
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Import applicant's Result</h1>
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
                                        <form method="post" action="{{route('applicants.addresultfile')}}" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Upload Spreadsheet:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="name" value="{{ old('file_csv') }}" type="file" placeholder="Upload a csv file" title="upload student result via this format 1:reg No 2:score and 3:admission status"name="file_csv" class="form-control input-sm" required/>
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
