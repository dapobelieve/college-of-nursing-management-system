@extends('layouts.app')

@section('title')
Portal - Course Registration
@endsection
@section('content')

        <div class="col-sm-9">

            <div class="card">
              <div class="card-header text-center bg-success">Dashboard - Tuition Fee Payment</div>
              <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                        <select class="form-control col-md-2" id="session_t" name="session_t" required>
                          <option value=""> </option>
                          <option value="">{{$sess->value}} </option>

                        </select>

                        <label for="tuition" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Payment type') }}</strong></label>
                        <select class="form-control col-md-2" id="pay_type" name="pay_type" required>
                          @if($payType['half'] == $payType['full'])
                          <option value="{{$payType['half']}}">{{$payType['half']}}</option>
                          @else
                          <option value="{{$payType['full']}}">{{$payType['full']}}</option>
                        <!--  <option value="{{$payType['half']}}">{{$payType['half']}}</option>   -->
                          @endif
                        </select>

                        <label for="tuition" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Select Level') }}</strong></label>
                        <select class="form-control col-md-2" id="pay_level" name="pay_level" required>
                          <option value="{{$level}}"> </option>
                          <option value="{{$level}}">{{$level."L"}}</option>
                        </select>
                      </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="text-danger col-md-5"><strong id="not_ify"></strong></div>
                    </div>

                      <div class="form-group row">
                        <label class="col-md-3"><strong>Amount to be paid :</strong></label>
                        <input class="form-control col-md-6 @error('amount') is-invalid @enderror" id="pdata" value="{{ old('amount') }}" readonly required>
                        @error('amount')
                            <span class="invalid-feedback col-md-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                            <input type="hidden" name="orderID" value="345">
                            <input type="hidden" name="amount" id="pdata2">
                            <input type="hidden" name="first_name" value="{{$user->first_name}}">
                            <input type="hidden" name="last_name" value="{{$user->last_name}}">
                          @if($student->department_id == 2)
                            <input type="hidden" name="subaccount" value="ACCT_r4tbfc69hne489y">
                          @else
                            <input type="hidden" name="subaccount" value="ACCT_90wcdxusucx3hm0">
                          @endif
                            <input type="hidden" id="metadata" name="metadata" value="{{json_encode($array = ['student_id' => $student->id, 'matric_no' => $student->matric_no, 'session' => $sess->value, 'payment_type'=> 'Portal'])}}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
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
        </div>
    </div>
</div>
@endsection

@section('script')
$(document).ready(function(e){
  var url = "{{ URL::action('PayTuitionController@payAjax', ['lvl'=>'lvl', 'type'=>'type'])}}";

    $('#pay_level').change(function(){
    var valueD = $('#pay_level').val();
    var valueP = $('#pay_type').val();

    url = url.replace("lvl", valueD);
          $.ajax({
            type:"GET",
            dataType: 'json',
            url: url.replace("type", valueP),
            success: function(results){

              var result = results.amount;
              $('#pdata').val(result + 300);
              var result2 = (result +300)+""+0+""+0;
              $('#pdata2').val(result2);
              $('#not_ify').html('You are about to make "'+valueP+'" payment with bank charges of 300');

              var obj =$('#metadata').val();
              obj = JSON.parse(obj);
              obj.pay_status = results.pay_status;
              obj.reg_status = results.reg_status;
              obj.lvl = results.lvl
              obj = JSON.stringify(obj);
              $('#metadata').val(obj);
          }
        });


      });

      });

@endsection
