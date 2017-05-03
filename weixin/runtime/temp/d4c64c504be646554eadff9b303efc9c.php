<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/data/wwwroot/default/weixin/public/../application/home/view/index/majors.html";i:1492678912;s:78:"/data/wwwroot/default/weixin/public/../application/home/view/index/footer.html";i:1492765103;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>进行课程的展示</title>
</head>
<style>
    *{
        font-size: 40px;
    }
    .headers{
        width:100%;height:100px;background: green;color:white;padding-top: 20px;
    }

</style>
<body>
<center>
    <div class="headers">全部课程</div>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a href="__URL__/detail?id=<?php echo $vo['id']; ?>" class="detail" id="<?php echo $vo['id']; ?>" style=" text-decoration: none;color:black;">
        <table style="margin-top: 10px;">
            <tr>
                <td><img src="../../../../public/img/<?php echo $vo['img']; ?>" style="width:auto;height:250px;"></td>
                <td>
                    <table style="margin-left: 10px;">
                        <tr><td ><?php echo $vo['title']; ?></td></tr>
                        <tr><td style="font-size: 30px"><?php echo $vo['desc']; ?></td></tr>
                        <tr><td style="color:green;font-size: 30px" ><?php echo $vo['man']; ?>&nbsp;&nbsp;&nbsp;<?php echo $vo['man_desc']; ?></td></tr>
                    </table>
                </td>
            </tr>
        </table>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>

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
            <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item weui-bar__item_on" style="text-decoration: none;font-size: 50px;" >
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