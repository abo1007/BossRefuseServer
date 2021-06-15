@extends("admin.main")

@section("content")
    <style>
        .item1 {
            background-color: rgba(0, 0, 0, .3);
        }

        .table-container {
            width: 80%;
            margin: 0 auto;
        }
    </style>
    <div id="root">

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
                    <th>公司名称</th>
                    <th>工作地址</th>
                    <th>显示状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($workfaces as $item)
                    <tr>
                        <td>{{$item["workId"]}}</td>
                        <td>{{$item["workTitle"]}}</td>
                        <td>{{$item["workSalary"]}}</td>
                        <td>{{$item["workPublisher"]}}</td>
                        <td>{{$item["workCateId"]}}</td>
                        <td>{{$item["workComId"]}}</td>
                        <td>{{$item["workComName"]}}</td>
                        <td>{{$item["workComCity"]}} {{$item["workComArea"]}}</td>
                        <td>{{$item["show"]==0?"展示":"下架"}}</td>
                        <td>
                            <button class="layui-btn">查看</button>
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
                    $.get("{{\Illuminate\Support\Facades\URL::current()}}" + "/noshow/" + id, (res, status) => {
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
                    $.get("{{\Illuminate\Support\Facades\URL::current()}}" + "/toshow/" + id, (res, status) => {
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
    </script>
@endsection
