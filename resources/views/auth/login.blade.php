<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | eLibrary Management System</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo text-center">
            <img src="{{ asset('images/logo.png') }}" alt="" width="300" height="120">
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    @if(count($errors))
                    <div class="msg">
                        Sign in failed for following errors
                    </div>
                    @else
                    <div class="msg">
                        Sign in to visit admin area
                    </div>
                    @endif
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus autocomplete="off" value="{{ old('username') }}">
                        </div>
                        @if($errors->first('username'))
                        <span class="help-text" style="color: darkred; font-style: italic;">
                            {{ $errors->first('username') }}
                        </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" value="1" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ url('/') }}">Back to Home?</a>
                        </div>
                        <div class="col-xs-6 align-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src=" {{ asset("js/vendor.js") }}"></script>
    <script src=" {{ asset("js/app.js") }}"></script>
</body>
</html>