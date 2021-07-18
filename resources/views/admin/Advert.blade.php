@extends("admin.main")

@section("content")
    <style>
        .item4{
            background-color: rgba(0,0,0,.3);
        }
        .actions{
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .actions button{
            height: 40px;
            width: 200px;
            border-radius: 10px;
            color: #fff;
        }
        .photo-list{
            width: 90%;
            margin: 0 auto;
        }
        .layui-table tr{
            height: 50px;
        }
        .layui-table tr td{
            height: 50px;
            text-align: center;
        }
        .layui-table th{
            text-align: center;

        }
        .layui-table img{
            max-width: 100%;
        }
        img{
            height: 100%;
            width: auto;
        }
    </style>
    <div id="root">
        <div class="actions">
            <button class="layui-btn layui-btn-normal" onclick="">上传广告</button>

        </div>
        <div class="photo-list">
            <table class="layui-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>描述</th>
                    <th>预览</th>
                    <th>url</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($advert as $item)
                    <tr>
                        <td>{{$item["id"]}}</td>
                        <td>{{$item["desc"]}}</td>
                        <td>
                            <img src="{{asset($item["imgUrl"])}}" alt="预览">
                        </td>
                        <td>{{$item["imgUrl"]}}</td>
                        <td>{{$item["state"]==1?"展示":"下架"}}</td>
                        <td>
                            <button class="layui-btn layui-btn-warm"
                                    onclick="toShow({{$item["state"]}}, {{$item["workId"]}})">{{$item["state"]==1?"下架":"展示"}}</button>
                            <button class="layui-btn layui-btn-danger" onclick="todel({{$item["id"]}})">删除</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function toShow(state, id) {

        }
        function toDel(id) {

        }
    </script>

@endsection
