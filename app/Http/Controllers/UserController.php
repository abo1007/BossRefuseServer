<?php

namespace App\Http\Controllers;

use App\api\Workface;
use Illuminate\Http\Request;
use App\api\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->create([], "未开放此API", 700);
    }

    /**
     * Store a newly created resource in storage.
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
        $res = User::insert(array("username" => $data["username"], "password" => $data["password"], "sex" => $data["sex"],
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

//            dd($resid);

            if (!empty($resid[0])) {

                $res = User::select("password", "api_token")->where("id", $resid[0]["id"])->get()->toArray();
                $pass = $res[0]["password"];
                $token = $res[0]["api_token"];
                if ($pass == $data["password"]) {

                    return $this->create(["id" => $resid[0]["id"], "username" => $data["username"], "token" => $token], "用户登录成功", 200);
                } else {
                    return $this->create([], "密码不正确", 302);
                }

            } else {
                return $this->create([], "用户不存在", 301);
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

        return $this->create([], "未开放此API", 400);

    }

    /**
     * 注册用户功能
     * @param Request $req
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function registerUser(Request $req)
    {

        return $this->create([], "未开放此API", 400);

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

}
