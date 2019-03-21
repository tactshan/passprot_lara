<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{URL::asset('/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{URL::asset('/bootstrap/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('/bootstrap/css/bootstrap.min.css')}}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<form class="form-signin" method="post" action="/login/login_data">
    {{csrf_field()}}
    <div align="center">
        <input type="hidden" name="request_url" value="{{$url}}">
        <h2 class="form-signin-heading">请登录 <h5><a href="http://passprot.tactshan.com/register/passprot_register">注册</a></h5></h2>
        <label for="inputEmail">Email</label>
        <input type="email" name="u_email" id="inputEmail" style="width: 200px;" class="form-control" required autofocus>
        <label for="inputPassword" >Password</label>
        <input type="password" name="u_pass" id="inputPassword" style="width: 200px;" class="form-control"required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" style="width: 200px;" type="submit" id='login'>Sign in</button>
    </div>
</form>
</body>
