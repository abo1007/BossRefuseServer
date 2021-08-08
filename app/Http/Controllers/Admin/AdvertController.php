<?php


namespace App\Http\Controllers\Admin;


use App\api\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertController extends \App\Http\Controllers\BaseController
{
    public function getView()
    {
        $res = Advert::get();
        return view("admin.Advert", ["advert" => $res]);
    }

    public function getAddView()
    {
        return view("admin.AdvertAdd");
    }

    public function upload_img(Request $request)
    {
        if ($request->isMethod('POST')) { //判断文件是否是 POST的方式上传
            $tmp = $request->file('img');
            $path = '/advert'; //public下的article
            if ($tmp->isValid()) { //判断文件上传是否有效
                $FileType = $tmp->getClientOriginalExtension(); //获取文件后缀

                $FilePath = $tmp->getRealPath(); //获取文件临时存放位置

                $FileName = date('Y-m-d') . uniqid() . '.' . $FileType; //定义文件名

                Storage::disk('p1')->put($FileName, file_get_contents($FilePath)); //存储文件

                return $this->create($path . '/' . $FileName, "OK", 200);
            } else {
                return $this->create('', "NO", 400);
            }
        }
    }

    public function Advertpost(Request $request)
    {
        $data = $request->all();

        $res = Advert::insert(array("desc"=>$data['name'], "imgUrl"=>$data['imgUrl'],"state"=>$data['state']));
        if($res){
            return $this->create("","ok",200);
        }else{
            return $this->create("","no",400);

        }
    }
}
