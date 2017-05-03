<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Prevent extends Controller{
    public function __construct()
    {
        //继承父类
        parent::__construct();

        $user_name=Session::get('user_name');
        $user_id=Session::get('user_id');
       // print_r($user_id);die;
        //验证非法登录
        if(empty($user_name))
        {
            $this->success('请先登陆','login/login');
            //echo "<script>alert('');window.location=''</script>";
        }
         //五表联查 查看当前用户的所有权限
           $data=db('think_user')->alias('u')
            ->join('think_user_role ur','u.user_id = ur.user_id')
            ->join('think_role r','r.role_id = ur.role_id')
            ->join('think_role_node rn','r.role_id = rn.r_id')
            ->join('think_node n','n.n_id = rn.n_id')
            ->where('u.user_id',$user_id)
            ->select();
            //超级管理员
         if($user_name == 'admin')
         {
            return true;
         }
            // print_r($data);die;
       //获取当前页面的控制器名和方法名
       //print_r($data);die;
      // $controller = MODULE_NAME;//MODULE_NAME //CONTROLLER_NAME
        //获取当前控制器    
       $request = \think\Request::instance();
       $controller= $request->controller();
       //获取当前方法
       $action=$request->action();
       $url = $controller.'/'.$action;
        //print_r($url);die;
       //重组数组
       $new_data = array();
       foreach($data as $k=>$v){
           $new_data[$k]=$v['n_controller'].'/'.$v['n_action'];
       }
       //判断当前页面的控制器和方法名在不在用户的权限中

       if(in_array($url,$new_data)){
           return true;
       }else{
           $this->error('没有相应的权限');
       }

    }
}