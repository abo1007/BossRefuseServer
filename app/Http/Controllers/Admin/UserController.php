<?php


namespace App\Http\Controllers\Admin;


use App\api\User;
use Illuminate\Http\Request;

class UserController extends \App\Http\Controllers\BaseController
{
    public function getUserInfoView($id)
    {
        $user = User::where("id", $id)->get()->toArray();
        return view("admin.UserInfo", array("user" => $user[0]));
    }

    public function updateUserInfo($id, Request $request)
    {
        $data = $request->all();
        $arr = array("username" => $data["username"], "sex" => $data["sex"], "phonenum" => $data["phonenum"], "nickname" => $data["nickname"], "isvip" => $data["isvip"]);
        $res = User::where("id", $id)->update($arr);
        if ($res) {
            return $this->create(true,"ok",200);
        } else {
            return $this->create(false,"none",400);

        }
    }
}
