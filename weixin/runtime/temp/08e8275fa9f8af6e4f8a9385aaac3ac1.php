<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\WWW\weixin\weixin\public/../application/home\view\center\course.html";i:1492684226;}*/ ?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>我的课程</title>
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--<meta name="format-detection" content="telephone = no" />-->
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="我的课程" />
    <meta name="msapplication-TileColor" content="#090a0a">
    <link rel="stylesheet" href="../../../../public/css/css_style.css">
    <script type="text/javascript" src="../../../../public/js/zepto.min.js"></script>
</head>
<body class="grayBy">
<ul class="fav_list" style="height:200px;">
    <?php if(is_array($subject) || $subject instanceof \think\Collection || $subject instanceof \think\Paginator): if( count($subject)==0 ) : echo "" ;else: foreach($subject as $key=>$val): ?>
    <li>
        <a href="#">
            <i class="pic">课程视频<video src="../../../../public/video/1.mp4" style="height: 100%;width: 100%"  controls="controls">
            </video></i>
            <h2>手机号:<?php echo $val['phone']; ?></h2>
            <h2>课程名称:<?php echo $val['subject']; ?></h2>
            <h2>购买时间:<?php echo $val['time']; ?></h2>
            <b>价格:¥<?php echo $val['total_fee']; ?></b>
        </a>
        <span class="del_fav"><i class="del_fav_icon"></i></span>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    
</ul>
</body>
</html>
<script type="text/javascript">
    $(".fav_list li .del_fav").click(function () {
        $(this).parent().remove();
    });
</script>