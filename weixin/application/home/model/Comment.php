<?php
namespace app\home\model;
use think\Model;
class Comment extends Model{

   // 设置返回数据集的对象名
   //protected $resultSetType = 'collection';

   //自定义初始化
   protected function initialize()
   {
       //需要调用`Model`的`initialize`方法
       parent::initialize();
        //TODO:自定义的初始化
    }

}
