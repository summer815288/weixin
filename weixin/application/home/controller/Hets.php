<?php
namespace app\home\controller;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use app\home\model\Het;
/**
 * 前台热文
 *
 **/
class Hets extends Controller
{
   /**
    * 前台热文
    *
    **/
	public function index(){
		$model = new Het();
		$arr = $model -> show(); 
		//根据分类对数据进行处理 pro 产品经典；mark 运营干货；ope 运营干货
	    foreach ($arr as $k => $v) {
	    	if($v['cid'] == 1){
	    		$data['pro'][] = $v;
	    	}if($v['cid'] == 2) {
	    		$data['mark'][] = $v;
	    	}if($v['cid'] == 3) {
	    		$data['ope'][] = $v;
	    	}
	    
	    }

		return view('index',['arr'=>$data]);

	}

	/**
    * 热文详情页
    *
    **/
    public function details(){
    	$hid = Request::instance()->get('hid'); 
    	//查看页面详情
    	$model = new Het();
		$arr = $model -> find($table = "het",$where="h_id =".$hid);
		$arr = $arr[0];  //将二维数组转换为一维
		// var_dump($arr);die();
    	return view('info',['arr'=>$arr]);

    }






}
