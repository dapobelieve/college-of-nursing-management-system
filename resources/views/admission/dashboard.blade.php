@extends('admission.app')

@section('title')
Portal - Course Registration
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
      @if($student->score != null)
      <div class="row bg-info">
        <div class="col-md-12">
          <label class="col-xs-4"><h4>Your Score is : <span class="badge badge-success">{{$student->score}}</span></h4></label>
        </div>
        <div class="col-md-12">
          @if($student->admission_status == 'YES')
          <label class="col-xs-4"><h4>Admission Status : <span class="badge badge-success">You Have been Admitted</span></h4></label>
          @else
          <label class="col-xs-4"><h4>Admission Status : <span class="badge badge-danger">Sorry!! You are not admitted</span></h4></label>
          @endif
        </div>


      </div>
      @endif
    </div>
  </div>
@stop
