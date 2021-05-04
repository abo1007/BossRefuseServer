<?php

namespace App\Http\Controllers;

use App\api\Msg;
use App\api\Workface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MsgController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // 获得格式化时间
        date_default_timezone_set("PRC");
        $time = date("Y-m-d H:i:s", time());

        if ($data["mode"] == 0) {
            $insertData = array("userId" => $data["userId"], "workComId" => $data["comId"], "msgTime" => $time, "sendID" => $data["userId"],
                "acceptID" => $data["comId"], "msgContent" => $data["msgContent"], "workId" => $data["workId"], "status" => 1);
        } else if ($data["mode"] == 1) {
            $insertData = array("userId" => $data["userId"], "workComId" => $data["comId"], "msgTime" => $time, "sendID" => $data["comId"],
                "acceptID" => $data["userId"], "msgContent" => $data["msgContent"], "workId" => $data["workId"], "status" => 1);
        } else {
            return $this->create([], "参数无效", 208);
        }

        $res = Msg::insert($insertData);

        if (count($res)) {
            return $this->create(1, "发送成功", 200);
        } else {
            return $this->create(0, "发送失败", 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
     * 根据用户id 公司id 工作id 获得聊天信息
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function chatMsgByUserId(Request $request)
    {
        $data = $request->all();
        $check = array('msg.userId' => $data["userId"], 'msg.workComId' => $data['comId'], 'msg.workId' => $data["workId"]);
        if ($data["mode"] == 0 || $data["mode"] == 1) {
            $res = Msg::where($check)
                ->join("workface", "msg.workId", "workface.workId")
                ->join("cominfo", "msg.workComId", "cominfo.workComId")
                ->select("msg.*", "workface.workTitle", "workface.workSalary", "workface.workPublisher", "cominfo.workComName")
                ->get()->toArray();

            $workRes = Workface::where("workId", $data["workId"])
                ->join('cominfo', 'workface.workComId', 'cominfo.workComId')
                ->select('workface.workTitle', 'workface.workSalary', 'workface.workPublisher', 'cominfo.workComName')
                ->get()->toArray();

            if (count($res)) {
                return $this->create(array("msg" => $res, "work" => $workRes[0]), "数据请求成功", 200);
            } else {
                if (count($workRes)) {
                    return $this->create(array("work" => $workRes[0]), "无数据", 204);
                } else {
                    return $this->create([], "无数据", 204);
                }
            }
        }
    }

    /**
     * 获得 用户id 的最后一条数据
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getChatNum($id, Request $request)
    {
//        $sql = 'SELECT * FROM `boss_msg` ORDER BY `msgTime` DESC';
        $type = $request->query("type");
        if ($type) {
            $res = Msg::where("msg.workComId", $id)
                ->orderBy("msgTime", 'desc')
                ->join('cominfo', 'msg.workComId', 'cominfo.workComId')
                ->select('msg.*', 'cominfo.workComName')
                ->get()->toArray();
        }else{
            $res = Msg::where("userId", $id)
                ->orderBy("msgTime", 'desc')
                ->join('cominfo', 'msg.workComId', 'cominfo.workComId')
                ->select('msg.*', 'cominfo.workComName')
                ->get()->toArray();
        }
        // select * from (SELECT * FROM boss_msg WHERE userId = '.$id.' GROUP BY workId as a) ORDER BY msgTime

        if (count($res)) {
            return $this->create($res[0], "获取成功", 200);
        } else {
            return $this->create([], "无数据", 204);
        }
    }
}
