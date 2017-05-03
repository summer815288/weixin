<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\phpStudy\WWW\weixin\weixin\public/../application/home\view\index\video.html";i:1492666177;s:79:"D:\phpStudy\WWW\weixin\weixin\public/../application/home\view\index\footer.html";i:1492566151;}*/ ?>
<?php
use think\Url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>在线直播</title>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <script src="../../../../public/js/jquery.js"></script>
    <style>
        *{


        }
    </style>
</head>
<body>
<center>
        <h2>在线直播</h2>
        <div class="weui-cells__title">
            <?php foreach($video as $v): ?>
                <table style="padding: 20px;font-size: 50px;">
                    <tr>
                        <td>
                            <a href="<?php echo url('index/appstart'); ?>?id=<?php echo $v['video_id']; ?>" style="margin: auto">
                            <img src="../../../../public/uploads/zhibo/<?php echo $v['video_img']; ?>" width="500" height="200"><br>
                                <p style="font-size: 30px">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['video_name']; ?></p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <td><p style="font-size: 30px">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('H:i开始',$v['video_start']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('H:i结束',$v['video_end']); ?></p></td>
                    </tr>
                </table>
            <?php endforeach; ?>
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
            <a href="__URL__/index" class="weui-tabbar__item weui-bar__item_on" style="text-decoration: none;font-size: 50px;" >
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
            <a href="<?php echo url('league/show'); ?>" class="weui-tabbar__item"  style="text-decoration: none;font-size: 50px;">
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
