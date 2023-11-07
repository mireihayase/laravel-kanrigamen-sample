<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/root.css">
    <title>Login</title>
</head>

<body>
    <form class="login-form"
          action="{{ url('login') }}" enctype="multipart/form-data" method="post">
        <div class="login-area-out">
            <div class="login-area-in"><img class="login-logo" src="../img/logo.png"></div>
            <div class="login-area-in">
                <p class="login-title">管理者認証</p>
                <div class="login-area-in">
                    <p class="login-error">
                        {{isset($message)?$message:''}}<br>
                    </p>
                </div>
            </div>
            <div class="login-area-in">
                <input class="login-input" type="text" name="login_id" id="login_id" value="{{$login_id ?? ''}}"
                       placeholder="{{__("attributes.login.login_id")}}" required="required">
            </div>
            <div class="login-area-in">
                <input  class="login-input" type="password" name="login_pw" id="login_pw" value=""
                        placeholder="{{__("attributes.login.login_pw")}}" required="required">
            </div>
            <div class="login-area-in">
                <button class="login-button">認証</button>
            </div>
            <div class="login-area-in">
            </div>
            @csrf
        </div>
    </form>
    <script src="/js/common.js"></script>
</body>

</html>