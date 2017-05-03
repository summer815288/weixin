<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;

class Het extends  Controller
{
    /*
     * 热文展示
     */
    public function index()
    {


        //判断当前页码是否存在
        $pages = isset($page) ? $page : 1 ;
        //计算总条数
        $count =count(Db::table('het')->select());

        //设置每一页显示的条数
        $pageSize = 2 ;
        //计算总页数
        $pageSum = ceil($count/$pageSize);
        //计算偏移量
        $offset = ($pages - 1)*$pageSize;
        //计算上一页 下一页
        $last = $pages<=1 ? 1 : $pages-1 ;
        $next = $pages>=$pageSum ? $pageSum : $pages+1 ;
        //拼接A链接
        $str = '';
        $str .= "<a href='javascript:void(0);' onclick='page(1)'>首页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($last)'>上一页</a>&nbsp;&nbsp;";
        for($i=1;$i<=$pageSum;$i++)
        {
            $str .= "<a href='javascript:void(0);' onclick='page($i)'>$i</a>&nbsp;&nbsp;";
        }
        $str .= "<a href='javascript:void(0);' onclick='page($next)'>下一页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($pageSum)'>尾页</a>";
        $arr=Db::table('het')->join('hetclass','het.cid = hetclass.cid')->limit($offset,$pageSize)->select();
        $this->assign('arr',$arr);
        $this->assign('page',$str);
        return $this->fetch('index');
    }
    /*
     * 添加热文页面
     */
    public function add()
    {
        $arr=Db::table('hetclass')->select();
        $this->assign('arr',$arr);
       return $this->fetch('add');
    }
    /*
     *热文入库
     */
    public function h_add()
    {
        $title=$_POST['h_title'];
        $content=$_POST['h_content'];
        $cid=$_POST['c_id'];
        $time=date('Y-m-d',time());
        $author=$_POST['h_author'];
        $file = request()->file('h_img');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>100000000000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
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
            $data = ['h_title'=>$title,'h_content'=>$content,'h_time'=>$time,'h_author'=>$author,'h_img' =>$img,'cid'=>$cid];
            $add=Db::table('het')->insert($data);
            if($add)
            {
                $this->redirect('Het/index');
            }
        }
        else
        {
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    /*
     *验证标题唯一性
     */
    public function yan()
    {
        $title=$_POST['title'];
        $find=Db::table('het')->where('h_title',$title)->find();
        if($find)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
    /*
     * 删除热文
     */
    public function del($id)
    {
        db('het')->delete($id);
        $this->redirect('Het/index');

    }
    /*
     * 热文修改
     */
    public function update($id)
    {
        $find=Db::table('het')->where('h_id',$id)->find();
        $this->assign('find',$find);
        return $this->fetch('update');
    }
    /*
     * 修改入库
     */
    public function h_update()
    {
        $id=$_POST['id'];
        $title=$_POST['h_title'];
        $content=$_POST['h_content'];
        $time=date('Y-m-d',time());
        $author=$_POST['h_author'];
        Db::table('het')
            ->where('h_id',$id)
            ->update(['h_title'=>$title,'h_content'=>$content,'h_time'=>$time,'h_author'=>$author]);
        $this->redirect('Het/index');
    }
    /*
     * 热文审核
     */
    public function start()
    {
        $id=$_POST['id'];
        $start=Db::table('het')
            ->where('h_id',$id)
            ->update(['h_start'=>1]);
        if($start)
        {
            echo 1;
        }

    }
    /*
     * 搜索
     */
    public function ss()
    {
        $data=$_POST;
        $page=$_POST['pages'];
        unset($data['pages']);
        $a=$data["h_content"];
        $b=$data["h_author"];
        if($a==''&&$b=='')
        {
            $arr=Db::table('het')->select();

        }
        else
        {

            if($a=='')
            {
                $arr=Db::table('het')
                    ->where(['h_author'=>$b
                    ])
                    ->select();
            }
            elseif($b=='')
            {
                $arr=Db::table('het')
                    ->where([
                        'h_content'  =>  ['like',"%$a%"],

                    ])
                    ->select();
            }
            else
            {
                $arr=Db::table('het')
                    ->where([
                        'h_content'  =>  ['like',"%$a%"],
                        'h_author'=>$b
                    ])
                    ->select();
            }
        }
        //判断当前页码是否存在
        $pages = isset($page) ? $page : 1 ;
        //计算总条数
        $count =count($arr);
        //设置每一页显示的条数
        $pageSize = 2 ;
        //计算总页数
        $pageSum = ceil($count/$pageSize);
        //计算偏移量
        $offset = ($pages - 1)*$pageSize;
        //计算上一页 下一页
        $last = $pages<=1 ? 1 : $pages-1 ;
        $next = $pages>=$pageSum ? $pageSum : $pages+1 ;
        //拼接A链接
        $str = '';
        $str .= "<a href='javascript:void(0);' onclick='page(1)'>首页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($last)'>上一页</a>&nbsp;&nbsp;";
        for($i=1;$i<=$pageSum;$i++)
        {
            $str .= "<a href='javascript:void(0);' onclick='page($i)'>$i</a>&nbsp;&nbsp;";
        }
        $str .= "<a href='javascript:void(0);' onclick='page($next)'>下一页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($pageSum)'>尾页</a>";




                if($a==''&&$b=='')
                {
                    $ar=Db::table('het')->join('hetclass','het.cid = hetclass.cid')->limit($offset,$pageSize)->select();
                }
                else
                {

                    if($a=='')
                    {
                        $ar=Db::table('het')->join('hetclass','het.cid = hetclass.cid')->limit($offset,$pageSize)
                            ->where(['h_author'=>$b
                            ])
                            ->select();
                    }
                    elseif($b=='')
                    {
                        $ar=Db::table('het')->join('hetclass','het.cid = hetclass.cid')->limit($offset,$pageSize)
                            ->where([
                                'h_content'  =>  ['like',"%$a%"],

                            ])
                            ->select();
                    }
                    else
                    {
                        $ar=Db::table('het')->join('hetclass','het.cid = hetclass.cid')->limit($offset,$pageSize)
                            ->where([
                                'h_content'  =>  ['like',"%$a%"],
                                'h_author'=>$b
                            ])

                            ->select();
                    }
                }




                $da['aa']=$ar;
        $da['str']=$str;
       //print_r($arr);
        echo json_encode($da);
    }
    /*
     * 热文分类管理
     */
    public function lei()
    {
        //判断当前页码是否存在
        $pages = isset($page) ? $page : 1 ;
        //计算总条数
        $count =count(Db::table('hetclass')->select());
        //设置每一页显示的条数
        $pageSize = 2 ;
        //计算总页数
        $pageSum = ceil($count/$pageSize);
        //计算偏移量
        $offset = ($pages - 1)*$pageSize;
        //计算上一页 下一页
        $last = $pages<=1 ? 1 : $pages-1 ;
        $next = $pages>=$pageSum ? $pageSum : $pages+1 ;
        //拼接A链接
        $str = '';
        $str .= "<a href='javascript:void(0);' onclick='page(1)'>首页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($last)'>上一页</a>&nbsp;&nbsp;";
        for($i=1;$i<=$pageSum;$i++)
        {
            $str .= "<a href='javascript:void(0);' onclick='page($i)'>$i</a>&nbsp;&nbsp;";
        }
        $str .= "<a href='javascript:void(0);' onclick='page($next)'>下一页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($pageSum)'>尾页</a>";
        $arr=Db::table('hetclass')->limit($offset,$pageSize)->select();
        $this->assign('arr',$arr);
        $this->assign('page',$str);

        return $this->fetch('lei');
    }
    /*
     * 热文分类删除
     */
    public function calss_del($id)
    {

        db('hetclass')->delete($id);
        $this->redirect('Het/lei');
    }
    /*
     * 热文分页
     */
    public function calss_fen()
    {
        $page=$_POST['pages'];
        //判断当前页码是否存在
        $pages = isset($page) ? $page : 1 ;
        //计算总条数
        $count =count(Db::table('hetclass')->select());
        //设置每一页显示的条数
        $pageSize = 2 ;
        //计算总页数
        $pageSum = ceil($count/$pageSize);
        //计算偏移量
        $offset = ($pages - 1)*$pageSize;
        //计算上一页 下一页
        $last = $pages<=1 ? 1 : $pages-1 ;
        $next = $pages>=$pageSum ? $pageSum : $pages+1 ;
        //拼接A链接
        $str = '';
        $str .= "<a href='javascript:void(0);' onclick='page(1)'>首页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($last)'>上一页</a>&nbsp;&nbsp;";
        for($i=1;$i<=$pageSum;$i++)
        {
            $str .= "<a href='javascript:void(0);' onclick='page($i)'>$i</a>&nbsp;&nbsp;";
        }
        $str .= "<a href='javascript:void(0);' onclick='page($next)'>下一页</a>&nbsp;&nbsp;";
        $str .= "<a href='javascript:void(0);' onclick='page($pageSum)'>尾页</a>";
        $arr=Db::table('hetclass')->limit($offset,$pageSize)->select();
        $da['aa']=$arr;
        $da['str']=$str;
        echo json_encode($da);

    }
    /*
     * 热文分类修改
     */
    public function class_update()
    {

        $id=$_POST['id'];
        $value=$_POST['value'];
        $start=Db::table('hetclass')
            ->where('cid',$id)
            ->update(['className'=>$value]);
        if($start)
        {
            echo 1;
        }
    }
    /*
     * 添加分类
     */
    public function class_add()
    {
        return $this->fetch('class_add');
    }
    /*
     * 分类入库
     */
    public function class_ad()
    {
        $name=$_POST['className'];
        $data = ['className' =>$name];
       Db::table('hetclass')->insert($data);
        $this->redirect('Het/lei');
    }
}




?>