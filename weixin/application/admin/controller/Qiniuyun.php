<?php
namespace app\admin\controller;
use Qiniu\Auth;
use think\Controller;
use think\Request;
use think\Url;
use gmars\qiniu\Qiniu;

class Qiniuyun extends Controller{
    public function index(){
        $qiniu = new Qiniu('8v7B76bPIWN_JGxza3dlcKHYjceXuoK2zQb1V8Fm','jTXo8zwLLz1Jbr-b_gwct45D6v3HZGJpD8c4Vd7H','summer');
        var_dump($qiniu);
    }
}