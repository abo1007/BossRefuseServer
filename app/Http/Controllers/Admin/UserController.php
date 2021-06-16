<?php


namespace App\Http\Controllers\Admin;




use App\api\User;

class UserController extends \App\Http\Controllers\BaseController
{
    public function getUserInfoView($id){
        $user = User::where("id",$id)->get()->toArray();
        return view("admin.UserInfo",array("user"=>$user[0]));
    }
}
