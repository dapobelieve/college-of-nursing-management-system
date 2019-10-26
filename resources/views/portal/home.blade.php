@extends('layouts.app')

@section('title')
Portal - Biodata
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center text-white bg-dark">Complete Registration</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('portal.biodata') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Index Number') }}</label>

                            <div class="col-md-6">
                                <input id="index_no" type="number" class="form-control @error('index_no') is-invalid @enderror" name="index_no" value="{{ old('index_no') }}" required autocomplete="number" autofocus placeholder="Index no">

                                @error('index_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Admission Number') }}</label>

                            <div class="col-md-6">
                                <input id="Admission_no" type="text" class="form-control @error('Admission_no') is-invalid @enderror" name="Admission_no" value="{{ old('Admission_no') }}" required autocomplete="Admission_no"  placeholder="Admission registration number">

                                @error('index_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" id="department" name="department" required>
                                <option value=""> </option>
                                @foreach ($department as $key => $value)
                                  <option value="{{$value->id}}"> {{$value->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                              <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>

                              <div class="col-md-6">
                                <select class="form-control" id="marital_sta" name="marital_sta" required>
                                  <option value=""> </option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Sponsors Name') }}</label>

                            <div class="col-md-6">
                                <input id="sponsor" type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" value="{{ old('sponsor') }}" required autocomplete="name">

                                @error('sponsor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Sponsors Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="sponsor_num" type="number" class="form-control @error('sponsor_num') is-invalid @enderror" name="sponsor_num" value="{{ old('sponsor_num') }}" required autocomplete="number">

                                @error('sponsor_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Birth Certiificate') }}</label>

                            <div class="col-md-6">
                                <input id="dob_upload" type="file" class="form-control @error('dob_upload') is-invalid @enderror" name="dob_upload" value="{{ old('dob_upload') }}" required>

                                @error('dob_upload')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lga" class="col-md-4 col-form-label text-md-right">{{ __('LGA Certiificate') }}</label>

                            <div class="col-md-6">
                                <input id="lga_upload" type="file" class="form-control @error('lga_upload') is-invalid @enderror" name="lga_upload" value="{{ old('lga_upload') }}" required>

                                @error('lga_upload')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                    </div>
                    <!--result part -->
                    <br>
                    <hr><label class="text-md-right">--Result--</label>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
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
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Upload Result') }}</label>

                            <div class="col-md-6">
                                <input id="result_upload" type="file" class="form-control @error('result_upload') is-invalid @enderror" name="result_upload" value="{{ old('result_upload') }}" required>

                                @error('result_upload')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
                    <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Portal Registration') }}
                        </button>
                      </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')



@endsection
