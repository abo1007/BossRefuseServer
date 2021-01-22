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
        return $this -> create([], "数据获取成功", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $typeid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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

    public function count($comId, $type = 5)
    {
        $coms = Offer::where("workComId", $comId)->get()->toArray();

        // 拒绝 沟通中 待面试 录用 收藏
        $countData = array(0, 0, 0, 0, 0);

        if (!empty($coms)) {
            for ($i = 0; $i < count($coms); $i++) {
                $num = $coms[$i]["workOfferType"];
                $countData[$num]++;
            }
            return $this -> create($countData, "数据获取成功", 200);
        } else {
            return $this -> create([0, 0, 0, 0], "数据获取成功", 200);
        }

    }

}
