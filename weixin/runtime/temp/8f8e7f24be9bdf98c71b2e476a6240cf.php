<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/data/wwwroot/default/weixin/public/../application/home/view/league/lists.html";i:1492823759;s:79:"/data/wwwroot/default/weixin/public/../application/home/view/index/footer4.html";i:1492765901;}*/ ?>
<?php
use think\Url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>近期课程</title>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <script src="../../../../public/js/jquery.js"></script>
</head>
<body>
<center>
    <h2 style="font-size: 60px;font-weight:bold;margin-bottom: 50px;margin-top: 50px;">近期重量级课程</h2>
    <div class="weui-cells__title">

        <table style="padding: 20px;font-size: 50px;">
            <?php foreach($category as $k=>$v){ ?>
           <tr><td>
               <a   href="<?php echo url('league/show'); ?>?id=<?php echo $v['id'] ?>"><?php echo $v['c_name']?></a>
           </td></tr>
            <?php }?>
        </table>

    </div>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>尾部展示</title>
    <script src="../../../../public/js/jquery.js"></script>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/bootstrap/css/bootstrap.min.css">
    <script src="../../../../public/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<center>
    <!--尾部展示-->
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" >
        <div class="weui-tabbar" style="position: relative;">
            <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item " style="text-decoration: none;font-size: 50px;" >
                    <span style="display: inline-block;position: relative;">
                        <img src="../../../../public/img/tabbar.png" alt="" class="weui-tabbar__icon" style="width:100px;height:100px;">
                    </span>
                <p class="weui-tabbar__label" style="font-size: 35px;">有范商学院</p>
            </a>
            <a href="<?php echo url('index/appVideo'); ?>" class="weui-tabbar__item"  style="text-decoration: none;font-size: 50px;">
                    <span style="display: inline-block;position: relative;">
                        <img src="../../../../public/img/tabbar.png" alt="" class="weui-tabbar__icon" style="width:100px;height:100px;">
                    </span>
                <p class="weui-tabbar__label"  style="font-size: 35px;">在线直播</p>
            </a>
            <a href="<?php echo url('consultation/index'); ?>" class="weui-tabbar__item"  style="text-decoration: none;font-size: 50px;">
                    <span style="display: inline-block;position: relative;">
                        <img src="../../../../public/img/tabbar.png" alt="" class="weui-tabbar__icon" style="width:100px;height:100px;" >
                    </span>
                <p class="weui-tabbar__label"  style="font-size: 35px;">咨询服务</p>
            </a>
            <a href="<?php echo url('league/lists'); ?>" class="weui-tabbar__item weui-bar__item_on"  style="text-decoration: none;font-size: 50px;">
                    <span style="display: inline-block;position: relative;">
                        <img src="../../../../public/img/tabbar.png" alt="" class="weui-tabbar__icon" style="width:100px;height:100px;" >
                    </span>
                <p class="weui-tabbar__label"  style="font-size: 35px;">近期课程</p>
            </a>
            <a href="<?php echo url('personal/show'); ?>" class="weui-tabbar__item"  style="text-decoration: none;font-size: 50px;">
                    <span style="display: inline-block;position: relative;">
                        <img src="../../../../public/img/tabbar.png" alt="" class="weui-tabbar__icon" style="width:100px;height:100px;">
                    </span>
                <p class="weui-tabbar__label"  style="font-size: 35px;">我的成长</p>
            </a>
        </div>
    </nav>

</center>
</body>
</html>
<script>
    $('.weui-tabbar a').hover(function(){
        $(this).addClass('weui-bar__item_on').siblings().removeClass('weui-bar__item_on');
    },function(){
        $(this).addClass('weui-bar__item_on').siblings().removeClass('weui-bar__item_on');
    })
</script>

</center>
</body>
</html>
