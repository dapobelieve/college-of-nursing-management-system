@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | About Us")

@section('pagename')
Activate Card
@stop

@section('site.content')

<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{Session::get('success')}}
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
                              <div class="col-md-12">
                                  <div class="well">
                                      <form method="POST" action="{{route('activate.store')}}" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <label for="username" class="control-label">Provide Password to activate</label>
                                                <input type="password" class="form-control" name="passage"  required title="Please enter activation password" placeholder="provide password to activate">
                                                <span class="help-block"></span>
                                            </div>
                                          <div class="form-group">
                                              <label for="username" class="control-label">Registration No.</label>
                                              <input type="text" class="form-control" name="reg_no"  required title="Please enter Registration number on the card" placeholder="provide reg. no on the card">
                                              <span class="help-block"></span>
                                          </div>
                                          <div class="form-group">
                                              <label for="password" class="control-label">Password</label>
                                              <input type="password" class="form-control" name="password" required title="Please enter the pin on the card">
                                              <span class="help-block"></span>
                                          </div>
                                          <div class="checkbox">

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
