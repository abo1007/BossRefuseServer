@extends("admin.main")

@section("content")
    <style type="">
        .item5 {
            background-color: rgba(0, 0, 0, .3);
        }

        #root {
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            padding:30px;
        }


    </style>
    <div id="root">
        <div class="center">
            <table class="layui-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>描述</th>
                    <th>图片展示</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($acts as $item)
                    <tr>
                        <td>{{$item["id"]}}</td>
                        <td>{{$item["name"]}}</td>
                        <td>{{$item["desc"]}}</td>
                        <td>
                            <img src="{{asset($item["imgurls"])}}" alt="预览">
                        </td>
                        <td>{{$item["state"]==1?"展示":"下架"}}</td>
                        <td>
                            <button class="layui-btn layui-btn-warm"
                                    onclick="toShow({{$item["state"]}}, {{$item["id"]}})">{{$item["state"]==1?"下架":"展示"}}</button>
                            <button class="layui-btn layui-btn-danger" onclick="todel({{$item["id"]}})">删除</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function toShow(state, id){

        }
        function todel(id) {

        }
    </script>

@endsection
