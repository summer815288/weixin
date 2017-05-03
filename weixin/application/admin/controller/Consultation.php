<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;

class Consultation extends  Controller
{
    /*
     * 后台功能展示
     */
    public function index()
    {
        return view("index");
    }
    /*
     * 添加图片
     */
    public function img_add()
    {
        return view("img_add");
    }
    /*
     * 添加入库
     */
    public function add()
    {
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>1000000000000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            $tt=$info->getSaveName();
            //去除反斜杠
            $str = stripslashes($tt);
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            $a=$info->getFilename();
            //分割字符串
            $arr = explode("$a", $str);
            //拼接路径
            $img="uploads/"."$arr[0]/".$a;
            $data = ['img' =>$img];
            $add=Db::table('img')->insert($data);
            if($add)
            {
                $this->redirect('Index/look');
            }

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    /*
     * 图片展示页面
     */
    public function look()
    {

        $arr=Db::table('img')->paginate(3);
        $this->assign('arr',$arr);
        return $this->fetch('look');

    }
    /*
     * 删除
     */
    public function del($id)
    {
        Db::table('img')->delete($id);
        $this->redirect('Consultation/look');
    }
    /*
     * 质询管理
     */
    public function problem()
    {
        $arr=Db::table('consultation')->select();
        $this->assign('arr',$arr);
        return $this->fetch('problem');
    }
    /*
     * 修改未解决
     */
    public function update()
    {
        $id=$_POST['id'];

        $up=Db::table('consultation')->update(['c_start' =>'1','c_id'=>$id]);
        if($up)
        {
            echo 1;
        }
    }
}
