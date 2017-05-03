<?php
namespace app\admin\controller;
use think\Controller;
//后台课程分类
class Category extends Controller
{
    //课程添加
    public function add()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $re = db('category')->insert($data);
            if ($re) {
                echo 0;
            } else {
                echo 1;
            }
        } else {
            return view('add');
        }
    }

    //课堂视频上传
    public function up1()
    {
        $dir = $_POST['filename'];
        // print_r($dir);die;
        $dir = "uploads/" . md5($dir);
        file_exists($dir) or mkdir($dir, 0777, true);
        $path = $dir . "/" . $_POST['blobname'];
//print_r($_FILES["file"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $path);

        //到这里接收完毕
        if (isset($_POST['lastone'])) {

//最后一个文件 碎片结束会.会触发这个if
            echo $_POST['lastone'];
            $count = $_POST['lastone'];    // 这里,js 会post过来,文件 的长度
            //$_POST['filename'] 1.mp4
            $fp = fopen(dirname($dir) . '/' . $_POST['filename'], "w");    //打开 post过来的 文件 名
            //1000个
            for ($i = 0; $i <= $count; $i++) { //遍历所有 上面的文件 碎片 组装
                $file_name = $dir . "/" . $i;
                $handle = fopen($file_name, "rb");
                fwrite($fp, fread($handle, filesize($file_name)));
                fclose($handle);
                unlink($file_name);
            }
            rmdir($dir);
            fclose($fp);  //结束

        }
    }

    //展示课程
    public function show()
    {
        //查询课程背景
        $category = db('category')->select();
        return view('show', array('data' => $category));
    }

    //课程删除
    public function del()
    {
        $id = request()->get('id');
        $re = db('category')->delete($id);
        if ($re) {
            return redirect('category/show');
        }
        //print_r($id);
    }

    //课程修改
    public function edit()
    {
           //获取id
            $id = request()->post('id');
          //获取 name
            $name=request()->post('name');
            $category=db('category')->where('id',$id)->find();
           $c_name=$category['c_name'];
          if($c_name==$name){
              echo 1;die;
          }else{
              $data=array('c_name'=>$name);
              $re=db('category')->where('id',$id)->update($data);
              if($re){
                  echo 2;
              }
          }
    }
}