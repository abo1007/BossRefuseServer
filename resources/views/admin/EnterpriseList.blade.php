@extends("admin.main")

@section("content")
    <style>
        .item2{
            background-color: rgba(0,0,0,.3);
        }
        .table-container{
            width: 96%;
            margin: 0 auto;
        }
        .list-top {
            width: 100%;
            height: 60px;
            background: rgba(0, 0, 0, .2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .list-top p {
            line-height: 60px;
            font-size: 20px;
            margin: 0 20px;
            cursor: pointer;
        }

        .list-top button {
            margin-right: 20px;
        }
        .com-info{
            width: 96%;
            margin: 10px auto;
            background-color: #1b4b72;
            border-radius: 20px;
            padding:10px 20px;
        }
        .com-info .com-name{
            font-size: 24px;
            margin:10px 0;
            color: #fff;
            font-weight: bold;
        }
        .com-info .row{
            display: flex;
        }
        .com-info .row p{
            flex: 1;
            color: #fff;
        }
    </style>
    <div id="root">
        <div class="list-top">
            <p onclick="location.href = '{{url("admin/enterprise")}}'">< 返回</p>
        </div>
        <div class="com-info">
            <p class="com-name">{{$com->workComName}}</p>
            <div class="row">
                <p>企业法人：{{$com->workComPerson}}</p>
                <p>企业全名：{{$com->workComAllName}}</p>
            </div>
            <div class="row">
                <p>企业规模：{{$com->workComScale}}</p>
                <p>注册资本：{{$com->workComCap}}</p>
            </div>
            <div class="row">
                <p>注册日期：{{$com->workComDate}}</p>
                <p>行业分类：{{$com->workComCate}}</p>
            </div>
            <div class="row">
                <p>企业所在地：{{$com->workComCity}} {{$com->workComArea}}</p>
                <p>企业留言：{{$com->workComIntro}}</p>
            </div>
        </div>
        <div class="table-container">
            <table class="layui-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>招聘标题</th>
                    <th>薪资</th>
                    <th>编辑者</th>
                    <th>工作分类</th>
                    <th>公司ID</th>
                    <th>显示状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($works as $item)
                    <tr>
                        <td>{{$item["workId"]}}</td>
                        <td>{{$item["workTitle"]}}</td>
                        <td>{{$item["workSalary"]}}</td>
                        <td>{{$item["workPublisher"]}}</td>
                        <td>{{$item["workCateId"]}}</td>
                        <td>{{$item["workComId"]}}</td>
                        <td>{{$item["show"]==0?"展示":"下架"}}</td>
                        <td>
                            <button class="layui-btn" onclick="toInfo({{$item["workId"]}})">查看</button>
                            <button class="layui-btn layui-btn-warm"
                                    onclick="toShow({{$item["show"]}}, {{$item["workId"]}})">{{$item["show"]==0?"下架":"展示"}}</button>
                            <button class="layui-btn layui-btn-danger" onclick="todel({{$item["workId"]}})">删除</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function toShow(state, id) {
            if (state == 0) {
                layer.confirm('确定要下架该招聘信息吗', {
                    btn: ['确定', '取消'] //可以无限个按钮
                }, function (index, layero) {
                    layer.closeAll();
                    $.get("{{url('admin/recruit')}}" + "/noshow/" + id, (res, status) => {
                        if(res.code == 200){
                            layer.msg('下架成功');
                            location.reload();
                        }else{
                            layer.msg('下架失败');
                        }
                    })

                }, function (index) {
                    return;
                });

            } else {
                layer.confirm('确定要上架该招聘信息吗', {
                    btn: ['确定', '取消'] //可以无限个按钮
                }, function (index, layero) {
                    layer.closeAll();
                    $.get("{{url('admin/recruit')}}" + "/toshow/" + id, (res, status) => {
                        if(res.code == 200){
                            layer.msg('上架成功');
                            location.reload();
                        }else{
                            layer.msg('上架失败');
                        }
                    })
                }, function (index) {
                    return;
                });

            }
        }
        function todel(id) {
            layer.confirm('确定要删除该招聘信息吗', {
                btn: ['确定', '取消'] //可以无限个按钮
            }, function (index, layero) {
                layer.closeAll();
                layer.msg("您无此权限")
                {{--$.get("{{\Illuminate\Support\Facades\URL::current()}}" + "/del/" + id, (res, status) => {--}}
                {{--    if(res.code == 200){--}}
                {{--        layer.msg('删除成功');--}}
                {{--        location.reload();--}}
                {{--    }else{--}}
                {{--        layer.msg('删除失败');--}}
                {{--    }--}}
                {{--})--}}
            }, function (index) {
                return;
            });
        }
        function toInfo(id) {
            location.href = "{{url('admin/recruit')}}" + "/info/" +id;
        }
    </script>
@endsection
