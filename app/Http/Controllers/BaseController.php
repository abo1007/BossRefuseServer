<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //api基类
    protected function create($data, $msg = '', $code = 200)
    {
        $result = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return response($result);
    }

}
