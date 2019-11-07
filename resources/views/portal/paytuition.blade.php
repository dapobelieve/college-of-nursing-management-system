@extends('layouts.app')

@section('title')
Portal - Course Registration
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{route('portal.dashboard')}}" role="tab" aria-controls="home">Home</a>
          <a class="list-group-item list-group-item-action active" id="list-profile-list"  href="{{route('portal.tuition')}}" role="tab" aria-controls="profile">Pay Tuition</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list"  href="{{route('portal.coursereg')}}" role="tab" aria-controls="messages">Course Registration</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list"  href="{{route('portal.payHistory')}}" role="tab" aria-controls="settings">Payment History</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list"  href="{{route('portal.reghistory')}}" role="tab" aria-controls="settings">Registration History</a>
        </div>
      </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-header text-center bg-success">Dashboard - Tuition Fee Payment</div>
              <form method="POST" action="{{ route('portal.tuition') }}" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="col card-body">
                    <p class="text-center">You are to select the available session as appropriate and also select the proper level that you are. Please note that once registration is closed for a particular session, extra charges will be incurred.</p>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="form-group row">
                        <label for="tuition" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Select Session') }}</strong></label>
                        <select class="form-control col-md-3" id="session_t" name="session_t" required>
                          <option value=""> </option>
                          <option value="">{{$session->session}} </option>

                        </select>
                        <label for="tuition" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Select Level') }}</strong></label>
                        <select class="form-control col-md-3" id="pay_level" name="pay_level" required>
                          <option value=""> </option>
                          <option value="100">100L</option>
                          <option value="200">200L</option>
                          <option value="300">300L</option>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3"><strong>Amount to be paid :</strong></label>
                        <input class="form-control col-md-6" name="pay_tuition" id="paydata" readonly required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0 ml-3">
                  <div class="col-md-12 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Make Payment') }}
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
$(document).ready(function(e){
  var url = "{{ URL::action('PayTuitionController@payAjax', ['lvl'=>'lvl'])}}";

    $('#pay_level').change(function(){
    var valueD = $('#pay_level').val();

          $.ajax({
            type:"GET",
            dataType: 'json',
            url: url.replace("lvl", valueD),
            success: function(result){

              $('#paydata').val(result);
          }
        });


      });

      });

@endsection
