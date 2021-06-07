<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" href="{{asset("css/main.less")}}">
    <link rel="stylesheet" href="{{asset("layui/css/layui.css")}}">

    <title>模板框架</title>
    <script src="{{asset("js/less.min.js")}}"></script>
    <script src="{{asset("layui/layui.js")}}"></script>
</head>
<?php
    date_default_timezone_set("PRC");
?>
<body>
    <div id="app">
        <div class="header">
            <div class="left">
                <p class="title">boss直拒 管理端</p>
            </div>
            <div class="right">
                <p class="time">{{date('H:i:s', time())}}</p>
                <p class="time">{{date('Y-m-d l', time())}} </p>
            </div>
        </div>
        <div class="main">
            <div class="nav">
                <div class="item item1" onclick="goHref('recruit')">
                    <i class="layui-icon layui-icon-table"></i>
                    <p>招聘管理</p>
                </div>
                <div class="item item2" onclick="goHref('enterprise')">
                    <i class="layui-icon layui-icon-flag"></i>
                    <p>企业管理</p>
                </div>
                <div class="item item3" onclick="goHref('user')">
                    <i class="layui-icon layui-icon-username"></i>
                    <p>账户管理</p>
                </div>
                <div class="item item4" onclick="goHref('advert')">
                    <i class="layui-icon layui-icon-layouts"></i>
                    <p>广告管理</p>
                </div>
                <div class="item item5" onclick="goHref('more')">
                    <i class="layui-icon layui-icon-set"></i>
                    <p>更多管理</p>
                </div>
                <div class="item item6" onclick="goHref('about')">
                    <i class="layui-icon layui-icon-more"></i>
                    <p>关于系统</p>
                </div>

            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        function goHref(url) {
            location.href = '{{url("admin")}}' + '/' + url;
        }
    </script>
</body>
</html>
