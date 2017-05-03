<?php
namespace app\admin\controller;
use think\View;
use think\Upload;
use think\Controller;
use app\admin\model\Course;
//后台的文件上传
class Photo
{
    //馒头商学院
    public function upload(){
        if(request()->isPost()){
            $up = new Upload;
            //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
            $up -> set("path", "./uploads/");
            $up -> set("maxsize", 6000000);
            $up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
            $up -> set("israndname", false);

            //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
            if($up -> upload("img")) {
                //分类id
                $c_id= request()->post('c_id');
                //图片
                $file= $_FILES['img'];
                // print_r($file);die;
                $dirs='uploads/';
                $a = $dirs. $file['name'];
                $data=array('img'=>$a,'c_id'=>$c_id);
                $re=db('course')->insert($data);
                if($re){
                    echo "添加成功";
                }else{
                    echo "添加失败";
                }

            } else {
                echo '<pre>';
                //获取上传失败以后的错误提示
                var_dump($up->getErrorMsg());
                echo '</pre>';
            }
        }else{
            //查询分类
            $category=db('category')->select();
            $view=new View();
            return $view->fetch('upload',array('category'=>$category));
        }

    }
    //近期的课程的内容介绍展示
    public function show(){
        $course=new Course();
        $courseList=$course->select();
        return view('course',array('data'=>$courseList));
    }
    //近期课程的删除
    public function del(){
        $id=request()->get('id');
        $re=db('course')->where('id',$id)->delete();
        if($re){
            return redirect('photo/show');
        }else{
            echo "删除失败";
        }
    }
    //近期课程的修改
    public function edit(){
        if(request()->isPost()){
            $up = new Upload;
            //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
            $up -> set("path", "./uploads/");
            $up -> set("maxsize", 6000000);
            $up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
            $up -> set("israndname", false);

            //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
            if($up -> upload("img")) {
                //分类id
                $c_id= request()->post('c_id');
                $id=request()->post('id');
                //图片
                $file= $_FILES['img'];
                // print_r($file);die;
                $dirs='uploads/';
                $a = $dirs. $file['name'];
                $data=array('img'=>$a,'c_id'=>$c_id);
                $re=db('course')->where('id',$id)->update($data);
                if($re){
                    return redirect('photo/show');
                }else{
                    echo "修改失败";
                }

            } else {
                echo '<pre>';
                //获取上传失败以后的错误提示
                var_dump($up->getErrorMsg());
                echo '</pre>';
            }
        }else{
            //get获取id
            $id=request()->get('id');
            $course=db('course')->where('id',$id)->find();
            //课程查询
            $category=db('category')->select();
           // print_r($course);die;
            return view('edit',array('course'=>$course,'category'=>$category));
        }

    }

}