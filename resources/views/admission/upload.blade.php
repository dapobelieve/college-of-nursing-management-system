@extends('admission.app')

@section('title')
Admission - Upload passport
@endsection
@section('content')

<div class="card">
  <div class="card-header text-center bg-success">Dashboard - Upload passport</div>
  <form method="POST" action="{{ route('upload.update', ['studentapplicant' => $id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="PUT">
    <div class="row">
      <div class="col card-body">
        <h4 class="text-center">You are to upload your passport.</h4>
        <p class="text-danger"><b>Note: You are to upload a passport that majorly captures your face. if otherwise, you will not be qualified</b></p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-group row">



          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="text-danger col-md-5"><strong id="not_ify"></strong></div>
        </div>
        <div class='row form-group'>
            <div class='col-lg-4'>
                <label>
                    Choose your course : ----></label>
            </div>
            <div class='col-lg-4'>

                <select class="form-control input-sm" name="course" id="" required>
                    <option selected value="">Select</option>
                    @foreach($dept as $dep)
                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

          <div class="form-group row">
            <label class="col-md-3"><strong>Upload passport:</strong></label>

                <strong>Upload size should not be more 100kb</strong>

            <input type="file" name="pport_upload" class="form-control col-md-6 @error('pport_upload') is-invalid @enderror" id="pdata"  required>
            @error('pport_upload')
                <span class="invalid-feedback col-md-3" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


          </div>
        </div>
      </div>

      <div class="form-group row mb-0 ml-5">
      <div class="col-md-12 offset-md-4">
          <button type="submit" class="btn btn-primary" value="Pay Now!">
              {{ __('Upload') }}
          </button>
        </div>
      </div>
    </div>
  </form>
</div>


@stop
@section('script')

@stop
