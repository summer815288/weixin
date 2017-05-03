<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Videos;
class Video extends Prevent{
    public function index(){
        return view('index');
    }
    public function video_do(){
        $video_name=Request::instance()->post('video_name');
        $video_url=Request::instance()->post('video_url');
        $video_img=Request::instance()->file('video_img');
        $video_start=Request::instance()->post('video_start');
        $video_end=Request::instance()->post('video_end');
        $info = $video_img->move(ROOT_PATH . 'public' . DS . 'uploads/zhibo');
        $video_img=$info->getFilename();
        $video=new Videos;
        $video->video_name=$video_name;
        $video->video_url=$video_url;
        $video->video_img=date('Ymd',time()).'/'.$video_img;
        $video->video_start=strtotime($video_start);
        $video->video_end=strtotime($video_end);
        $success=$video->save();
        if($success){
            $this->success('提交成功','video_list');
        }else{
            $this->success('提交失败');
        }
    }
    public function video_list(){
        $video=json_decode(json_encode(Videos::get()->select()),true);
        return view('video_list',['video'=>$video]);
    }
}