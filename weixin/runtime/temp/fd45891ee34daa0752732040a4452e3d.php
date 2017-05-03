<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\weixin\tp\weixin\public/../application/home\view\index\index.html";i:1492560837;s:69:"D:\weixin\tp\weixin\public/../application/home\view\index\footer.html";i:1492560837;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城主页</title>
    <style>
        *{
            font-size: 50px;
        }
        a{
            text-decoration: none;font-size: 50px;
        }
        input{
            width:auto;
            height:50px;
        }
        .type button{
            border-radius: 100px  ;width:80px;height:80px;background: white;margin:5%;cursor: pointer;
        }
        tr td{
            color:dimgrey;font-size: 40px;
        }
        .log img{
            width:50px;height:50px;margin-left: 30px;
        }
    </style>
    <script src="../../../../public/js/jquery.js"></script>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
</head>
<body>
<center>
    <!--轮播图-->
    <div>
        <?php if(is_array($data['list']) || $data['list'] instanceof \think\Collection || $data['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <img src="../../../../public/img/<?php echo $vo['img']; ?>" class="imgs" style="width:100%;height:auto;" alt="轮播图图片">
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--轮播图-->
    <div class="type">
        <a href="#"><button style="color:blue;">产</button></a>
        <a href="#"><button style="color:orangered;">运</button></a>
        <a href="#"><button style="color:red;">营</button></a>
         <a href="#"><button style="color:green;">文</button></a>
    </div>

    <!--馒头精选-->
    <!--标题-->
    <div  style="background:white;width:100%;line-height:40px;;height:40px;">
       <div style="float: left;">※馒头精选</div>
    <div style="float:right;"><a href="__URL__/major" style="color:gray;font-size: 40px;">更多></a></div>
    </div>
<br>
    <!--内容列表-->
    <?php if(is_array($data['list']) || $data['list'] instanceof \think\Collection || $data['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a href="__URL__/detail?id=<?php echo $vo['id']; ?>" class="detail" id="<?php echo $vo['id']; ?>">
    <table style="border-top: 2px white solid;margin: 20px;">
        <tr >
            <td colspan="2" ><img src="../../../../public/img/<?php echo $vo['img']; ?>"  style="width:100%;height:auto;margin-bottom: 20px;" ></td>
        </tr>
        <tr>
            <td colspan="2" ><?php echo $vo['title']; ?></td>
        </tr>
        <tr>
            <td style="float:left;width:30%;font-size: 35px;">分类：<?php echo $vo['tname']; ?></td>
            <td style="float:right;width:45%" class="log">
                <img src="../../../../public/img/man.png"  alt=""><span><?php echo $vo['look']; ?></span>
                <img src="../../../../public/img/hua.png"  alt=""><span><?php echo $vo['zan']; ?></span>
                <img src="../../../../public/img/xiao.png"  alt=""><span><?php echo $vo['comment']; ?></span>
            </td>
        </tr>
    </table>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <!--馒头精选-->
    <!--查看更多往期课程-->
    <div style="width:100%;height:350px;background: #f7f7fa;">
        <a href="__URL__/major"><button style="width:600px;height:100px;margin-top:50px;color:#09bb07;border:1px #09bb07 solid;border-radius:50px;background: #f7f7fa;">查看更多往期课程</button></a>
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
<center>

</center>
</body>
</html>
<script>
    //轮播图
    $(document).ready(function(){
        var num=0;
        var obj=$('.imgs');
        obj.eq(num).show().siblings().hide();
        setInterval(function(){

            if(num<obj.length-1){
                num=parseInt(num)+parseInt(1);
            }else{
                num=0;
            }
            obj.eq(num).show().siblings().hide();

        },2000);
    })
    //下标的点击
    $('.weui-tabbar a').hover(function(){
        $(this).addClass('weui-bar__item_on').siblings().removeClass('weui-bar__item_on');
    },function(){
        $(this).addClass('weui-bar__item_on').siblings().removeClass('weui-bar__item_on');
    })
</script>