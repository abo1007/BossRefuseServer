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
        return $this->create([], "未开放此API", 400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 登录操作
        $data = $request->all();
        $vaildator = Validator::make($data, [
            'username' => 'required|min:6|max:18',
            'password' => 'required|min:6|max:26'
        ]);

        if ($vaildator->fails()) {
            return $this->create([],$vaildator->errors(), 400);
        } else {
            // 取得结果集 提高效率 只取id字段
            $resid = User::select("id")->where("username",$data["username"])->get();

            if(!empty($resid)){
                $res = User::select("password")->where("id",$resid[0]["id"])->get();
                $res = $res[0]["password"];
                if($res == $data["password"]){
                    return $this->create(["id"=>$resid[0]["id"],"username"=>$data["username"]], "用户登录成功", 200);
                }else{
                    return $this->create([], "密码不正确", 302);
                }

            }else{
                return $this->create([], "用户不存在", 301);
            }

//            if($addData){
//                return $this->create($data, "数据请求成功", 200);
//            }
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
        return $this->create([], "未开放此API", 400);
    }
}
