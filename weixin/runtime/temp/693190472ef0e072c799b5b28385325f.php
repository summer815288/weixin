<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/data/wwwroot/default/weixin/public/../application/admin/view/index/main.html";i:1493696764;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台欢迎页</title>
    <link rel="stylesheet" href="../../../../public/admin/css/reset.css" />
    <link rel="stylesheet" href="../../../../public/admin/css/content.css" />
</head>
<body marginwidth="0" marginheight="0">
<div class="container">
    <div class="public-nav">您当前的位置：<a href="">管理首页</a>></div>
    <div class="public-content">
        <div class="public-content-header">
            <h3>网站后台</h3>
        </div>
        <div class="public-content-cont">
            <p style="width: 100%;text-align: center; padding: 50px 0; font-size: 16px; color: #FF0000;"><?php if(($uname == '')): ?> 请先登录<?php else: ?><font color="red"><?php echo $uname; ?></font><?php endif; ?>管理员！ 欢迎登陆网站后台！</p>
        </div>
    </div>
</div>
</body>
</html>