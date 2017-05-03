<?php
namespace app\home\controller;
use think\Controller;
use app\home\model\Order;
use think\Session;

/**
 * 个人中心
 * author ：hao
 **/
class Center extends Controller
{

    /**
     * 我的课程
     *
     **/
    public function course()
    {
        $uid=Session::get('uid');
        if(!isset($uid)||empty($uid)){
            $this->redirect('Login/login');

        }else{

            //获取电话号
            $phone= Session::get('account');
            //实例化

            //根据用户名进行查询
            $subject=db('order')->where('phone', $phone)->select();
            //print_r($subject);die;
            foreach($subject as $k=>$v){
                $subjects=$v['subject'];
                //通过课程名查找视频
                $video=db('category')->where('c_name',$subjects)->find();
                $subject[$k]['video']= $video['video'];
            }

            return view('course',array('subject'=>$subject));
        }

    }


}