<?php

namespace App\Http\Controllers;

use App\api\Workface;
use Illuminate\Http\Request;
use App\api\User;
use Illuminate\Support\Facades\Validator;

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

                $res = User::select("password")->where("id", $resid[0]["id"])->get();
                $res = $res[0]["password"];

                if ($res == $data["password"]) {
                    return $this->create(["id" => $resid[0]["id"], "username" => $data["username"]], "用户登录成功", 200);
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
}
