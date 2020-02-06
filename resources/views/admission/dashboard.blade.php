@extends('admission.app')

@section('title')
Admission - Dashboard
@endsection
@section('content')

<div class="card">
    <div class="card-header text-center bg-success text-white">Dashboard - Welcome</div>

    <div class="card-body bg-light">
      @if($student->first_name != null)
      <div class="row">
        <div class="col-md-9">
          <h4>Name: {{$student->surname.", ".$student->first_name}}</h4>
        </div>
        @endif
        @if($student->pic_url != null)
        <div class="col-md-3">
          <img src="{{asset($student->pic_url)}}" alt="passport" height="100" width ="100">
        </div>
      </div>
      @endif
      @if($student->score == null)
      <div class="row">
        <div class="col-md-3">
          <strong><label class="col-md-12 col-form-label text-uppercase">Instructions:</label></strong>
        </div>
        <div class="col-md-9">
        <strong><label class="col-md-12 col-form-label text-md-left text-uppercase">You need to complete the
        application form before you are eligible to sit for the exam. </label></strong>
        <strong><label class="col-md-12 col-form-label text-md-left text-uppercase">
        Do not save until you are sure of the details provided </label></strong>
        <strong><label class="col-md-12 col-form-label text-md-left text-uppercase">Once the application is complete, make sure
        you make a print out, Not providing it during exam means you will forfiet your exam. </label></strong>
        <strong><label class="col-md-12 col-form-label text-md-left text-uppercase">After Examination, you can come back to Your
        dashboard to know your admission status </label></strong>
        <strong><label class="col-md-12 col-form-label text-md-left text-uppercase">
        Do not destroy the scratch card, it will be needed during your examination. </label></strong>
        <strong><label class="col-md-12 col-form-label text-md-left text-uppercase text-danger">
        Failure to provide the scratch card during examination will incur extra charges </label></strong>
        </div>
      </div>
      @endif
      @if($student->score != null)
      <div class="row">
        <div class="col-md-12">
          <label class="col-xs-4"><h4>Your Score is : <span class="badge badge-success">{{$student->score}}</span></h4></label>
        </div>
        <div class="col-md-12">
          @if($student->admission_status == 'YES')
          <label class="col-xs-4"><h4>Admission Status : <span class="badge badge-success">You Have been Admitted</span></h4></label>
          <div class="col-xs-4">
          <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo">Proceed to payment</button>
          </div>
            <div id="demo" class="collapse">
              <form  action="{{ route('payacceptance') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf

              <div class="col-md-12">
                <br>
                <h5 class=" col-sm-12">Bank Charges = N300</h5>
                <h5 class="col-sm-12">Acceptance is {{$amount}}</h5>


              <input type="hidden" name="email" value="{{$student->email}}"> {{-- required --}}
              <input type="hidden" name="orderID" value="">
              <input type="hidden" name="amount" value='{{$amount + $charges}}'>
              <input type="hidden" name="quantity" value="">
              <input type="hidden" name="subaccount" value="ACCT_oi8hw5t7cfm0ib6">
              <input type="hidden" name="metadata" value="{{json_encode($array = ['student_id' => $student->id, 'payment_type'=> 'Acceptance'])}}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
              <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
              <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
              {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

               <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

               <button type="button" name="submit" class="col-sm-12 btn btn-sm btn-success">Pay</button>
               </div>
               </form>
            </div>
          @else
          <label class="col-xs-4"><h4>Admission Status : <span class="badge badge-info">Sorry!! Check back later.</span></h4></label>
          @endif
        </div>


      </div>
      @endif
    </div>
  </div>
@stop
