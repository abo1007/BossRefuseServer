<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\Offer;

class OfferController extends BaseController
{
    /**
     * 拒绝 沟通中 待面试 录用 收藏 的信息
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->create([], "数据获取成功", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $typeid)
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
    }

    /**
     * 统计各类offer信息条数 常用
     * 拒绝 沟通中 待面试 录用 收藏 的数量
     * @param $id
     * @return array
     */

    public function count(Request $req)
    {
        $req = $req->all();
        if ($req["type"] == 0) {
            $coms = Offer::where("userId", $req["uid"])->get()->toArray();
        } else {
            $coms = Offer::where("workComId", $req["uid"])->get()->toArray();
        }

        // 拒绝 沟通中 待面试 录用 收藏
        $countData = array(0, 0, 0, 0, 0);

        if (!empty($coms)) {
            for ($i = 0; $i < count($coms); $i++) {
                $num = $coms[$i]["workOfferType"];
                $countData[$num]++;
            }
            return $this->create($countData, "数据获取成功", 200);
        } else {
            return $this->create([0, 0, 0, 0, 0], "数据获取成功", 200);
        }

    }

    /**
     * 用户 分类数据获取
     * @param int $id
     * @param int $cateid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function offerCate($id, $cateid)
    {

        $data = Offer::where(array("offer.userId" => $id, "workOfferType" => $cateid))
            ->join("cominfo", "offer.workComId", "cominfo.workComId")
            ->join("workface", "offer.workId", "workface.workId")
            ->select("offer.*", "workface.*", 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->get()->toArray();

        if (!empty($data)) {
            return $this->create($data, "数据获取成功", 200);
        } else {
            return $this->create($data, "无数据", 204);
        }
    }

    /**
     * 企业 分类数据获取
     * @param int $id
     * @param int $cateid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function comOfferCate($id, $cateid)
    {
        if($cateid == 666){
            $queryArr = array("offer.workComId" => $id);
        }else{
            $queryArr = array("offer.workComId" => $id, "workOfferType" => $cateid);
        }

        $data = Offer::where($queryArr)
            ->join("resume", "offer.candId", "resume.candId")
            ->join("workface", "offer.workId", "workface.workId")
                ->select("offer.*", "workface.workTitle",'workface.workSalary', 'resume.name', 'resume.age', 'resume.school', 'resume.edu', 'resume.workExper')
            ->get()->toArray();

        if (!empty($data)) {
            return $this->create($data, "数据获取成功", 200);
        } else {
            return $this->create($data, "无数据", 204);
        }
    }

    /**
     * 修改offer状态
     * @param Request $req
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function comUpdateOfferType(Request $req)
    {
        $data = $req->all();

        $result = Offer::where(array("workComId"=>$data["id"], "workOfferId"=>$data["workOfferId"]))
            ->update(array("workOfferType"=>$data["typeId"]));

        if (!empty($result)) {
            return $this->create(1, "修改成功", 200);
        } else {
            return $this->create(0, "修改无效", 400);
        }
    }
}
