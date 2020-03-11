@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Application form")

@section('pagename')
Application Form Login Page
@stop

@section('site.content')

<div class="login">
    <div class="container">
      <h3 class="font-weight-bold">Login page for Application form</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
              @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{Session::get('success')}}
            </div>
            @endif
               <div id="login-overlay" class="modal-dialog">
                  <div class="">
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
                        <form method="POST" action="{{route('invoice.storeLogin')}}">
                            @csrf
                        <div class="row">


                                        <div class="col-lg-8">
                                                  <div class="form-control-sm">
                                                      <label for="username" class="control-label">Email Address</label>
                                                      <input type="email" class="form-control form-control-sm" name="email"  required  placeholder="provide email address">
                                                      <span class="help-block"></span>

                                                    <label for="username" class="control-label">Password</label>
                                                    <input type="password" class="form-control form-control-sm" name="password"  required placeholder="provide password">
                                                    <span class="help-block"></span>

                                                </div>
                                              </div>
                                              <div class="col-lg-5">

                                              </div>
                                              <div class="col-xs-6">
                                                <button type="submit" class="btn btn-warning" id="js-subscribe-btn">login</button>
                                              </div>

                        </div>
                        </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--//End Login -->

@stop
