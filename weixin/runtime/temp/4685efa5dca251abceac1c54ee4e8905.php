<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/data/wwwroot/default/weixin/public/../application/home/view/login/login.html";i:1493196865;}*/ ?>
<?php
use think\Url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <script src="../../../../public/js/jquery.js"></script>
    <style>
        *{
            padding: 20px;;
            font-size: 100px;
        }
    </style>
</head>
<body>
<center>
    <form action="__URL__/login_pro" method="post">
        <h2>登录</h2>
        <div class="weui-cells__title">

            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input type="text" class="weui-input"  placeholder="请输入手机号" name="account" style="font-size: 40px;"><br>
                </div>
            </div>

            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input type="password" class="weui-input" style="font-size: 40px;"  placeholder="密码，6-16位位数字或之母，区分大小写" name="pwd">
                </div>
            </div>
                <div class="weui-cell">
                    <input class="weui-input" name="code" placeholder="请输入验证码" style="font-size: 40px;width:60%;height:100px;" type="text">
                    <img src="<?php echo captcha_src(); ?>" style="width:40%;height:auto;" alt="captcha" />
                </div>
            <input type="submit" class="weui-btn weui-btn_primary" style="font-size: 35px" value="登录">
            <div style="width: auto;height: 40px;"></div>
            <a href="__URL__/index" style="float: left;font-size: 35px">手机快速注册</a><a href="" style="float: right;font-size: 35px">忘记密码</a>
        </div>

    </form>
</center>
</body>
</html>
