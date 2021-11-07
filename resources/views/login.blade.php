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
        .top h1{
            font-weight: 200;
            color: #ffffff;
        }
        .content{
            padding:10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
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
                <h1>boss直拒 管理后台</h1>
            </div>
            <div class="content">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block" style="width: 80%;margin-left: 10px;">
                    <input type="text" name="title" required maxlength="16" id="username"
                           lay-verify="required" placeholder="请输入用户名"
                           autocomplete="off" class="layui-input opt">
                </div>
            </div>
            <div class="content">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block" style="width: 80%;margin-left: 10px;">
                    <input type="password" name="title" required maxlength="22" id="password"
                           lay-verify="required" placeholder="请输入密码"
                           autocomplete="off" class="layui-input opt">
                </div>
            </div>
            <div class="bottom">
                <button class="login_btn" onclick="login()">登录</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset("layui/layui.js")}}"></script>
    <script>
        let layer;
        layui.use('layer', function(){
            layer = layui.layer;

        });
        function login() {
            let username = jQuery('#username').val();
            let password = jQuery('#password').val();


            console.log("{{\Illuminate\Support\Facades\URL::asset('admin/login')}}")
            axios.post("{{\Illuminate\Support\Facades\URL::asset('admin/login')}}",{username,password}).then(res => {
                console.log(res)
                if(res.data.code == 200){
                    location.href = '{{url("admin")}}';
                }else{
                    layer.open({
                        title: '登录'
                        ,content: '账户密码不匹配'
                    });
                }
            })
            {{--location.href = '{{url("admin")}}';--}}
        }
    </script>
</body>
</html>
