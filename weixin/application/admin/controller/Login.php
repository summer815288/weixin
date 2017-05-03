<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Think_user;
use think\Session;
class Login extends Controller{
    //登陆页面
    public function login(){
        return view('login');
    }
    public function logindo(){
        $yan=Request::instance()->post('yan');
        $username=Request::instance()->post('username');
        $password=Request::instance()->post('password');
        if($yan==0){
            echo "<script>alert('验证错误');window.location='login'</script>";
        }else{
            $think_user=new Think_user();
            $think_user->where(['user_name'=>$username,'user_pwd'=>md5($password)]);
            $user=db('think_user')->where(['user_name'=>$username])->find();
            //print_r($user_id);die;
            $user_id=$user['user_id'];
            $data=$think_user->select();
           // print_r($data);die;;
            $a=json_decode(json_encode($data),true);
            if($a){
                Session::set('user_name',$username);
                Session::set('user_id',$user_id);
                $this->success('登陆成功','index/index');
            }else{
                $this->error('用户名密码错误','login/login');
            }
        }
    }
}
