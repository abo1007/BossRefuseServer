<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset("js/less.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("css/login.less")}}">
    <link rel="stylesheet" href="{{asset("layui/css/layui.css")}}">
    <style>
        #app{
            background:url("{{asset("img/login.jpg")}}") no-repeat center center;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="login">

            <button class="login_btn" onclick="login()">登录</button>
        </div>
    </div>
    <script>
        function login() {
            location.href = '{{url("admin")}}';
        }
    </script>
</body>
</html>
