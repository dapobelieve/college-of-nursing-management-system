@extends('layouts.app')
@section('title')
Portal - Dashboard
@endsection
@section('content')

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
                      @else
                        <strong>Current Level : <label class="col-md-8 col-form-label text-md-left  text-primary ml-3">
                          @if($student->department_id == 3) <!-- to choose post basic midwifery -->
                            @if($student->level == 100)
                              {{'First year'}}
                            @else
                              {{'Second year'}}
                            @endif
                          @else
                            {{ $student->level }}
                          @endif</label></strong>
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
