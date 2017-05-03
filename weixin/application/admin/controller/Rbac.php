<?php
namespace app\admin\controller;
use app\admin\controller\Prevent;
use app\admin\model\Think_role;
use app\admin\model\Think_user;
use app\admin\model\Think_user_role;
use think\Request;

class Rbac extends Prevent{
    /**角色**/
    public function role(){
        return view('role');
    }
    //处理角色
    public function roleto(){
        $role_name=Request()->instance()->post('role_name');
        $role_note=Request()->instance()->post('role_note');
        $think_role=new Think_role();
        $think_role->role_name=$role_name;
        $think_role->role_note=$role_note;
        $success=$think_role->save();
        if($success){
            $this->success('添加角色成功','role_list');
        }else{
            $this->error('添加失败');
        }
    }
    //角色列表
    public function role_list(){
        $think_role=Think_role::get()->select();
        $think_role=json_decode(json_encode($think_role),true);
        return view('role_list',['think_role'=>$think_role]);
    }
    //删除角色
    public function roledel(){
        $role_id=Request::instance()->post('role_id');
        $data=Think_role::destroy(['role_id'=>$role_id]);
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }
    /**角色赋权**/
    public function role_node(){
        if(request()->isPost()){
            //获取数据
            $data = request()->post();
            //角色id
            $r_id=$data['r_id'];
            //权限id
            $n_id=$data['n_id'];
            $role_node= db('think_role_node')->where('r_id',$r_id)->delete();
            $data = array();
            foreach ($n_id as $key => $val) {
                $arr = array("r_id" => $r_id, "n_id" => $val);
                $data[] = $arr;
            }
            //批量添加
            if ($admin_role= db('think_role_node')->insertAll($data)) {
                $this->success('赋权成功','role_list');
            } else {
                echo "赋权失败";
            }



        }else{
            $role_id=request()->get('role_id');
            //查询角色
            $roleList=db('think_role')->where('role_id',$role_id)->find();
            //查询权限
            $nodeList=db('think_node')->select();
            // print_r($roleList);die;
            return view('role_node',array('roleList'=>$roleList,'nodeList'=>$nodeList));
        }
    }

    /**管理员**/

    public function user(){
        $role_name=new Think_role();
        $role_name->field('role_name,role_id');
        $role=json_decode(json_encode($role_name->select()),true);

        return view('user',['role'=>$role]);
    }
    //管理员分配角色
    public function user_role(){
        if(request()->isPost()){
            //获取数据
            $data = request()->post();
            //用户id
            $user_id=$data['user_id'];
            //角色id
            $role_id=$data['role_id'];
            $role_node= db('think_user_role')->where('user_id',$user_id)->delete();
            $data = array();
            foreach ($role_id as $key => $val) {
                $arr = array("user_id" => $user_id, "role_id" => $val);
                $data[] = $arr;
            }
            //批量添加
            if ($admin_role= db('think_user_role')->insertAll($data)) {
                $this->success('分配角色成功','user_list');
            } else {
                echo "赋权失败";
            }
        }else{
            $user_id=request()->get('user_id');
            $userList=db('think_user')->where(['user_id'=>$user_id])->find();
            $role_id= db("think_user_role")->where("user_id=$user_id")->column("role_id");
           // print_r($n_id);die;
            //查询角色
            $role=db('think_role')->select();
            foreach($role as $key=>$val){
                if(in_array($val['role_id'],$role_id)){
                    $role[$key]["status"]=1;
                }else{
                    $role[$key]["status"]=0;
                }

            }
            return view('user_role',array('userList'=>$userList,'role'=>$role));
        }

    }
    //处理管理员
    public function userto(){
        /*$role_id=Request::instance()->post('role_id');*/
        $user_name=Request::instance()->post('user_name');
        $user_pwd=Request::instance()->post('user_pwd');
        $user_pwds=Request::instance()->post('user_pwds');
       // $user_role_note=Request::instance()->post('user_role_note');
           /* echo "<script>alert('角色未选择');window.location='user'</script>";*/
        if($user_pwd!=$user_pwds){
                echo "<script>alert('密码不同');window.location='user'</script>";
            }else{
                $user=new Think_user();
            $data=array('user_name'=>$user_name,'user_pwd'=>md5($user_pwd));
              $success= $user->insert($data);
                if($success){
                    echo "<script>alert('管理员添加成功');window.location='user_list'</script>";
                }else{
                    echo "<script>alert('管理员添加失败');window.location='user'</script>";
                }
            }
        }

    //管理员列表展示
    public function user_list(){
          $userList=db('think_user')->select();
         return view('user_list',array('userList'=>$userList));

    }
    //添加权限
    public function node_add(){
        if(request()->isPost()){
           $data= request()->post();
            $re=db('think_node')->insert($data);
            if($re){
                $this->success('添加权限成功','nodeList');
            }else{
                echo "添加权限失败";
            }
        }else{
            return view('node_add');
        }

    }
    //权限展示
    public function nodeList(){
        $nodeList=db('think_node')->select();
        return view('node',array('node'=>$nodeList));

    }
}