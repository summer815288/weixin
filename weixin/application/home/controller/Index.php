<?php
namespace app\home\controller;
use app\admin\controller\Video;
use think\Controller;
use think\Session;
use think\Db;
use app\home\model\Product;
use app\home\model\Type;
use app\home\model\Look;
use app\home\model\Zan;
use app\home\model\Appnum;
use app\home\model\Videos;
use \think\Request;
use app\home\model\Comment;
class Index extends Controller
{
    //商城的主页展示页面
    public function index()
    {

        //查找的是全部的信息
        $p = new Product();
        $list = $p->join('type', '`product`.`tid`=`type`.`tid`')->select();
        $list = json_decode(json_encode($list), true);

        $look = new Look();
        $zan = new Zan();
        $c = new Comment();

        foreach ($list as $k => $v) {
            //查找全部的之前学过/看过的人；
            $arr = $look->where('pid', $v['id'])->select();
            $list[$k]['look'] = count($arr);
            // 查找盖老师收到的全部的花花；
            $arr2 = $zan->where('man', $v['man'])->select();
            $list[$k]['zan'] = count($arr2);
            //查找该文张所有的留言
            $arr3 = $c->where('pid', $v['id'])->select();
            $list[$k]['comment'] = count($arr3);

        }

        //现在查找全部的分类
        $typ = Type::select();
        $type = json_decode(json_encode($typ), true);
        $color = ['blue', 'orangered', 'green', 'grey', 'red', 'lime', 'lemonchiffon', 'red'];
        foreach ($type as $k => $v) {
            $type[$k]['tname'] = mb_substr($v['tname'], 0, 1);
            $type[$k]['color'] = $color[$k];
        }

        $data['type'] = $type;
        $data['list'] = $list;

        return view('index', ['data' => $data]);
    }


