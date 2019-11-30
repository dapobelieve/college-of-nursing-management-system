@extends('layouts.app')

@section('title')
Portal - Course Registration
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center text-white bg-dark">Get a scratch card</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('portal.check2store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Provide Pin') }}</label>

                            <div class="col-md-4">
                                <input id="pin" type="text" class="form-control @error('pin') is-invalid @enderror" name="pin" value="{{ old('pin') }}" required autocomplete="pin">

                                @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Provide Serial number') }}</label>

                            <div class="col-md-4">
                                <input id="serial_no" type="text" class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" value="{{ old('serial_no') }}" required>

                                @error('serial_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-3">
                    <div class="col-lg-12 offset-md-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                      </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
