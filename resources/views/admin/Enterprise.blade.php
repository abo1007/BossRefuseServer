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
    </style>
<div id="root">
    <div class="table-container">
        <table class="layui-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>公司名称</th>
                <th>公司法人</th>
                <th>公司全名</th>
                <th>公司规模</th>
                <th>创立日期</th>
                <th>行业分类</th>
                <th>特点</th>
                <th>城市</th>
                <th>企业简介</th>
                <th>注册资本(万)</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($coms as $item)
                <tr>
                    <td>{{$item["workComId"]}}</td>
                    <td>{{$item["workComName"]}}</td>
                    <td>{{$item["workComPerson"]}}</td>
                    <td>{{$item["workComAllName"]}}</td>
                    <td>{{$item["workComScale"]}}</td>
                    <td>{{$item["workComDate"]}}</td>
                    <td>{{$item["workComCate"]}}</td>
                    <td>{{$item["workComTag"]}}</td>
                    <td>{{$item["workComCity"]}} {{$item["workComArea"]}}</td>
                    <td>{{$item["workComIntro"]}}</td>
                    <td>{{$item["workComCap"]}}</td>
                    <td style="display: flex">
                        <button class="layui-btn layui-btn-normal" onclick="goInfo({{$item["workComId"]}})">查看</button>
                        <button	class="layui-btn layui-btn-normal">下架</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
function goInfo(comId) {
    location.href = '{{\Illuminate\Support\Facades\URL::current()}}' + '/' + comId;
}
</script>
@endsection
