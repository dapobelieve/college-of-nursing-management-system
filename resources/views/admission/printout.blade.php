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
      <div class="row">
        <div class="col-md-6">
          <label for=""><b>Receipt :</b></label>
          <a href="{{route('printform.receiptPDF')}}"> <button type="button" class="btn btn-secondary">Print Receipt</button> </a>
        </div>
        <div class="col-md-6">
          <label for=""><b>Receipt :</b></label>
          <a href="{{route('printform.downloadPDF')}}"> <button type="button" class="btn btn-secondary">Print Reg. Form</button> </a>
        </div>
      </div>
    </div>
  </div>
@stop
