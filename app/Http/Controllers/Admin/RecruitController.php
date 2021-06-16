<?php


namespace App\Http\Controllers\Admin;


use App\api\Workface;
use App\Http\Controllers\BaseController;

class RecruitController extends BaseController
{
    // 上架
    public function toShow($id)
    {
        $res = Workface::where("workId", $id)->update(array("show" => 0));
        if ($res) {
            return $this->create(true, "ok", 200);
        } else {
            return $this->create([], "none", 400);
        }
    }

    // 下架
    public function noShow($id)
    {
        $res = Workface::where("workId", $id)->update(array("show" => 1));
        if ($res) {
            return $this->create(true, "ok", 200);
        } else {
            return $this->create([], "none", 400);
        }
    }

    // 删除
    public function toDel($id)
    {
        $res = Workface::where("workId", $id)->delete();
        if ($res) {
            return $this->create(true, "ok", 200);
        } else {
            return $this->create([], "none", 400);
        }
    }
}
