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
    <div >
        <form class="form-signin" method="post" action="/register/reg_data">
            {{csrf_field()}}
            <h2 class="form-signin-heading">Register</h2>
            <label for="inputNickName">昵称</label>
            <input type="text" name="nick_name" id="inputNickName" style="width: 500px;" class="form-control" placeholder="nickname" required autofocus>
            <label for="inputAge">年龄</label>
            <input type="text" name="age" id="inputAge" style="width: 500px;" class="form-control" placeholder="nickname" required autofocus>
            <label for="inputEmail">邮箱</label>
            <input type="email" name="u_email" id="inputEmail" style="width: 500px;" class="form-control" placeholder="@" required autofocus>
            <label for="inputPassword" >密码</label>
            <input type="password" name="u_pass" id="inputPassword" style="width: 500px;" class="form-control" placeholder="***" required>
            <label for="inputPassword2" >确认密码</label>
            <input type="password" name="u_pass2" id="inputPassword2" style="width: 500px;"  class="form-control" placeholder="***" required>
            <button type="submit" class="btn btn-info">注册</button>
            <a href="http://passprot.tactshan.com/login/passprot_login"><button type="button" class="btn btn-success">去登陆</button></a>
        </form>
    </div>
</body>
