@extends("admin.main")

@section("content")
    <style>
        .item3{
            background-color: rgba(0,0,0,.3);
        }
        .table-container{
            width: 96%;
            margin: 0 auto;
        }
    </style>
<div id="root">
    <div class="table-container">
        <table class="layui-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>性别</th>
                <th>注册时间</th>
                <th>电话号码</th>
                <th>昵称</th>
                <th>VIP</th>
                <th>是否企业</th>
                <th>企业ID</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{$item["id"]}}</td>
                    <td>{{$item["username"]}}</td>
                    <td>{{$item["sex"]}}</td>
                    <td>{{$item["regtime"]}}</td>
                    <td>{{$item["phonenum"]}}</td>
                    <td>{{$item["nickname"]}}</td>
                    <td>{{$item["isvip"]}}</td>
                    <td>{{$item["isCom"]}}</td>
                    <td>{{$item["spareId"]}}</td>
                    <td style="display: flex">
                        <button class="layui-btn layui-btn-normal">查看</button>
                        <button	class="layui-btn layui-btn-normal">编辑</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>

</script>
@endsection
