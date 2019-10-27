<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unicorn Admin</title>
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
{{--        <img src="img/logo.png" alt="" />--}}
    </div>
    <div id="loginbox">
        <form method="post"  action="{{ route('login') }}">
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
        <form id="registerform" action="#">
            <p>Enter information required to register:</p>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" type="text" placeholder="Enter Username" />
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" placeholder="Choose Password" />
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" placeholder="Confirm password" />
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input class="form-control" type="text" placeholder="Enter E-mail address" />
            </div>
            <div class="form-actions clearfix">
                <div class="pull-left">
                    <a href="#loginform" class="grey flip-link to-login">Click to login</a>
                </div>
                <div class="pull-right">
                    <a href="#recoverform" class="grey flip-link to-recover">Lost password?</a>
                </div>
                <input type="submit" class="btn btn-block btn-success" value="Register" />
            </div>
        </form>
    </div>
</div>
</body>
</html>
