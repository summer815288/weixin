<?php
namespace app\home\model;
use think\Model;
use think\Db;
class Het extends Model{

   //自定义初始化
   protected function initialize()
   {
       //需要调用`Model`的`initialize`方法
       parent::initialize();
        //TODO:自定义的初始化
    }


    public function show(){
    	$arr = Db::query('select * from het left join hetclass on het.cid = hetclass.cid');

      return $arr;
    }

     /**
      * 查询单条数据
      * param ： $where  $table 
      **/
    public function find($table,$where){
      $arr = Db::query('select * from '. $table.' where '.$where);
      return $arr;
    }

}
