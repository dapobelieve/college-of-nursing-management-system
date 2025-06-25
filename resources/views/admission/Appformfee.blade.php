@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | About Us")

@section('pagename')
Application Form Fee
@stop

@section('site.content')

<div class="container my-5">
  <div class="col-md-12">
    @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('warning'))
  <div class="alert alert-danger" role="alert">
    {{Session::get('warning')}}
  </div>
  @endif
</div>
  

<!-- to list the previous application -->

<div class="row ">
    @foreach($card as $val)
      <div class="col-sm-5">
            <div class="couse" style="background-color:#946d6a; color:white; padding: 10px">
                <h4>Previous Application</h4>
                <div class="star-rating">
                    <i class="fa fa-window-close-o" aria-hidden="true"></i>
                    <i class="fa fa-window-close-o" aria-hidden="true"></i>
                </div>
                <p>Welcome {{$user->metadata}}</p>
            </div>
            <div class="course_duration text-right">
                 <button 
                 class="toggle-section-btn btn btn-info"
                 data-id="{{ $val->id }}"
               {{ $val->is_closed ? 'disabled' : '' }}
               >
                <i class="fa fa-window-close-o" aria-hidden="true"></i> {{$val->is_closed ? 'Closed' : 'View' }}
            </button>
            </div>
      </div>
      @if($val->is_closed)
        <div class="col-sm-2"> </div>
          <div class="col-sm-5">
            <div class="couse" style="background-color:#c3d4a9; color:white; padding: 10px">
                    <h4>New Application</h4>
                    <div class="star-rating">
                        <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                        <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                    </div>
                    <p>Welcome {{$user->metadata}}</p>
                </div>
                <div class="course_duration text-right">
                    <button class="btn btn-info toggle-section-btn" data-id="stable" data-value="new"><span><i class="fa fa-plus" aria-hidden="true"></i></span> Apply</button>
                </div>
          </div>
      @endif
    @endforeach
    @if($card->isEmpty())
        <div class="col-sm-4"> </div>
          <div class="col-sm-5">
            <div class="couse" style="background-color:#c3d4a9; color:white; padding: 10px">
                    <h4>New Application</h4>
                    <div class="star-rating">
                        <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                        <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                    </div>
                    <p>Welcome {{$user->metadata}}</p>
                </div>
                <div class="course_duration text-right">
                    <button class="btn btn-info toggle-section-btn" data-id="stable" data-value="new"><span><i class="fa fa-plus" aria-hidden="true"></i></span> Apply</button>
                </div>
          </div>
    @endif
  
</div>

<br>

    <div class="row" >
        <div class="col-12">
            <div class="alert alert-info text-center" role="alert">
                <div class="toggle-section" style="display: none;">
                    This is to notify that the Email address 
                 <p class="text-warning"><span><i class="fa fa-envelope" aria-hidden="true"></i></span><b>{{$user->email}}</b></p> 
                 belongs to 
                 <p class="text-warning"><span><i class="fa fa-male" aria-hidden="true"></i></span><b>{{$user->metadata}}</b></p>
                  <hr>
                </div>
                  
                    @if($settings->value >= date("Y-m-d"))
                    <p class="toggle-show" style="display: none;">Click on " Pay Now » " button below to confirm your payment on behalf of the Email address and Name indicated above</p>
                    @endif
                  @if($payment != null)
                    <p class="toggle-hide" style="display: none;">You have successfully generated a PIN. <a href="{{route('admission.login')}}">click here</a> To complete your application process </p>
                  @endif
            </div>
        </div>
    </div>
    
    
    
        @if($settings->value >= date("Y-m-d"))
        <div id="toggle-id-stable" class="modal-dialog" style="display: none;">
            <div class="row">
                <p class="col-md-12"> <label for=""class="col-sm-6">Payment description :</label>  <span class="badge badge-info col-sm-4">Application Form Fee</span></p>
                <p class="col-md-12"> <label for="" class="col-sm-6">Amount :</label>  <span class="badge badge-info col-sm-4">=N=__{{$payment}}</span></p>
                <p class="col-md-12"> <label for=""class="col-sm-6">Bank and Transaction fees :</label>  <span class="badge badge-info col-sm-4">=N=__300</span></p>
                <p class="col-md-12"> <label for=""class="col-sm-6">Total :</label>  <span class="badge badge-info col-sm-4">=N=__{{$payment + 300}}</span></p>
            </div>
    
          <form method="post" action="{{ route('appformfee.pay') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
              <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
              <input type="hidden" name="orderID" value="">
              <input type="hidden" name="amount" value='{{($payment + 300 )* 100}}'>
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="subaccount" value='{{$subaccount}}'> <!--ACCESS-->
              <input type="hidden" name="metadata" value="{{json_encode($array = ['student_id' => $user->id, 'payment_type'=> 'Admission', 'Appname' => $user->metadata, 'phone' => $user->phone, 'dob' => $user->dob, 'rounds' => $rounds])}}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
              <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
              <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
              {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
            
               <button type="submit" name="submit" class="col-sm-12 btn btn-sm btn-success">Pay Now</button>
         </form>
    
            @else
                <b class="badge badge-danger text-center">Admission Form Closed!!!</b>
            @endif
        </div>
    
    @if($payment != null)
     @foreach($card as $val)
    <div id="{{ 'toggle-id-'.$val->id }}" class="modal-dialog" style="display: none;">
      <div class="row">
        <p class="col-md-12"> <label for=""class="col-sm-6">Registration No :</label>  <span class="badge badge-info col-sm-4">{{$val->reg_no}}</span></p>
        <p class="col-md-12"> <label for="" class="col-sm-6">Pin :</label>  <span class="badge badge-info col-sm-4">{{$val->pin}}</span></p>
        <a href="{{route('appformfee.PDF', ['Cardapplicant' => $val->id])}}"><button type="button" class="btn btn-outline-info btn-sm">PRINT</button></a>
      </div>
    </div>
    @endforeach
    @endif
    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4"> <a href="{{route('appformfee.logout')}}"> <button  class="btn btn-outline-info btn-sm">Log out</button></a></div>
    </div>
    

</div>


@stop
@section('site.scripts')
$(document).ready(function () {
     let oldId = null;

    $('.toggle-section-btn').on('click', function () {
        const id = $(this).data('id');
        const value = $(this).data('value');

        $('.toggle-section').toggle();
        if (oldId === id) {
            $('#toggle-id-' + id).slideUp(); // or use .hide()
            $('.toggle-show').hide();
            $('.toggle-hide').hide();
            oldId = null;
            return;
        }

        if (oldId !== null) {
            $('.toggle-section').toggle();
            $('#toggle-id-' + oldId).slideUp(); // or use .hide()
        }
        if(id === "stable"){
            $('.toggle-show').show();
            $('.toggle-hide').hide();
        }else{
            $('.toggle-show').hide();
            $('.toggle-hide').show();
        }
        $('#toggle-id-' + id).slideDown(); 

        // Update embedded values
        $('#embedded-value').text(value);
        $('#hidden-value').val(value);

        // Store current as old for next time
        oldId = id;
    });
});

@stop