<?php

namespace App\Http\Controllers;

use App\api\Cominfo;
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
        $workfaces = Workface::join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->paginate(3)
            ->toArray();

//        dd($workfaces);
        // 分页后 多一层结构
        $workfaces["data"] = $this->workTagsToArr($workfaces["data"]);

        return $this->create($workfaces, "数据获取成功", 200);
    }

    /**
     * 录入 招聘信息
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $insertData = array("workTitle" => $data["workTitle"], "workSalary" => $data["workSalary"], "workTag" => $data["workTag"],
            "workPublisher" => $data["workPublisher"], "workPublisherId" => $data["workPublisherId"], "workCateId" => $data["workCateId"], "workComId" => $data["workComId"]);
        $result = Workface::insertGetId($insertData);
        if ($result) {
            $result2 = DB::table("workinfo")->insert(array("workId" => $result, "workIntro" => $data["workIntro"]));
            if ($result2) {
                return $this->create(1, "插入成功", 200);
            } else {
                return $this->create(0, "插入失败", 400);
            }
        } else {
            return $this->create(0, "插入失败", 400);
        }

    }

    /**
     * 获取招聘详情页信息
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 单条展示
        if (!is_numeric($id)) {
            return $this->create([], "id参数错误", 400);
        }

        $workfaces = Workface::where("workface.workId", $id)
            ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->join('workinfo', 'workface.workId', 'workinfo.workId')
            ->select('workface.*', 'workinfo.workIntro', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale', 'cominfo.workComCate')
            ->get()
            ->toArray();

        $workfaces = $this->workTagsToArr($workfaces);

        if (empty($workfaces)) {
            return $this->create([], "无数据", 204);
        } else {
            return $this->create($workfaces[0], "数据请求成功", 200);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $updateData = array("workTitle" => $data["workTitle"], "workSalary" => $data["workSalary"], "workTag" => $data["workTag"],
            "workPublisher" => $data["workPublisher"], "workCateId" => $data["workCateId"], "workComId" => $data["workComId"]);
        $result = Workface::where("workId", $id)->update($updateData);

        if ($result) {
            return $this->create(1, "修改成功", 200);
        } else {
            return $this->create(0, "修改失败", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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

        $workfaces = Workface::where("workCateId", "like", $cateid . "%")
            ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->get()
            ->toArray();

        $workfaces = $this->workTagsToArr($workfaces);

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

        $workfaces = Workface::where("workCateId", $cateid)
            ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->get()
            ->toArray();

        $workfaces = $this->workTagsToArr($workfaces);

        return $this->create($workfaces, "数据获取成功", 200);
    }

    /**
     * 多个细分分类数据
     * @param String $cateid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function subclassifys($cateids)
    {

        $cateids = explode(",", $cateids);

        $workfaces = [];

        for ($i = 0; $i < count($cateids); $i++) {
            $workfaces[$i] = Workface::where("workCateId", $cateids[$i])
                ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
                ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
                ->get()
                ->toArray();
        }
        for ($i = 0; $i < count($workfaces); $i++) {
            $workfaces[$i] = $this->workTagsToArr($workfaces[$i]);
        }

        return $this->create($workfaces, "数据获取成功", 200);

    }

    /**
     * 根据 企业id 返回企业发布的招聘信息
     * @param $comid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function comShow($comid)
    {

        $data = Workface::where("workface.workComId", $comid)
            ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->get()->toArray();


        $data = $this->workTagsToArr($data);

        if (empty($data)) {
            return $this->create([], "无数据", 204);
        } else {
            return $this->create($data, "数据请求成功", 200);
        }
    }

    /**
     * 搜索 数据
     * @param $searchValue
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function searchTitle($searchValue)
    {

        $works = Workface::where("workTitle", "like", '%' . $searchValue . '%')
            ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
            ->select('workface.*', 'cominfo.workComId', 'cominfo.workComCity', 'cominfo.workComArea', 'cominfo.workComName', 'cominfo.workComScale')
            ->get()->toArray();
        $coms = Cominfo::where("workComName", "like", '%' . $searchValue . '%')->get()->toArray();


        if (count($works) || count($coms)) {
            return $this->create(array("works"=>$works, "coms"=>$coms), "数据请求成功", 200);
        } else {
            return $this->create([], "无数据", 204);
        }

    }

    /**
     * tag字段转换数组
     * @param $workfaces
     * @return array
     */
    public function workTagsToArr($workfaces)
    {
        if (empty($workfaces)) {
            return [];
        }
        for ($i = 0; $i < count($workfaces); $i++) {
            $a = explode("，", $workfaces[$i]["workTag"]);
            $workfaces[$i]["workTag"] = $a;
        }
        return $workfaces;
    }
}
