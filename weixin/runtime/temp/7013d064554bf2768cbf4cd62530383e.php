<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/data/wwwroot/default/weixin/public/../application/home/view/personal/show.html";i:1492766518;s:79:"/data/wwwroot/default/weixin/public/../application/home/view/index/footer5.html";i:1492765789;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心展示</title>
</head>
<script src="../../../../public/js/jquery.js"></script>
<link rel="stylesheet" href="../../../../public/css/example.css"/>
<link rel="stylesheet" href="../../../../public/css/weui.css"/>
<style>
    *{
        font-size: 40px;
    }
</style>
<body>
<center>
    <div style="width:100%;height:100px;border-bottom: 1px black solid;margin:50px 20px;">
    <a  href="<?php echo url('center/course'); ?>"  style="color:dimgrey;" >
        <div style="float:left;margin-top:10px;">
            <p>精品课程</p>
        </div>
        <div  style="float: right;font-size: 50px;color:grey;margin-right: 20px;">></div>
    </a>
    </div>


    <div style="width:100%;height:100px;border-bottom: 1px black solid;margin:30px 20px;">
        <a  href="<?php echo url('personal/myorder'); ?>"  style="color:dimgrey;" >
            <div style="float:left;">
                <p>我的订单</p>
            </div>
            <div  style="float: right;font-size: 50px;color:grey;margin-right: 20px;">></div>
        </a>
    </div>
    <div style="width:100%;height:100px;border-bottom: 1px black solid;margin:30px 20px;">
        <a  href="<?php echo url('personal/course'); ?>"  style="color:dimgrey;" >
            <div style="float:left;margin-top:10px;">
                <p>正在学习</p>
            </div>
            <div  style="float: right;font-size: 50px;color:grey;margin-right: 20px;">></div>
        </a>
    </div>
</center>
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
            <a href="<?php echo url('league/lists'); ?>" class="weui-tabbar__item"  style="text-decoration: none;font-size: 50px;">
                    <span style="display: inline-block;position: relative;">
                        <img src="../../../../public/img/tabbar.png" alt="" class="weui-tabbar__icon" style="width:100px;height:100px;" >
                    </span>
                <p class="weui-tabbar__label"  style="font-size: 35px;">近期课程</p>
            </a>
            <a href="<?php echo url('personal/show'); ?>" class="weui-tabbar__item  weui-bar__item_on"  style="text-decoration: none;font-size: 50px;">
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

</body>
</html>