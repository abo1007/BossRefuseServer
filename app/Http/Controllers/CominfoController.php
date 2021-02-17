<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\Cominfo;

class CominfoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cominfo::get()->toArray();
        return $this->create($data, "数据获取成功", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $sqlWriteData = array(
            "workComName" => $data["workComName"],
            "workComPerson" => $data["workComPerson"],
            "workComAllName" => $data["workComAllName"],
            "workComScale" => $data["workComScale"],
            "workComDate" => $data["workComDate"],
            "workComCate" => $data["workComCate"],
            "workComTag" => $data["workComTag"],
            "workComCity" => $data["workComCity"],
            "workComArea" => $data["workComArea"],
            "workComIntro" => $data["workComIntro"],
            "workComCap" => $data["workComCap"]);

        $isTrue = Cominfo::insert($sqlWriteData);

        if ($isTrue) {
            return $this->create(1, "数据插入成功", 200);
        } else {
            return $this->create(0, "数据插入失败", 208);
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
        $data = Cominfo::where("workComId", $id)->get()->toArray();
        return $this->create($data[0], "数据获取成功", 200);
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
        $data = $request->all();
        $updateData = array();
        foreach ($data as $key => $item) {
            $updateData[$key] = $item;
        }

        $sqlNum = Cominfo::where("workComId", $id)->update($updateData);

        if ($sqlNum > 0) {
            return $this->create(1, "修改成功", 200);
        } else {
            return $this->create(0, "未能修改", 208);
        }
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
}
