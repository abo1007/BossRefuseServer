<?php


namespace App\Http\Controllers\Admin;


use App\api\Advert;

class AdvertController extends \App\Http\Controllers\BaseController
{
    public function getView(){
        $res = Advert::get();
        return view("admin.Advert",["advert"=>$res]);
    }
}
