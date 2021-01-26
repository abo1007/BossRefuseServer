<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\Resume;

class ResumeController extends BaseController
{
    /**
     * 读取人才库信息
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 首次保存简历信息
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $sqlWriteData = array("name" => $data["name"], "sex" => $data["sex"], "age" => $data["age"], "edu" => $data["edu"],
            "school" => $data["school"], "workExper" => $data["workExper"], "projectExper" => $data["projectExper"], "certificate" => $data["certificate"],
            "honor" => $data["honor"], "expect" => $data["expect"], "intro" => $data["intro"], "userId" => $data["userId"]);

        $isTrue = Resume::insert($sqlWriteData);

        if ($isTrue) {
            return $this->create(1, "数据插入成功", 200);
        } else {
            return $this->create(0, "数据插入失败", 208);
        }


    }

    /**
     * 读取简历信息
     *
     * @param  int $id 用户ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Resume::where("userId", $id)->get()->toArray();

        if (!empty($data)) {
            return $this->create($data[0], "数据获取成功", 200);
        } else {
            return $this->create([], "无数据返回", 204);
        }

    }

    /**
     * 修改简历信息
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
}
