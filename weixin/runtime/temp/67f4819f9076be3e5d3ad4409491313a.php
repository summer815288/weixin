<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpStudy\WWW\weixin\weixin\public/../application/home\view\personal\myorder.html";i:1492684432;}*/ ?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>我的订单</title>
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
    <meta name="apple-mobile-web-app-title" content="我的订单" />
    <meta name="msapplication-TileColor" content="#090a0a">
    <link rel="stylesheet" href="../../../../public/css/css_style.css">
    <script type="text/javascript" src="../../../../public/js/zepto.min.js"></script>
</head>
<body class="grayBy">
<?php if(is_array($order) || $order instanceof \think\Collection || $order instanceof \think\Paginator): if( count($order)==0 ) : echo "" ;else: foreach($order as $key=>$v): ?>
<div class="order_box">
    <div class="order_header">
        <h2>手机号: <?php echo $v['phone']; ?></h2>
        <span class="up_icon"></span>
    </div>
    <ul class="order_list">
        <li>
            <a href="#">
                <i class="pic"><img src="http://cdn.img.mtedu.com/xt1/400_400/uploadv2/images/app/6a/f7/05/6af7051a5bca76cf40477194f267175c6587.jpg" /></i>
                <h2>名称:<?php echo $v['name']; ?> </h2>
                <h2>订单号:<?php echo $v['out_trade_no']; ?> </h2>
                <h2>数量:<?php echo $v['num']; ?></h2>
                <h3>时间:<?php echo $v['time']; ?></h3>
                <b>价格:¥ <?php echo $v['total_fee']; ?></b>
            </a>
        </li>
    </ul>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>
<script type="text/javascript">
    $(".order_box").click(function () {
        $(this).find(".order_list").toggle();
    });
</script>