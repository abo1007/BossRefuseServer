<?php


namespace App\Http\Controllers\Admin;


use App\api\Cominfo;
use App\api\Workface;

class EnterpriseController extends \App\Http\Controllers\BaseController
{
    public function getComWorkList($id)
    {
        $res = Workface::where("workComId",$id)->get();
        $com = Cominfo::where("workComId",$id)->get();
        return view('admin.EnterpriseList', ["works"=>$res, "com"=>$com[0]]);
    }
}
