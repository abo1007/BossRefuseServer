@extends("admin.main")

@section("content")
    <style>
        .item4{
            background-color: rgba(0,0,0,.3);
        }
        #root{
            padding: 30px 0;
        }
        .yulanimg{
            height:100px;
            width: 300px;
            display: none;
        }
    </style>
    <div id="root">
        <form class="layui-form" >

            <div class="layui-form-item">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" required id="name" lay-verify="required"
                           maxlength="14" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传</label>
                <button type="button" class="layui-btn" id="test1">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">预览</label>
                <img src="" alt="" class="yulanimg" id="ylimg">
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">是否展示</label>
                <div class="layui-input-block">
                    <input type="radio" name="show" value="1" title="展示" checked>
                    <input type="radio" name="show" value="2" title="下架">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="postData">立即提交</button>
                </div>
            </div>
        </form>

        <script>
            //Demo
            layui.use('form', function(){
                var form = layui.form;

                //监听提交
                form.on('submit(formDemo)', function(data){
                    if(!imgURL){
                        layer.msg("请上传图片");
                        return false
                    }
                    console.log(data.field)
                    jQuery.ajax({
                        method:"POST",
                        url:'{{url("admin/advert/post")}}',
                        data:{
                            imgUrl:imgURL,
                            name:data.field.name,
                            state:data.field.show
                        },
                        success:function (res) {
                            if(res.code == 200){
                                layer.msg("添加成功");
                                location.href = '{{url('admin/advert')}}';
                            }else{
                                layer.msg("服务器异常");
                            }
                        }
                    })

                    return false;
                });
            });

            let dom = document.querySelector("#ylimg");
            let imgURL = "";

            var upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#test1', //绑定元素
                url: '{{url("admin/photo")}}', //上传接口
                field:'img',
                done: function (res) {
                    //上传完毕回调
                    console.log(res)
                    if(res.code == 200){
                        dom.style.display = 'block';
                        dom.src = '/public'+res.data;
                        imgURL = res.data;
                    }else{
                        console.log("ERROR")
                    }
                },
                error: function () {
                    //请求异常回调
                }
            });



            function postData() {
                let name = jQuery('#name').val();
                let radio = $("input[name='show']:checked").val();
                console.log(radio)
            }

        </script>

    </div>

@endsection
