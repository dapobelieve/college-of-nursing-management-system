@extends('admin.layout.template')

@section('admin-title')
    Register Student
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Register Student</h1>
        </div>
        <div id="breadcrumb">
            <a href="{{route('dashboard.home')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{route('students.create')}}" class="current">Student</a>
            <a href=""><strong>{{$students->last_name.", ".$students->first_name}}</strong></a>
        </div>
        <div class="container-fluid">
            <br />
            <form method="POST" action="{{ route('students.addresult') }}" enctype="multipart/form-data">
                @csrf

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                      <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Exam type') }}</label>
                      <div class="col-md-6">
                        <select class="form-control" id="exam-type" name="exam_type" required>
                            <option value=""> </option>
                            <option value="WAEC">WAEC</option>
                            <option value="NECO">NECO</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Exam number') }}</label>

                      <div class="col-md-6">
                          <input id="exam_no" type="text" class="form-control @error('exam_no') is-invalid @enderror" name="exam_no" value="{{ old('exam_no') }}" required autocomplete="exam_no" autofocus placeholder="Waec/Neco">

                          @error('exam_no')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <input type="hidden" name="student_id" value="{{$students->student->id}}">
                <!--<div class="form-group row">
                      <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Upload Result') }}</label>

                      <div class="col-md-6">
                          <input id="result_upload" type="file" class="form-control @error('result_upload') is-invalid @enderror" name="result_upload" value="{{ old('result_upload') }}" required>

                          @error('result_upload')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>-->
                </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Mathematics') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" id="mathematics" name="mathematics" required>
                              <option value=""> </option>
                              <option value="A1">A1</option>
                              <option value="B2">B2</option>
                              <option value="B3">B3</option>
                              <option value="C4">C4</option>
                              <option value="C5">C5</option>
                              <option value="C6">C6</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('English') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" id="english" name="english" required>
                              <option value=""> </option>
                              <option value="A1">A1</option>
                              <option value="B2">B2</option>
                              <option value="B3">B3</option>
                              <option value="C4">C4</option>
                              <option value="C5">C5</option>
                              <option value="C6">C6</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Biology') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" id="biology" name="biology" required>
                              <option value=""> </option>
                              <option value="A1">A1</option>
                              <option value="B2">B2</option>
                              <option value="B3">B3</option>
                              <option value="C4">C4</option>
                              <option value="C5">C5</option>
                              <option value="C6">C6</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Physics') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" id="physics" name="physics" required>
                              <option value=""> </option>
                              <option value="A1">A1</option>
                              <option value="B2">B2</option>
                              <option value="B3">B3</option>
                              <option value="C4">C4</option>
                              <option value="C5">C5</option>
                              <option value="C6">C6</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Chemistry') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" id="chemistry" name="chemistry" required>
                              <option value=""> </option>
                              <option value="A1">A1</option>
                              <option value="B2">B2</option>
                              <option value="B3">B3</option>
                              <option value="C4">C4</option>
                              <option value="C5">C5</option>
                              <option value="C6">C6</option>
                          </select>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="form-group row ml-4">
              <div class="col-md-12 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Result Registration') }}
                  </button>
                </div>
              </div>
            </form>

                </div>
            </div>
        </div>

@stop
