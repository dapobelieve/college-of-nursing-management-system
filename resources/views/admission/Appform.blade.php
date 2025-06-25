@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Application form")

@section('pagename')
Application Form (Registration Page)
@stop

@section('site.content')
<div class="container">
  <div class="row font-weight-bold">
    <p>Registration Steps</p>
    <ul>
      <li>Register an Account on this page. The Email Address and phone number supplied has to be unique, and will serve as your Registration ID to make payment</li>
      <li>The name provided must be the real name of the applicant</li>
      <li>After successfully registering an Email Address, It will automatically sign you in, which you will eventually see a pay button</li>
      <li>Once you click pay, it will redirect you to the payment gateway where you will need to provide your card details</li>
      <li>After a successful payment, a registration number and a pin will be generated for you, and it will be used to complete your applicaton</li>
      <li>Each applicant should write down or print the registration number and the pin generated because it will be used for all other process</li>
      <li>If you have previously registered but yet to make payment, <a href="{{route('invoice.activateLogin')}}">click here to login</a> </li>
    </ul>
  </div>

</div>
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
               <div id="login-overlay" class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <span>
                                @foreach($errors->all() as $error)
                                    <strong style="color: red">*{{ $error }}</strong> <br>
                                @endforeach
                                @if(Session::has('error'))
                                    <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                                @endif
                            </span>

                          </div>
                        </div>
                        @if($settings->value >= date("Y-m-d"))
                       <form method="POST" action="{{route('invoice.store')}}">
                            @csrf
                        <div class="row">

                              <div class="col-lg-6">
                                            <div class="form-control-sm">
                                                <label for="username" class="control-label">Surname of Applicant</label>
                                                <input type="text" class="frt_nm form-control form-control-sm" name="last_name"  required  placeholder="provide surname">
                                                <span class="help-block"></span>

                                              <label for="username" class="control-label">Email Address</label>
                                              <input type="email" class="form-control form-control-sm" name="email"  required  placeholder="provide a valid email address">
                                              <span class="help-block"></span>

                                              <label for="password" class="control-label">password</label>
                                              <input type="password" class="form-control form-control-sm" name="password" required >
                                              <span class="help-block"></span>

                                              <label for="password" class="control-label">Applicant's DoB</label>
                                              <input type="date" class="form-control form-control-sm" name="dob" required >
                                              <span class="help-block"></span>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                                <div class="form-control-sm">
                                                    <label for="username" class="control-label">Firstname of Applicant</label>
                                                    <input type="text" class="frt_nm form-control form-control-sm" name="first_name"  required  placeholder="provide name of applicant">
                                                    <span class="help-block"></span>

                                                  <label for="username" class="control-label">Phone number</label>
                                                  <input type="number" class="form-control form-control-sm" name="phone"  required placeholder="provide a valid phone number">
                                                  <span class="help-block"></span>

                                                  <label for="password" class="control-label">Confirm password</label>
                                                  <input type="password" class="form-control form-control-sm" name="password_confirmation" required >
                                                  <span class="help-block"></span>

                                                <!--  <label for="password" class="control-label">Course/Program</label>
                                                  <select class="form-control" name="course" required>
                                                      <option seleted="" value="">select </option>
                                                      <option value="BMID-">Basic Midwifery</option> 
                                                   <option value="NUR-">Basic General Nursing</option>
                                                  </select>-->
                                                  <span class="help-block"></span>
                                              </div>

                                              <button type="submit" class="btn btn-warning" id="js-subscribe-btn">Submit</button>
                                              <b>Have you signed up? if yes  <a href="{{route('invoice.activateLogin')}}">click here to login</a></b>

                                      </div>
                                </div>
                              </form>
                              @else
                              <b class=" container badge badge-danger text-center">Site under maintenance</b>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--//End Login -->

@stop
@section('site.scripts')
<script type="text/javascript">



$('.frt_nm').keydown(function(e) {
    if (e.keyCode == 32) {
        return false;
    }
});

/*$('[type=date]').datepicker({
    format: 'yyyy-mm-dd'
});*/

</script>
@stop
