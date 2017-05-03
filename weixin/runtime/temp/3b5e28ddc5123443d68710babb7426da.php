<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/data/wwwroot/default/weixin/public/../application/home/view/index/video_start.html";i:1493176529;s:79:"/data/wwwroot/default/weixin/public/../application/home/view/index/footer2.html";i:1492765101;}*/ ?>
<?php
use think\Url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $videoData['video_name']; ?></title>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <script src="../../../../public/js/jquery.js"></script>
    <style>
        *{
            padding: 20px;;
            font-size: 50px;
        }
    </style>
</head>
<body>
<center>
    <h2 style="font-size: 50px;font-weight: bolder">在线直播</h2>
    <div class="weui-cells__title" style="width:100%;height:500px;">
        <?php if((($videoData['video_start'] <= $time) and ($time <=  $videoData['video_end']))): ?>
        <table>
            <tr>
                <td>
                    <video width="auto" height="500" controls autobuffer>
                        <source src="<?php echo $videoData['video_url']; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
                    </video>
                </td>
            </tr>
        </table>
        <?php elseif(($videoData['video_start'] >= $time)): ?>
        <div style="position:absolute;top:0px;left:0px;width:100%;height:550px;z-index:1;background: black;"  >
            <div style="top:150px;position:absolute;left:30%;width:500px;height:100px;color:white;font-size:40px;">直播还未开始</div>
            <a href="<?php echo url('index/appVideo'); ?>" style="text-decoration: none;color:white;">请观看其他视频</a></button>

        </div>
        <?php elseif(($videoData['video_end'] <= $time)): ?>
        <div style="position:absolute;top:0px;left:0px;width:100%;height:550px;z-index:1;background: black;" >
            <div style="top:150px;position:absolute;left:30%;width:500px;height:100px;color:white;font-size:40px;">直播已经结束</div>
            <a href="<?php echo url('index/appVideo'); ?>" style="text-decoration: none;color:white;top:250px;position:absolute;left:25%;width:500px;height:100px;background:dimgrey;color:white;">请观看其他视频</a>

        </div>
        <?php endif; ?>
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
            <a href="<?php echo url('index/appVideo'); ?>" class="weui-tabbar__item weui-bar__item_on"  style="text-decoration: none;font-size: 50px;">
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
