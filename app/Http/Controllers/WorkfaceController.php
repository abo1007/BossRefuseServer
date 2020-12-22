<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\api\Workface;

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
        $workfaces = Workface::join('cominfo','workface.workComId','cominfo.workComId')->
        select('workface.*','cominfo.workComId','cominfo.workComCity','cominfo.workComArea','cominfo.workComName','cominfo.workComScale')->get()->toArray();

        return $this->create($workfaces, "数据获取成功", 200);
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
}
