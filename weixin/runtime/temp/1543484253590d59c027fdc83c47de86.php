<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\WWW\weixinss\weixin\public/../application/admin\view\index\index.html";i:1492691254;}*/ ?>
 <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="../../../../public/admin/css/reset.css" />
        <link rel="stylesheet" href="../../../../public/admin/css/public.css" />
    </head>
<body>
<div class="public-header-warrp">
    <div class="public-header">
        <div class="content">
            <div class="public-header-logo"><a href=""><i>LOGO</i><h3>有范商学院</h3></a></div>
            <div class="public-header-admin fr">
                <p class="admin-name">****管理员 您好！</p>
                <div class="public-header-fun fr">
                    <a href="" class="public-header-man">管理</a>
                    <a href="" class="public-header-loginout">安全退出</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- 内容展示 -->
<div class="public-ifame mt20">
    <div class="content">
        <!-- 左侧导航栏 -->
        <div class="public-ifame-leftnav">
            <div class="public-title-warrp">
                <div class="public-ifame-title ">
                    <a href="">首页</a>
                </div>
            </div>
            <ul class="left-nav-list">
                <li class="public-ifame-item">
                    <a href="javascript:;">系统管理</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li class="active"><a href="javascript;" target="content">微信管理</a></li>

                        </ul>
                    </div>
                </li>
                <li class="public-ifame-item">
                    <a href="javascript:;">有范商学院</a>
                    <div class="ifame-item-sub">
                        <ul>

                            <li><a href="product_add.html" target="content">添加课程</a></li>
                            <li><a href="type.html" target="content">分类管理</a></li>
                            <li><a href="all.html" target="content">列表管理</a></li>

                        </ul>
                    </div>
                </li>
                <li class="public-ifame-item">
                    <a href="javascript:;">客服平台</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li><a href="<?php echo url('Consultation/img_add'); ?>" target="content">添加海报</a></li>
                            <li><a href="<?php echo url('Consultation/look'); ?>" target="content">海报管理</a></li>
                            <li><a href="<?php echo url('Consultation/problem'); ?>" target="content">咨询管理</a></li>
                        </ul>
                    </div>
                </li>
                <li class="public-ifame-item">
                    <a href="javascript:;">付费课程</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li><a href="<?php echo url('category/add'); ?>" target="content">添加课程</a></li>
                            <li><a href="<?php echo url('category/show'); ?>" target="content">列表管理</a></li>
                            <li><a href="<?php echo url('photo/upload'); ?>" target="content">添加分类</a></li>
                            <li><a href="<?php echo url('photo/show'); ?>" target="content">分类管理</a></li>
                        </ul>
                    </div>
                </li>
                <li class="public-ifame-item">
                    <a href="javascript:;">有范热文</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li><a href="<?php echo url('Het/index'); ?>" target="content">热文展示</a></li>
                            <li><a href="<?php echo url('Het/add'); ?>" target="content">添加热文</a></li>
                            <li><a href="<?php echo url('Het/lei'); ?>" target="content">分类展示</a></li>
                            <li><a href="<?php echo url('Het/class_add'); ?>" target="content">添加分类</a></li>

                        </ul>
                    </div>
                </li>

                <li class="public-ifame-item">
                    <a href="javascript:;">直播管理</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li><a href="<?php echo url('video/video_list'); ?>" target="content">展示直播</a></li>
                            <li><a href="<?php echo url('video/index'); ?>" target="content">添加</a></li>
                        </ul>
                    </div>
                </li>
                <li class="public-ifame-item">
                    <a href="javascript:;">管理员管理</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li><a href="<?php echo url('rbac/role_list'); ?>" target="content">角色列表</a>|<a href="<?php echo url('rbac/role'); ?>" target="content">添加</a></li>
                            <li><a href="<?php echo url('rbac/user_list'); ?>" target="content">管理员列表</a>|<a href="<?php echo url('rbac/user'); ?>" target="content">添加</a></li>
                            <li><a href="<?php echo url('rbac/nodeList'); ?>" target="content">权限列表</a>|<a href="<?php echo url('rbac/node_add'); ?>" target="content">添加</a></li>
                        </ul>
                    </div>
                </li>
                <li class="public-ifame-item">
                    <a href="javascript:;">数据库管理</a>
                    <div class="ifame-item-sub">
                        <ul>
                            <li><a href="<?php echo url('rbac/role_list'); ?>" target="content">数据库导出</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- 右侧内容展示部分 -->
        <div class="public-ifame-content">
            <iframe name="content"  src="./main.html"  frameborder="0" id="mainframe" scrolling="yes" marginheight="0" marginwidth="0" width="100%" style="height: 700px;"></iframe>
        </div>
    </div>
</div>
<script src="../../../../public/js/jquery.js"></script>
<script>
    $().ready(function(){
        var item = $(".public-ifame-item");

        for(var i=0; i < item.length; i++){
            $(item[i]).on('click',function(){
                $(".ifame-item-sub").hide();
                if($(this.lastElementChild).css('display') == 'block'){
                    $(this.lastElementChild).hide()
                    $(".ifame-item-sub li").removeClass("active");
                }else{
                    $(this.lastElementChild).show();
                    $(".ifame-item-sub li").on('click',function(){
                        $(".ifame-item-sub li").removeClass("active");
                        $(this).addClass("active");
                    });
                }
            });
        }
    });
</script>
</body>
</html>