    //精选微视频详情展示页面
    public function detail()
    {
        //接收id，然后进行查找的展示
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $id = "";
            echo "<script>alert('id不能为空');history.go(-1)</script>";
        } else {
            $id = $_GET['id'];
            $uid = Session::get('uid');
            if (empty($uid) || !isset($uid)) {
                $uid = "";
            } else {
                $uid = Session::get('uid');
            }

            //2查找的是一条信息
            $p = new Product();
            $arr = $p->join('type', '`product`.`tid`=`type`.`tid`')->where('`product`.`id`', $id)->find();
            $look = new Look();
            if ($arr) {
                //1查找 看看该视频讲师所受到的全部的花
                $zan = new Zan();
                $man = $zan->where('man', $arr['man'])->select();
                if ($man) {
                    $zan_count = count($man);
                } else {
                    $zan_count = 0;
                }
                //查找   看看该用户是否给该讲讲师送过花
                $users = $zan->where(['man' => $arr['man'], 'uid' => $uid])->find();
                if ($users) {
                    $status = 1;
                } else {
                    $status = 0;
                }

                //首先进行查找看看该用户之前是否看过这个视屏，看过之后就不再加一了
                $arr2 = $look->where('uid', $uid)->find();
                if (!$arr2 && $uid != "") {
                    //没有添加过   就把这个加到学过的人表中（id  uid  pid ）
                    //$learn_num=$arr['learn_num'];
                    $look->data([
                        'uid' => $uid,
                        'pid' => $id,
                    ]);
                    $look->save();
                }
            }

            $data = $look->where('pid', $id)->select();
            $count = count($data);
            // print_r($count);die;
            $arr['count'] = $count;
            $arr['zan'] = $zan_count;
            $arr['status'] = $status;
            $arr['uid'] = $uid;
            //查询评论信息
            $arrComment = Db::query('select * from comment inner join `user` on `comment`.`uid` = `user`.`id` where `comment`.`pid`=' . $id);
            // echo Db::getLastSql();
            // var_dump($arrComment);die;

            $arrComments=$this->actionShu($arrComment);
//            print_r($arrComments);die;
            foreach($arrComments as $k=>$v){

                if($v['fid']==0){
                    $arrCommentss[$k]=$v;

                foreach($arrComments as $kk=>$vv){
                    if($vv['fid']==$v['cid']){
                        $arrCommentss[$k]['son']=$vv;

                        foreach($arrComments as $kkk=>$vvv){

                            if($vvv['fid']==$vv['cid']){
                                $arrCommentss[$k]['son']['sons']=$vvv;
                            }
                        }
                    }
                }
              }
            }

$data['arrComment'] = $arrComments;
            //默认是三级评论

          return view('detail', ['arr' => $arr, 'data' => $data]);
        }

    }

    //树
    public function actionShu($arr,$fid=0,$lev=1,$htmla="&nbsp;&nbsp;&nbsp;"){
        static $data=array();
        foreach($arr as $k=>$v){
            if($v['fid']==$fid){
                $v['lev']=$lev+1;
                $v['htmla']=str_repeat($htmla,$lev);
                $data[]=$v;
                $this->actionShu($arr,$v['cid'],$lev+1,$htmla);
            }
        }
        return $data;
    }







    //得到弹幕信息
    public function getData()
    {
        $tan = db('danmu')->field('content')->select();
        $json = '[';
        foreach ($tan as $k => $v) {
            $json .= $v['content'] . ',';
        }
        $json = substr($json, 0, -1);
        $json .= ']';
        echo $json;

        //
    }

    //插入数据
    public function sendData()
    {
        //插入数据
        $data['content'] = strip_tags($_POST['danmu']);
        $data['addtime'] = time();
        $insert = db('danmu')->insert($data);

    }


    //送老师花
    public function zan()
    {

        //首先接收值，然后进行数据库的修改；同时进行展示
        $man = $_POST['man'];
        $uid = Session::get('uid');
        $zan = new Zan();
        $zan->data([
            'uid' => $uid,
            'man' => $man,
        ]);
        $add = $zan->save();
        if ($add) {
            echo 1;
        } else {
            echo 0;
        }


    }

    //现在做的是微课的展示页面
    public function major()
    {
        //查找的是全部的信息
        $p = new Product();
        $list = $p->join('type', '`product`.`tid`=`type`.`tid`')->select();
        $list = json_decode(json_encode($list), true);
        foreach ($list as $k => $v) {
            $list[$k]['man_desc'] = mb_substr($v['man_desc'], 0, 3, 'utf8') . "...";
            $list[$k]['title'] = mb_substr($v['title'], 0, 11, 'utf8') . "...";
            $list[$k]['desc'] = mb_substr($v['desc'], 0, 11, 'utf8') . "...";

        }
        return view('major', ['list' => $list]);

    }

    //现在做的是分类下的微课的展示页面
    public function majors()
    {
        $tid = $_GET['tid'];
        //查找的是全部的信息
        $p = new Product();
        $list = $p->where('tid', $tid)->select();

        if (empty($list) || !isset($list)) {
            echo "<script>alert('该分类下没有数据');history.go(-1);</script>";
        } else {

            $list = json_decode(json_encode($list), true);
            foreach ($list as $k => $v) {
                $list[$k]['man_desc'] = mb_substr($v['man_desc'], 0, 3, 'utf8') . "...";
                $list[$k]['title'] = mb_substr($v['title'], 0, 11, 'utf8') . "...";
                $list[$k]['desc'] = mb_substr($v['desc'], 0, 11, 'utf8') . "...";

            }
            return view('majors', ['list' => $list]);
        }


    }

    public function footer()
    {
        return view('footer');
    }

    public function footer2()
    {
        return view('footer2');
    }

    public function footer4()
    {
        return view('footer4');
    }

    public function footer5()
    {
        return view('footer5');
    }

    /**
     * 添加提问
     * param: uid,pid,addTime,comment,appNum,fid[父id]
     * return null
     **/
    public function addComment()
    {
        //判断是否有值传过来
        if (!empty(input('?get.val')) && !empty(input('?get.pid'))) {
            //添加数据
            $data['comment'] = Request::instance()->get('val');
            $data['pid'] = Request::instance()->get('pid');
            $data['path'] = Request::instance()->get('path');//点赞数
            $data['uid'] = Session::get('uid');
            $data['addTime'] = date("Y-m-d H:i:s", time());
            $data['fid'] = 1;//待改
            $data['appNum'] = 0;//点赞数


            $model = new Comment;
            $res = $model->save($data);
            if ($res) {
                //添加成功
                $arr['code'] = 1;
                $arr['uname'] =  Session::get('account');
                $arr['addTime'] = date("Y-m-d H:i:s", time());
                $json = json_encode($arr);
                return $json;
            } else {
                //添加失败
                $arr['code'] = 0;
                $json = json_encode($arr);
                return $json;
            }

        } else {
            echo "<script>alert('提问不能为空');history.go(-1)</script>";
        }


    }

    /**
     * 留言点赞
     * param: cid[留言id] ,pid[文章id] , uid[用户id]
     * @author lang
     **/
    public function appComment()
    {
        //检测是否有值传入
        if (!empty(input('?get.cid')) && !empty(input('?get.pid'))) {
            $uid = Session::get('uid') ? Session::get('uid') : 1;
            $pid = Request::instance()->get('pid') ? Request::instance()->get('pid') : 1;
            $cid = Request::instance()->get('cid') ? Request::instance()->get('cid') : 1;

            //先判断该用户是否点赞
            $arr = Db('appnum')->where('pid', $pid)->where('pid', $pid)->where('cid', $cid)->where('uid', $uid)->select();
            if (empty($arr)) {
                //当 点赞表数据为空时，才能点赞
                $res = Db::table('comment')->where('cid', $cid)->setInc('appNum', 1, 0);
                if ($res) {#die("1");
                    //将当前 cid,uid,pid 入库
                    $data['cid'] = $cid;
                    $data['uid'] = $uid;
                    $data['pid'] = $pid;

                    // $resAdd = Db::name('appnum')->insertAll($data);
                    $model = new Appnum();
                    $resAdd = $model->save($data);

                    if ($resAdd) {
                        $json = ['code' => 1, 'message' => '点赞成功'];
                        $json = json_encode($json);
                        return $json;

                    } else {
                        $json = ['code' => 3, 'message' => '点赞成功,你可以进行无数次点赞'];
                        $json = json_encode($json);
                        return $json;
                    }

                } else {
                    $json = ['code' => 2, 'message' => '点赞失败'];
                    $json = json_encode($json);
                    return $json;
                }

            } else {
                $json = ['code' => 3, 'message' => '你已经点过赞了'];
                $json = json_encode($json);
                return $json;
            }


        } else {
            $json = ['code' => 4, 'message' => '你是不是来错地方了'];
            $json = json_encode($json);
            return $json;

        }


    }

    /**
     * 回复留言
     * param: pid[文章id]; cid[留言id]; val [留言内容]; fid[父id] ;path [路径]
     * @author lang
     **/
    public function revComment()
    {

        //判断是否有值传过来
        if (!empty(input('?get.val')) && !empty(input('?get.pid')) && !empty(input('?get.cid')) && !empty(input('?get.fid')) && !empty(input('?get.path'))) {
            //添加数据
            $data['comment'] = Request::instance()->get('val');
            $data['pid'] = Request::instance()->get('pid');
            $data['fid'] = Request::instance()->get('cid');
            $path = Request::instance()->get('path');
            $data['path'] = $path . "-" . $data['fid'];     //处理路径
            $data['uid'] = Session::get('uid');
            //$data['uid'] = 5;                          //写死，待删除
            $data['addTime'] = date("Y-m-d H:i:s", time());


            $model = new Comment;
            $res = $model->save($data);
            if ($res) {
                //添加成功
                $arr['code'] = 1;
                $arr['uname'] = Session::get('account');
                $arr['addTime'] = date("Y-m-d H:i:s", time());;
                $json = json_encode($arr);
                return $json;
            } else {
                //添加失败
                $arr['code'] = 0;
                $json = json_encode($arr);
                return $json;
            }

        } else {
            echo "<script>alert('提问不能为空');history.go(-1)</script>";
        }
    }

    /*在线直播*/
    public function appVideo()
    {
        $video = new Videos();
        $video->order('video_id','desc');
        $videoData = json_decode(json_encode($video->select()), true);
        return view('video', ['video' => $videoData]);
    }

    public function appStart()
    {
        $video_id = Request::instance()->get('id');
        $video = new Videos();
        $video->where(['video_id' => $video_id]);
        $videoData = json_decode(json_encode($video->find()), true);
        $time = strtotime(date('Hi', time()));
        return view('video_start', ['videoData' => $videoData, 'time' => $time]);
    }
}