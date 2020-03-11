@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | About Us")

@section('pagename')
Application Form Fee
@stop

@section('site.content')

<div class="container">
  <div class="col-md-12">
    @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{Session::get('success')}}
  </div>
  @endif
</div>
  <br>
  <br>
<div class="alert alert-info" role="alert">
  Kindly be made aware that the specified Email address <a href="#"><b>{{$user->email}}</b></a> belongs to <a href="#"><b>{{$user->metadata}}</b></a>
  <hr>
  @if($setting != null)
    <p>Click on " Pay Now » " button below to confirm your payment on behalf of the Email address and Name indicated above</p>
  @else
    <p>You have successfully generated a PIN. <a href="{{route('admission.login')}}">click here</a> To complete your application process </p>
  @endif
</div>
@if($setting != null)
<div id="login-overlay" class="modal-dialog">
  <div class="row">
    <p class="col-md-12"> <label for=""class="col-sm-6">Payment description :</label>  <span class="badge badge-info col-sm-4">Application Form Fee</span></p>
    <p class="col-md-12"> <label for="" class="col-sm-6">Amount :</label>  <span class="badge badge-info col-sm-4">=N=__{{$setting}}</span></p>
    <p class="col-md-12"> <label for=""class="col-sm-6">Bank and Transaction fees :</label>  <span class="badge badge-info col-sm-4">=N=__300</span></p>
    <p class="col-md-12"> <label for=""class="col-sm-6">Total :</label>  <span class="badge badge-info col-sm-4">=N=__{{$setting + 300}}</span></p>
  </div>

  <form method="post" action="{{ route('appformfee.pay') }}" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
  <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
  <input type="hidden" name="orderID" value="">
  <input type="hidden" name="amount" value='{{($setting + 300 )* 100}}'>
  <input type="hidden" name="quantity" value="">
  <input type="hidden" name="subaccount" value="ACCT_fx6yj9skdghwawz"> <!--WEMA-->
  <input type="hidden" name="metadata" value="{{json_encode($array = ['student_id' => $user->id, 'payment_type'=> 'Admission', 'Appname' => $user->metadata, 'phone' => $user->phone, 'reg_no' => $user->reg_no, 'dob' => $user->dob])}}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
  <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
  <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
  {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

   <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

   <button type="submit" name="submit" class="col-sm-12 btn btn-sm btn-success">Pay Now</button>
 </form>
</div>
@else
<div id="login-overlay" class="modal-dialog">
  <div class="row">
    <p class="col-md-12"> <label for=""class="col-sm-6">Registration No :</label>  <span class="badge badge-info col-sm-4">{{$card->reg_no}}</span></p>
    <p class="col-md-12"> <label for="" class="col-sm-6">Pin :</label>  <span class="badge badge-info col-sm-4">{{$card->pin}}</span></p>
    <a href="{{route('appformfee.PDF', ['Cardapplicant' => $card->id])}}"><button type="button" class="btn btn-outline-info btn-sm">PRINT</button></a>
  </div>
</div>

@endif
<div class="row">
  <label class="col-md-8"></label>
  <label class="col-md-4" > <a href="{{route('appformfee.logout')}}"> <button  class="btn btn-outline-info btn-sm">Log out</button></a></label>
</div>


</div>


@stop
