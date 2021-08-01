<?php


namespace App\Http\Controllers;


use App\api\Advert;

class AdvertAPIController extends BaseController
{
    public function getBanner(){
        $res = Advert::get()->toArray();
        return $this->create($res,"ok",200 );
    }
}
