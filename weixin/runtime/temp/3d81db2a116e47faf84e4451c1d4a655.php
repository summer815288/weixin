<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\WWW\weixinss\weixin\public/../application/home\view\consultation\index.html";i:1492512206;}*/ ?>
<!DOCTYPE html>
<html no-auth="true" ng-app="App" ng-controller="articleCtrl" ng-init="getArticleDetail()" class="ng-scope"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style type="text/css">[uib-typeahead-popup].dropdown-menu{display:block;}</style>
    <style type="text/css">.uib-time input{width:50px;}</style>
    <style type="text/css">[uib-tooltip-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-popup].tooltip.right-bottom > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-html-popup].tooltip.right-bottom > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.top-left > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.top-right > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.bottom-left > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.bottom-right > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.left-top > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.left-bottom > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.right-top > .tooltip-arrow,[uib-tooltip-template-popup].tooltip.right-bottom > .tooltip-arrow,[uib-popover-popup].popover.top-left > .arrow,[uib-popover-popup].popover.top-right > .arrow,[uib-popover-popup].popover.bottom-left > .arrow,[uib-popover-popup].popover.bottom-right > .arrow,[uib-popover-popup].popover.left-top > .arrow,[uib-popover-popup].popover.left-bottom > .arrow,[uib-popover-popup].popover.right-top > .arrow,[uib-popover-popup].popover.right-bottom > .arrow,[uib-popover-html-popup].popover.top-left > .arrow,[uib-popover-html-popup].popover.top-right > .arrow,[uib-popover-html-popup].popover.bottom-left > .arrow,[uib-popover-html-popup].popover.bottom-right > .arrow,[uib-popover-html-popup].popover.left-top > .arrow,[uib-popover-html-popup].popover.left-bottom > .arrow,[uib-popover-html-popup].popover.right-top > .arrow,[uib-popover-html-popup].popover.right-bottom > .arrow,[uib-popover-template-popup].popover.top-left > .arrow,[uib-popover-template-popup].popover.top-right > .arrow,[uib-popover-template-popup].popover.bottom-left > .arrow,[uib-popover-template-popup].popover.bottom-right > .arrow,[uib-popover-template-popup].popover.left-top > .arrow,[uib-popover-template-popup].popover.left-bottom > .arrow,[uib-popover-template-popup].popover.right-top > .arrow,[uib-popover-template-popup].popover.right-bottom > .arrow{top:auto;bottom:auto;left:auto;right:auto;margin:0;}[uib-popover-popup].popover,[uib-popover-html-popup].popover,[uib-popover-template-popup].popover{display:block !important;}</style><style type="text/css">.uib-datepicker-popup.dropdown-menu{display:block;float:none;margin:0;}.uib-button-bar{padding:10px 9px 2px;}</style><style type="text/css">.uib-position-measure{display:block !important;visibility:hidden !important;position:absolute !important;top:-9999px !important;left:-9999px !important;}.uib-position-scrollbar-measure{position:absolute !important;top:-9999px !important;width:50px !important;height:50px !important;overflow:scroll !important;}.uib-position-body-scrollbar-measure{overflow:scroll !important;}</style><style type="text/css">.uib-datepicker .uib-title{width:100%;}.uib-day button,.uib-month button,.uib-year button{min-width:100%;}.uib-left,.uib-right{width:100%}</style><style type="text/css">.ng-animate.item:not(.left):not(.right){-webkit-transition:0s ease-in-out left;transition:0s ease-in-out left}</style><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style><meta charset="utf-8"><meta name="renderer" content="webkit"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black"><meta name="format-detection" content="telephone=no"><meta http-equiv="Expires" content="-1"><meta http-equiv="Cache-Control" content="no-cache"><meta http-equiv="Pragma" content="no-cache"><title ng-bind-html="dataModel.name" class="ng-binding"></title>    <link rel="stylesheet" href="article_files/lib.css">
    <link rel="stylesheet" href="../../../../public/css/all_c4654a5.css">
    <link rel="stylesheet" href="../../../../public/css/ui2.css">
    <script src="../../../../public/jquery.js"></script>
    <script src="../../../../public/js/landing-min.js"></script>
    <style>@-webkit-keyframes fadeInili {
               from { opacity: 0; visibility: visible; }
               to { opacity: 1; }
           }

    @keyframes fadeIn {
        from { opacity: 0; visibility: visible; }
        to { opacity: 1; }
    }

    .fadeIn { -webkit-animation-name: fadeIn; animation-name: fadeIn; }

    @-webkit-keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; visibility: hidden; }
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; visibility: hidden; }
    }

    .fadeOut { -webkit-animation-name: fadeOut; animation-name: fadeOut; }
    .tel-box { position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: -1; opacity: 0; padding-top: 50px; background: rgba(0, 0, 0,.85); height: 100% ;}
    .tel-box.in { z-index: 5; }
    .form-horizontal label { color: #fff; }
    .errlist { color: #ff0000; }
    .form-table{width:100%;table-layout:fixed;margin-top:15px;}
    .form-table td{padding:6px;}
    .form-table tr td:first-child{text-align:right;color:#fff;}</style>
</head>
<center>
<body class="article">
<div class="article-detail">
    <div class="container-fluid scroll_wrap">
        <div class="row">
            <div class="col-xs-12 article-content ng-binding" ng-bind-html="dataModel.content |trustHtml" style="padding-left: 0;padding-right: 0;padding-top: 0;margin-bottom: 0px">
                <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
                <p><img src="../../../../public/<?php echo $v['img']; ?>" style="width:100%;height:auto;" ></p>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <p style="display:block;height:65px;">&nbsp;</p>
            </div>
        </div>
    </div>
    <footer style="height:50px;position:fixed;left:0;right:0;bottom:0">
        <p>   <a role="button" style="color:#fff;  background-color: #44c08c; color: #fff; display:block; width:100%; margin:20px auto; font-size:16px; font-weight:bold; letter-spacing:3px; height:35px; line-height:35px; text-align:center;" data-category="UserAccount" data-action="login" data-toggle="modal" href="#signup-modal">立即咨询</a>
        </p>
    </footer>

    <!-- 咨询开始-->
    <div class="modal in" id="signup-modal" >
        <a class="close" data-dismiss="modal">×</a>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2846417481&site=qq&menu=yes">
            <img border="0" src="http://wpa.qq.com/pa?p=2:2846417481:51" alt="QQ客服" title="QQ客服"/></a>
        <p style="color:#000000"> 电话400-998-7191</p>
        <p style="color:#000000">也可留下联系信息</p>
        <p style="color:#000000"> 我们的课程顾问将第一时间回复您</p>
        <form class="signup-form clearfix" method="post" action="http://www.xwcms.net">
            <p class="error"></p>
            <input id="name" class="mingzitext" placeholder="你想让我们怎么称呼你？" type="text">
            <input id="mobile" maxlength="11" class="mingzitext" placeholder="请准确填写手机号" type="text">
            <input id="company" class="mingzitext" placeholder="请输入您的公司名称" type="text">
            <textarea id="openid" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" placeholder="输入详细需求" name="content" maxlength="500" ng-model="dataForm.content"></textarea>
            <br>
           <span class="sp" style="color: red"></span>
            <div class="clearfix"></div>
            <input type="button" name="type" class="button-blue reg" onclick="checkForm();" value="提交" data-category="UserAccount" data-action="regist">

        </form>
    </div>
    <!-- 咨询结束-->
    <div id="toast-container" ng-class="[config.position, config.animation]" toaster-options="toasterOptions" class="toast-center"><!-- ngRepeat: toaster in toasters --></div>

</div>
<script src="/wenjian/shiyi/weixin/public/click.js"></script>
<script src="/wenjian/shiyi/weixin/public/log.js"></script>
<script>
    function checkForm(){

        var mobile=$.trim($("#mobile").val());
        var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
        var isMob=/^((\+?86)|(\(\+86\)))?(13[012356789][0-9]{8}|15[012356789][0-9]{8}|18[02356789][0-9]{8}|147[0-9]{8}|1349[0-9]{7})$/;
        if(!isMob.test(mobile)&&!isPhone.test(mobile))
        {
            alert("手机号码格式不正确");
            $("#mobile").focus();
            return false;
        }

        var name=$.trim($("#name").val());
        if(name ==null || name=="" || name==undefined){
            alert("姓名不能为空");
            $("#name").focus();
            return false;
        }

        var company=$.trim($("#company").val());
        if(company==null || company=="" || company==undefined){
            alert("公司不能为空");
            $("#company").focus();
            return false;
        }
        var openid=$("#openid").val();
        if(openid ==null || openid=="" || openid==undefined){
            alert("需求不能为空");
            $("#name").focus();
            return false;
        }
        $.ajax({
            url:"<?php echo url('Consultation/con_add'); ?>",
            data:{
                name:name,//姓名
                mobile:mobile,//电话
                openid:openid,//需求
                company:company//公司

            },
            type:'post',
            success:function(response){
                if(response==1)
                {
                    alert("不能重复提交");
                    $(".sp").html("");

                }
                if(response==2)
                {
                    $(".sp").html("我们会及时与您联系，请耐心等待");
                }


            }
        })
    }
</script>
</body>

</center>
</html>