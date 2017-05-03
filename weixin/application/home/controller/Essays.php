<?php
namespace app\home\controller;
use think\Controller;
use app\home\model\Essay;
/**
 * U范 热文
 * author ：taoing
 **/
class Essays extends Controller{

  /**
   * U范热文 首页3
   * return null
   **/
   public function index()
   {
   	 return view('index');
   }


}