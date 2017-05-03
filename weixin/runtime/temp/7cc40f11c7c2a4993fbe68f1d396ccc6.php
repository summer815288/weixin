<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/data/wwwroot/default/weixin/public/../application/admin/view/consultation/look.html";i:1492687520;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        ul{
            margin-left: 40%;
        }
        li {
            list-style-type:none;
            float: left;
            width:30px;background:lightgrey;font-size: 16px;line-height: 30px;
            text-decoration: none;
        }
        ul li a{
            text-decoration: none;

        }
        table tr td{
            line-height: 30px;
            width: 100px;;
        }

    </style>
</head>
<body>
<center>
<table border="1" style="margin-left: 10%;line-height: 30px;">
    <tr>
        <td>ID</td>
        <td>图片</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
    <tr>
        <td><?php echo $v['f_id']; ?></td>
        <td><img src='../../../../public/<?php echo $v['img']; ?>' style="width: 50px;height: 50px"></td>
        <td><a href="<?php echo url('Consultation/del',['id'=>$v['f_id']]); ?>">删除</a></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>

 <?php echo $arr->render(); ?>
    </center>
</body>

</html>