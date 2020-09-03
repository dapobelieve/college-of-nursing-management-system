@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | About Us")

@section('pagename')
admission Login
@stop

@section('site.content')

<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              @if(Session::has('success'))
            <div class="alert alert-danger" role="alert">
              {{Session::get('success')}}
            </div>
            @endif
               <div id="login-overlay" class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group row">
                                  <label for="exam_no" class="col-md-12 col-form-label text-md-right">{{ __('Please provide Reg No. and Pin number') }}</label>
                                  <div class="col-md-6">

                                  </div>
                              </div>
                            </div>
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
                              <div class="col-md-12">
                                  <div class="well">
                                      <form method="POST" action="{{route('admission.login')}}">
                                            @csrf
                                          <div class="form-group">
                                              <label for="username" class="control-label">Registration No.</label>
                                              <input type="text" class="form-control" name="username"  required title="Please enter Registration number" placeholder="provide reg No. details">
                                              <span class="help-block"></span>
                                          </div>
                                          <div class="form-group">
                                              <label for="password" class="control-label">Pin</label>
                                              <input type="password" class="form-control" name="password" required title="Please enter the password">
                                              <span class="help-block"></span>
                                          </div>
                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" name="remember" id="remember"> Remember login
                                              </label>
                                          </div>
                                          <button type="submit" class="btn btn-warning" id="js-subscribe-btn">LOG IN</button>                                          </form>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--//End Login -->

@stop
