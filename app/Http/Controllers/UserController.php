<?php

namespace App\Http\Controllers;

use App\api\Workface;
use App\api\Resume;
use Illuminate\Http\Request;
use App\api\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends BaseController
{
    /**
     * 服务器状态验证API
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("PRC");
        $time = date("Y-m-d H:i:s", time());
        return $this->create(array("time" => $time), "服务器状态正常", 200);
    }

    /**
     * 注册用户
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $queryRes = User::where("username", $data["username"])->get()->toArray();

        if (!empty($queryRes)) {
            return $this->create(0, "用户名重复", 208);
        }

        date_default_timezone_set("PRC");
        $time = date("Y-m-d H:i:s", time());
        $token = $this->getsha();
        $res = User::insert(array("username" => $data["username"], "password" => md5($data["password"]), "sex" => $data["sex"],
            "regtime" => $time, "phonenum" => $data["phonenum"], "nickname" => $data["nickname"], "isvip" => 0,
            "isCom" => $data["isCom"], "api_token" => $token));

        if ($res > 0) {
            return $this->create(1, "插入成功", 200);
        } else {
            return $this->create(0, "插入失败", 208);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $res = User::where("id", $id)->get()->toArray();
        $res[0]["password"] = "";
        return $this->create($res[0], "获取成功", 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $res = User::where("id", $id)->update(array("phonenum" => $data["phonenum"], "sex" => $data["sex"], "nickname" => $data["nickname"]));
        if ($res > 0) {
            return $this->create(1, "修改成功", 200);
        } else {
            return $this->create(0, "修改失败", 208);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->create([], "未开放此API", 700);
    }

    /**
     * 实现登录验证功能
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // 登录操作
        $data = $request->all();
        $vaildator = Validator::make($data, [
            'username' => 'required|min:6|max:18',
            'password' => 'required|min:6|max:26'
        ]);

        if ($vaildator->fails()) {
            return $this->create([], $vaildator->errors(), 400);
        } else {

            $loginData = array("username" => $data["username"], "isCom" => $data["mode"]);
            // 取得结果集 提高效率 只取id字段
            $resid = User::select("id")->where($loginData)->get();

            if (empty($resid[0])) {
                return $this->create([], "用户不存在", 301);
            }

            $res = User::select("password", "api_token", "nickname", "spareId")->where("id", $resid[0]["id"])->get()->toArray();
            $pass = $res[0]["password"];
            $token = $res[0]["api_token"];

            if ($pass !== md5($data["password"])) {
                return $this->create([], "密码不正确", 302);
            }

            if ($data['mode'] == 0) {
                $candid = Resume::select("candId")->where("userId", $resid[0]["id"])->get()->toArray();
                if (empty($candid)) {
                    return $this->create(["id" => $resid[0]["id"], "username" => $data["username"], "nickname" => $res[0]["nickname"], "candId" => 0, "token" => $token], "用户登录成功", 200);
                }
                return $this->create(["id" => $resid[0]["id"], "username" => $data["username"], "nickname" => $res[0]["nickname"], "candId" => $candid[0]["candId"], "token" => $token], "用户登录成功", 200);

            } else {
                return $this->create(["id" => $resid[0]["id"], "username" => $data["username"], "nickname" => $res[0]["nickname"], "comId" => $res[0]["spareId"], "token" => $token], "用户登录成功", 200);
            }
        }
    }

    /**
     * 实现免登录功能 取cookie值到服务端session进行验证
     * @param $username
     * @return \Illuminate\Http\Response
     */

    public function loginFree(Request $request)
    {
        // 测试
        session(["username" => "yangbo", "id" => 10000]);

        if (session('username') == $request["username"]) {
            // 采用数据库查询获得id返回 修改为session存储id 直接获取
//            $userid = User::select("id")->where("username", $request["username"])->get()->toArray();

            return $this->create(["id" => session("id"), "username" => $request["username"]], "准予免登录", 1010);
        }
        return $this->create([], "拒绝免登录", 1011);
    }

    /**
     * 修改密码功能
     * @param Request $req
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function updatePass(Request $req)
    {
        $data = $req->all();

        $res = User::where('id',$data['id'])->update(array('password'=>md5($data['password'])));

        if($res){
            return $this->create([], "修改成功", 200);
        }else{
            return $this->create([], "修改失败", 400);

        }
//        return $this->create([], "未开放此API", 400);

    }


    /**
     * 获得昵称
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function nickname($id)
    {
        $res = User::where("id", $id)->select("nickname")->get()->toArray();
        return $this->create($res[0], "获取成功", 200);
    }


    public function getsha()
    {
        return Str::random(60);
    }

    /**
     * 发送验证码
     */
    public function getCode()
    {
        $codes = $this->make_password();
        return $this->create($codes,"发送成功",200);
    }

    /**
     * 验证码生成（不对外）
     * @param int $length
     * @return string
     */
    private function make_password($length = 6)
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        // 在 $chars 中随机取 $length 个数组元素键名
        $keys = array_rand($chars, $length);

        $password = '';
        for($i = 0; $i < $length; $i++)
        {
            // 将 $length 个数组元素连接成字符串
            $password .= $chars[$keys[$i]];
        }
        return $password;
    }


}
