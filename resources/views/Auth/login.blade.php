<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/dashboard/css/font-awesome.css" />
    <link rel="stylesheet" href="/dashboard/css/unicorn-login.css" />
    <script type="text/javascript" src="js/respond.min.js"></script>
</head>
<body>
    <div id="container">
    <div id="logo">
      @if(Session::has('error'))
          <div class="alert alert-info">
              {{Session::get('error')}}
              <a href="#" data-dismiss="alert" class="close">×</a>
          </div>
      @endif
    </div>
    <div id="loginbox">
      <form method="post"  action="{{ route('dashboard.login') }}">
            <p>Login</p>
            <div class="input-group input-sm">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span><input class="form-control" name="email" type="email" placeholder="Email" />
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                <input class="form-control" name="password" type="password" placeholder="Password" />
            </div>
            <div class="form-actions clearfix">
                <div class="pull-left">
                    <a href="#registerform" class="flip-link to-register blue">Create new account</a>
                </div>
                <div class="pull-right">
                    <a href="#recoverform" class="flip-link to-recover grey">Forgot password?</a>
                </div>
                <input type="submit" class="btn btn-block btn-primary btn-default" value="Login" />
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
</body>
</html>
