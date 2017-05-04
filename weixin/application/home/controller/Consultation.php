<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
class Consultation extends Controller
{
    /*
     * 展示页面
     */
    public function index()
    {
        $arr=Db::table('img')->order('f_id')->select();
        $this->assign('arr',$arr);
        return $this->fetch('index');
    }
    /*
     * 咨询入库
     */
    public function con_add()
    {
        $name=addslashes($_POST['name']);//姓名
        $mobile=addslashes($_POST['mobile']);//电话
        $openid=addslashes($_POST['openid']);//需求
        $company=addslashes($_POST['company']);//公司
        $time=date('Y-m-d',time());//时间
        //根据用户的手机号判断是否咨询过没
        $find= Db::query('select * from consultation where c_tel=:c_tel',['c_tel'=>$mobile]);
        if($find)
        {
            echo 1;
        }
        else
        {
            $data = ['c_name' =>$name, 'c_tel' =>$mobile,'c_need'=>$openid,'c_pany'=>$company,'c_time'=>$time];
            $add=Db::execute('insert into consultation (c_name,c_tel,c_need,c_pany,c_time) values (:c_name, :c_tel,:c_need,:c_pany,:c_time)',$data);
            if($add)
            {
                echo 2;

            }
        }
    }

    //在线美恰聊天
    public function mei(){

        return view('mei');
    }
}
