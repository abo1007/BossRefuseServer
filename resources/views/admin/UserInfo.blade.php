@extends("admin.main")

@section("content")
    <style>
        .option {
            width: 100%;
            height: 60px;
            background: rgba(0, 0, 0, .2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .option p {
            line-height: 60px;
            font-size: 20px;
            margin: 0 20px;
            cursor: pointer;
        }

        .option button {
            margin-right: 20px;
        }

        .userinfo-container {
            width: 80%;
            border: 1px solid #4e555b;
            margin: 20px auto;
            border-radius: 20px;
        }

        .input-container {
            padding: 10px 0;
        }

        .input-item {
            width: 80%;
            background: rgba(0, 0, 0, .1);
        }

        .bottom-container {
            display: flex;
        }
    </style>
    <div id="root">
        <div class="option">
            <p onclick="location.href = '{{url("admin/user")}}'">< 返回</p>
            <button class="layui-btn layui-btn-normal layui-btn-radius">保存信息 ></button>
        </div>
        <div class="userinfo-container layui-form">
            <h1></h1>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">ID</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["id"]}}"
                           class="layui-input input-item" readonly>
                </div>
            </div>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["username"]}}"
                           class="layui-input input-item">
                </div>
            </div>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["password"]}}"
                           class="layui-input input-item" readonly>
                </div>
            </div>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">注册时间</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["regtime"]}}"
                           class="layui-input input-item" readonly>
                </div>
            </div>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["phonenum"]}}"
                           class="layui-input input-item">
                </div>
            </div>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">昵称</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["nickname"]}}"
                           class="layui-input input-item">
                </div>
            </div>
            <div class="layui-form-item input-container">
                <label class="layui-form-label">所属企业</label>
                <div class="layui-input-block">
                    <input type="text" required
                           lay-verify="required" autocomplete="off"
                           value="{{$user["spareId"]}}"
                           class="layui-input input-item" readonly>
                </div>
            </div>
            <div class="bottom-container">
                <div class="layui-form-item input-container">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <input type="radio" name="sex" id="sex0" value="男" title="男">
                        <input type="radio" name="sex" id="sex1" value="女" title="女">
                    </div>
                </div>
                <div class="layui-form-item input-container">
                    <label class="layui-form-label">企业/个人</label>
                    <div class="layui-input-block">
                        <input type="radio" name="com" id="com1" value="1" title="企业">
                        <input type="radio" name="com" id="com0" value="0" title="个人">
                    </div>
                </div>
                <div class="layui-form-item input-container">
                    <label class="layui-form-label">VIP</label>
                    <div class="layui-input-block">
                        <input type="radio" name="vip" id="vip0" value="0" title="否">
                        <input type="radio" name="vip" id="vip1" value="1" title="是">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        let sex0 = document.querySelector("#sex0");
        let sex1 = document.querySelector("#sex1");
        let com1 = document.querySelector("#com1");
        let com0 = document.querySelector("#com0");
        let vip0 = document.querySelector("#vip0");
        let vip1 = document.querySelector("#vip1");


        (function () {
            getSex({{$user["sex"]}})
            getCom({{$user["isCom"]}})
            getVip({{$user["isvip"]}})
        })()
        function getSex(sex) {
            if(sex == 0){
                sex0.checked = true;
            }else{
                sex1.checked = true;
            }
        }
        function getCom(type) {
            if(type == 0){
                com0.checked = true;
            }else{
                com1.checked = true;
            }
        }
        function getVip(type) {
            if(type == 0){
                vip0.checked = true;
            }else{
                vip1.checked = true;
            }
        }
    </script>
@endsection
