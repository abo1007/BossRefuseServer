@extends("admin.main")

@section("content")
    <style type="">
        .item6 {
            background-color: rgba(0, 0, 0, .3);
        }

        #root {
            height: 100%;
            width: 100%;
        }

        .top {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .top img {
            height: 200px;
            width: 200px;
            border-radius: 20px;
        }

        .cen {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cen h1 {
            font-weight: 100;
            font-size: 50px;
        }

        .cen p {
            font-weight: 100;
            font-size: 30px;
            display: flex;
            align-items: center;
        }
        .about-content{
            padding:20px 0;
            display: flex;
            justify-content: center;
        }
        .about-content p{
            font-size:24px;
        }
    </style>
    <div id="root">
        <div class="top">
            <img src="{{asset("img/boss.png")}}" alt="boss直拒">
        </div>
        <div class="cen">
            <h1>boss直拒</h1>
            <p>提供一站式招聘平台解决方案</p>
        </div>
        <div class="about-content">
            <p>管理端版本号 : 1.0.0</p>
        </div>
    </div>
    <script>

    </script>

@endsection
