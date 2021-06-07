<?php


namespace App\Http\Controllers\Admin;


use App\api\Cominfo;
use App\api\User;
use App\api\Workface;

class IndexController extends \App\Http\Controllers\Controller
{
    public function getView(){
        return redirect("admin/about");
    }

    public function getView1()
    {
        $workfaces = Workface::join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->get();

        return view('admin.Recruit', ["workfaces" => $workfaces]);
    }

    public function getView2()
    {
        $coms = Cominfo::get();
        return view('admin.Enterprise', ["coms" => $coms]);
    }

    public function getView3()
    {
        $users = User::select("id", "username", "sex", "regtime", "phonenum", "nickname" ,"isvip", "isCom", "spareId")
                    ->get();
        return view('admin.User', ["users"=> $users]);
    }

    public function getView4()
    {
        return view('admin.Advert');
    }

    public function getView5()
    {
        return view('admin.More');
    }

    public function getView6()
    {
        return view('admin.About');
    }
}
