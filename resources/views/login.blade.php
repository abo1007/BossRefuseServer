<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boss-Login</title>
    <script src="{{asset("js/less.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("css/login.less")}}">
    <link rel="stylesheet" href="{{asset("layui/css/layui.css")}}">
    <style>
        #app{
            background:url("{{asset("img/login.jpg")}}") no-repeat center center;
        }
        label{
            color: #fff;
        }
        .opt{
            background: rgba(0,0,0,.2);
            width:85%;
            color: #fff;
            border-radius:5px;
            height: 50px;
        }
        .top{
            padding:30px 0;
            display: flex;
            justify-content: center;
        }
        .content{
            padding:10px 0;
        }
        .bottom{
            padding:30px 0;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="login">
            <div class="top">
                <h1>boss直拒 管理端</h1>
            </div>
            <div class="content">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required
                           lay-verify="required" placeholder="请输入用户名"
                           autocomplete="off" class="layui-input opt">
                </div>
            </div>
            <div class="content">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                    <input type="password" name="title" required
                           lay-verify="required" placeholder="请输入密码"
                           autocomplete="off" class="layui-input opt">
                </div>
            </div>
            <div class="bottom">
                <button class="login_btn" onclick="login()">登录</button>
            </div>
        </div>
    </div>
    <script>
        function login() {
            location.href = '{{url("admin")}}';
        }
    </script>
</body>
</html>
