<?php
namespace app\admin\controller;
use app\admin\controller\Prevent;
use think\Controller;
use  app\admin\model\Product;
use  app\admin\model\Type;
use think\Session;
class Index extends Prevent{

    public function index(){
        $uname=Session::get('user_name');
         return view('index',['uname'=>$uname]);
    }

    public function main(){
        $uname=Session::get('user_name');
        return view('main',['uname'=>$uname]);
    }

    public function product_add(){
        $type=Type::select();
       $types=json_decode(json_encode($type),true);
        return view('product_add',['type'=>$types]);
    }
    public function product_pro(){

        if(!isset($_POST['title'])||empty($_POST['title'])){
            $title="";
        }else{
            $title=$_POST['title'];
        }
        if(!isset($_POST['desc'])||empty($_POST['desc'])){
            $desc="";
        }else{
            $desc=$_POST['desc'];
        }
        if(!isset($_POST['content'])||empty($_POST['content'])){
            $content="";
        }else{
            $content=$_POST['content'];
        }
        if(!isset($_POST['tid'])||empty($_POST['tid'])){
            $tid="";
        }else{
            $tid=$_POST['tid'];
        }
        if(!isset($_POST['man'])||empty($_POST['man'])){
            $man="";
        }else{
            $man=$_POST['man'];
        }
        if(!isset($_POST['man_desc'])||empty($_POST['man_desc'])){
            $man_desc="";
        }else{
            $man_desc=$_POST['man_desc'];
        }

        $file = request()->file('img');
        $info = $file->move(ROOT_PATH . 'public/img');
        if($info){
           $img= $info->getSaveName();
        }else{
            echo $file->getError();
        }
        $file = request()->file('video');
        $info = $file->move(ROOT_PATH . 'public/video');
        if($info){
            $video=$info->getSaveName();
        }else{
            echo $file->getError();
        }

        $p = new Product;
       $insert= $p->data([
            'img'=>$img,
            'title'=>$title,
            'desc'=>$desc,
            'content'=>$content,
            'tid'=>$tid,
            'video'=>$video,
            'man_desc'=>$man_desc,
            'man'=>$man,
           'addtime'=>time()
            ]);
      $p->save();
        if($insert){
            $this->success('添加成功');
        }else{
            $this->fail('添加失败，请重新添加');
        }






    }

    //文章分类管理
    public  function type(){
        $type=Type::select();
        $types=json_decode(json_encode($type),true);
        return view('type',['type'=>$types]);
    }
    //分类添加
    public function type_pro(){
        $tname=$_POST['tname'];
        $type=new Type();
        $insert=$type->data([
            'tname'=>$tname
        ])->save();
        if($insert){
            echo 1;
        }else{
            echo 0;
        }

}

    //各分类下的文章管理
    public function all(){

        //接收搜索的值进行搜索后分页
        $p=Product::join('type','`type`.`tid`=`product`.`tid`')->paginate(3);
        $ps=json_decode(json_encode($p),true);

        foreach($ps['data'] as $k=>$v){
           $ps['data'][$k]['desc']=substr($v['desc'],0,30)."......";
           $ps['data'][$k]['content']=substr($v['content'],0,30)."......";
           $ps['data'][$k]['man_desc']=substr($v['man_desc'],0,30)."......";
           $ps['data'][$k]['title']=substr($v['title'],0,30)."......";
           $ps['data'][$k]['addtime']=date('Y-m-d H:i:s',$v['addtime']);
        }

        //得到所有的分类文章
        $type=Type::select();
        $types=json_decode(json_encode($type),true);

        //获取分页显示
        $page=$p->render();
        //模板变量赋值
        $this->assign('p', $ps);
        $this->assign('page', $page);
        $this->assign('type',$types);


        return $this->fetch();

    }


    //进行ajax删除
    public function del(){
        $id=$_POST['id'];
        $del=Product::where('id',$id)->delete();
        if($del){
            echo 1;
        }else{echo 0;
        }
    }

    //进行ajax搜索后分页
    public function search(){
        //首先接收值，然后再进行操作
        $tid=$_POST['tid'];
        $begin=$_POST['begin'];
        $end=$_POST['end'];

        $sql="select * from `product` where 1";
        if(isset($_POST['tid'])&&!empty($_POST['tid'])){
            $sql="and `tid`=$tid ";
        }
        if(isset($_POST['begin'])&&!empty($_POST['begin'])){
            $begin=strtotime($_POST['begin']);
            $sql.=" and `addtime`>=$begin  ";
        }
        if(isset($_POST['end'])&&!empty($_POST['end'])){
            $end=strtotime($_POST['end']);
            $sql.=" and `addtime`<=$end ";
        }

        $p=Product::join('type','`type`.`tid`=`product`.`tid`')->query($sql)->paginate(3);
        print_r($p);die;
        $ps=json_decode(json_encode($p),true);
        foreach($ps['data'] as $k=>$v){
            $ps['data'][$k]['desc']=substr($v['desc'],0,30)."......";
            $ps['data'][$k]['content']=substr($v['content'],0,30)."......";
            $ps['data'][$k]['man_desc']=substr($v['man_desc'],0,30)."......";
            $ps['data'][$k]['title']=substr($v['title'],0,30)."......";
            $ps['data'][$k]['addtime']=date('Y-m-d H:i:s',$v['addtime']);
        }
        //获取分页显示
        $page=$p->render();
        //模板变量赋值
        $data['p']=$ps;
        $data['page']=$page;
        echo json_encode($data);

    }
public function login_out(){
    Session::delete('user_name');
    Session::delete('user_id');
    if(empty(Session::delete('user_name'))&&empty(Session::delete('user_id'))){
        $this->redirect('login/login');
    }
}


}
