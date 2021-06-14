<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;

class RecruitController extends BaseController
{
    // 上架
    public function toShow($id){
        return $this->create($id,"ok",200);
    }
    // 下架
    public function noShow($id){
        return $this->create($id,"ok",200);
    }

}
