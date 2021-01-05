<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\api\Workface;
use Illuminate\Support\Facades\DB;

class WorkfaceController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有
        $workfaces = Workface::join('cominfo', 'workface.workComId', 'cominfo.workComId')->
        select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')->
        paginate(10)->toArray();

//        dd($workfaces);
        // 分页后 多一层架构
        for ($i = 0; $i < count($workfaces["data"]); $i++) {
            $a = explode("，", $workfaces["data"][$i]["workTag"]);
            $workfaces["data"][$i]["workTag"] = $a;
        }

        return $this->create($workfaces, "数据获取成功", 200);
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
    public function show($id)
    {
        // 单条展示
        $data = Workface::select()->find($id);
        if (!is_numeric($id)) {
            return $this->create([], "id参数错误", 400);
        }
        if (empty($data)) {
            return $this->create([], "无数据", 204);
        } else {
            return $this->create($data, "数据请求成功", 200);
        }

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
     * 分类数据
     * @param int $cateid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function classify($cateid)
    {

        $workfaces = Workface::where("workCateId", "like", $cateid . "%")->join('cominfo', 'workface.workComId', 'cominfo.workComId')->
        select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')->get()->toArray();

        for ($i = 0; $i < count($workfaces); $i++) {
            $a = explode("，", $workfaces[$i]["workTag"]);
            $workfaces[$i]["workTag"] = $a;
        }

        if (count($workfaces) < 1) {
            return $this->create($workfaces, "无数据", 204);
        }

        return $this->create($workfaces, "数据获取成功", 200);
    }

    /**
     * 细分分类数据
     * @param int $cateid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function subclassify($cateid)
    {

        $workfaces = Workface::where("workCateId", $cateid)->join('cominfo', 'workface.workComId', 'cominfo.workComId')->
        select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')->get()->toArray();

        for ($i = 0; $i < count($workfaces); $i++) {
            $a = explode("，", $workfaces[$i]["workTag"]);
            $workfaces[$i]["workTag"] = $a;
        }

        return $this->create($workfaces, "数据获取成功", 200);
    }
}
