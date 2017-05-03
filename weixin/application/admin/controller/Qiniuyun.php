<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use gmars\qiniu\Qiniu;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
class Qiniuyun extends Controller {
    public function a(){
        return view('a');
    }

    public function index(){
        //上传单个文件
//        $qiniu = new Qiniu();
//        $result = $qiniu->upload($_FILES['img']['tmp_name'],'summer');
//        print_r($result);

        //上传视频和多个图片
//        set_time_limit(0);
//        //print_r($_FILES);die;
//        $img=$_FILES['img'];
//        $qiniu = new Qiniu();
//        $result = $qiniu->uploadAll($img,'summer');
    }


}