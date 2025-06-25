@extends('admission.app')

@section('title')
Admission - Payment Dashboard
@endsection
@section('content')

<div class="card">
  <div class="card-header text-center bg-success">Dashboard - Pay for Form</div>
  <form method="POST" action="{{ route('payadmission') }}" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col card-body">
        <h4 class="text-center">You are to make payment so that your application can be valid.</h4>
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
          <div class="col-md-12">
            <p class="text-success">Note: (Bank Charges = N300)</p>
          </div>
          <div class="form-group row">
            <label class="col-md-3"><strong>Amount to be paid :</strong></label>
            <input class="form-control col-md-6 @error('amount') is-invalid @enderror" id="pdata" value="{{ $amount/100 }}" readonly required>
            @error('amount')
                <span class="invalid-feedback col-md-3" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="hidden" name="email" value="{{$student->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="">
            <input type="hidden" name="amount" value='{{$amount + $charges}}'>
            <input type="hidden" name="quantity" value="">
            <input type="hidden" name="subaccount" value="ACCT_oi8hw5t7cfm0ib6">
            <input type="hidden" name="metadata" value="{{json_encode($array = ['student_id' => $student->id, 'payment_type'=> 'Admission'])}}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}



          </div>
        </div>
      </div>

      <div class="form-group row mb-0 ml-3">
      <div class="col-md-12 offset-md-4">
          <button type="submit" class="btn btn-primary" value="Pay Now!">
              {{ __('Make Payment') }}
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

@stop
@section('script')

@stop
