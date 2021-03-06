@extends('layouts.app')
@section('title')
Portal - Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-3">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list"  href="{{route('portal.dashboard')}}" role="tab" aria-controls="home">Home</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list"  href="{{route('portal.tuition')}}" role="tab" aria-controls="profile">Pay Tuition</a>
              <a class="list-group-item list-group-item-action" id="list-messages-list"  href="{{route('portal.coursereg')}}" role="tab" aria-controls="messages">Course Registration</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list"  href="{{route('portal.tuitionhistory')}}" role="tab" aria-controls="settings">Payment History</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list"  href="{{route('portal.reghistory')}}" role="tab" aria-controls="settings">Registration History</a>
            </div>
      </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center bg-success text-white">Dashboard - Brief Biodata</div>

                <div class="card-body bg-light">
                  <div class="row">
                    <div class="col-md-10">
                    <strong><label class="col-md-6 col-form-label text-md-left text-uppercase">{{ $user->last_name.", ".$user->first_name." ".$user->middle_name }}</label></strong>

                    </div>
                    <div class="col-md-2">
                      <div class="media">
                        <img class="ml-2 img-thumbnail rounded" src="{{$user->images[0]->url}}" height="80" width="120" alt="Generic placeholder image">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      @if($student != null)
                      <strong>Index No : <label class="col-md-8 col-form-label text-md-left  text-primary ml-5">{{ $student->matric_no}}</label></strong>
                      @endif
                    </div>
                    <div class="col-md-12">
                      <strong>Fullname : <label class="col-md-8 col-form-label text-md-left  text-primary ml-5">{{ $user->last_name.", ".$user->first_name." ".$user->middle_name }}</label></strong>
                    </div>
                    <div class="col-md-12">
                      @if($payment != null)
                      <strong>Current Level : <label class="col-md-8 col-form-label text-md-left  text-primary ml-3">{{substr($payment->reference, 4,3)}}</label></strong>
                      @endif
                    </div>
                    <div class="col-md-12">
                      <strong>Department : <label class="col-md-8 col-form-label text-md-left  text-primary ml-4">{{$dept->name}}</label></strong>
                    </div>
                    <div class="col-md-12">
                      <strong>State of Origin : <label class="col-md-8 col-form-label text-md-left  text-primary ml-3">{{ $state->name }}</label></strong>
                    </div>
                    <div class="col-md-12">
                      <strong>Phone number : <label class="col-md-8 col-form-label text-md-left  text-primary ml-3">{{ $user->phone }}</label></strong>
                    </div>
                  </div>
                  <br>
                  <hr>
                  <div class="row">
                    <?php use Carbon\Carbon; ?>
                    <div class="col-md-6">
                      <div class="col-md-12">
                         <label class="col-md-12 col-form-label text-md-left text-primary"><strong class="text-success">Current Session :</strong><span class="ml-5"> {{ $session->value }}</span></label>

                        <label class="col-md-12 col-form-label text-md-left text-primary"><strong class="text-success">Registration Status : </strong><span class="ml-4 badge badge-info">{{ $late }}</span></label>

                        <label class="col-md-12 col-form-label text-md-left text-primary"><strong class="text-success">Registration Closes : </strong><span class="ml-4">{{ $sess->expiry_date }}</span></label>

                        <label class="col-md-12 col-form-label text-md-left text-primary"><strong class="text-success">Late Registration Closes : </strong><span class="ml-2">{{$latedate }}</span></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md-12 col-form-label text-md-right text-primary"><strong class="text-success ">Current Semester : </strong></label>
                      @if($payment != null)
                      <label class="col-md-12 col-form-label text-md-right text-primary"><strong class="text-success ">Tuition Fee Payment : </strong><span class="badge badge-info">{{$payment->status." / ".substr($payment->reference, 4,3)}}</span></label>
                      @endif
                      <label class="col-md-12 col-form-label text-md-right text-primary"><strong class="text-success ">Course Registration : </strong></label>
                      </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
