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
               <div id="login-overlay" class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="well">
                                      <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                                          <div class="form-group">
                                              <label for="username" class="control-label">Username</label>
                                              <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                              <span class="help-block"></span>
                                          </div>
                                          <div class="form-group">
                                              <label for="password" class="control-label">Password</label>
                                              <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
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
