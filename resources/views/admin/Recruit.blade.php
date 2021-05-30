@extends("admin.main")

@section("content")
<style>
    .item1{
        background-color: rgba(0,0,0,.3);
    }
    .table-container{
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
                <td>
                    <button class="layui-btn layui-btn-normal">查看</button>
                    <button	class="layui-btn layui-btn-normal">下架</button>
                    <button class="layui-btn layui-btn-normal">删除</button>
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
