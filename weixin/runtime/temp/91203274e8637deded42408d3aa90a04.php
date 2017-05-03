<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\WWW\weixin\weixin\public/../application/home\view\league\payment.html";i:1492687804;}*/ ?>
<!DOCTYPE html>
<html style="font-size:100px !important" lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>支付</title>
    <link rel="stylesheet" href="../../../../public/css/css1/new.css">
    <script src="../../../../public/js/js1/hm.js"></script>
    <script src="../../../../public/js/js1/adaptive.js"></script>
    <script src="../../../../public/js/js1/jquery-1.js"></script>

</head>
<center>
<body style=" background:#eeeeee">
<div class="apply" style="width:100%;">
    <p class="pic"><img src="../../../../public/images/images1/logo-icon.png" ></p>
    <ul class="neirong">
        <li class="feiyong">费用￥<span>499</span><i></i></li>
        <li class="chengzhang">为你量身定制的2017新年成长计划，戳此下载……</li>
    </ul>
</div>

<div class="weixin">
    <p class="weixinpic"><img src="../../../../public/images/images1/weixin.jpg"></p>
    <ul class="zhifu">
        <li>微信二维码支付</li>
        <li>推荐微信用户使用</li>
    </ul>
    <div class="gouxuan" id="native"><img class="shixin" src="../../../../public/images/images1/gouxuan.jpg"><img class="kongxin hide" src="../../../../public/images/images1/weixuan.jpg"></div>
</div>
<div class="weixin top">
    <p class="weixinpic"><img src="../../../../public/images/images1/zhifu.jpg"></p>
    <ul class="zhifu">
        <li>支付宝支付</li>
        <li>推荐支付宝用户使用</li>
    </ul>
    <div class="gouxuan" id="aipay"><img class="shixin hide" src="../../../../public/images/images1/gouxuan.jpg"><img class="kongxin" src="../../../../public/images/images1/weixuan.jpg"></div>
</div>
<div class="guding" style="margin-top:0.5rem;">确认支付 <i>  ￥<?php echo $course['cost'];?></i></div>

<form class="form-horizontal col-lg-6 col-lg-offset-4" name="alipayment" id="alipayment" method="post" action="">
    <input class="form-control" id="out_trade_no" name="out_trade_no" value="<?php echo $out_trade_no;?>" type="hidden">
    <input class="form-control" id="subject" name="subject" value="<?php echo $category['c_name'];?>" type="hidden">
    <input class="form-control" id="total_fee" name="total_fee" value="<?php echo $course['cost'];?>" type="hidden">
    <input class="form-control" id="show_url" name="show_url" value="http://cdn.img.mtedu.com/xt1/400_400/uploadv2/images/app/6a/f7/05/6af7051a5bca76cf40477194f267175c6587.jpg" type="hidden">
    <input class="form-control" id="return_url" name="return_url" value="http://localhost/notify.php" type="hidden">
    <input class="form-control" id="pay_body" name="pay_body" value="为你量身定制的2017新年成长计划，" type="hidden">
    <input class="form-control" id="name" name="name" value="<?php echo $name;?>" type="hidden">
    <input class="form-control" id="phone" name="phone" value="<?php echo $phone;?>" type="hidden">
</form>



<script>
    $(document).ready(function(e) {
        var paytype = 'native'
        $('.gouxuan').click(function(){
            if($(this).find('.shixin').is(':visible')){
                $(this).find('.shixin').addClass('hide')
                $(this).find('.kongxin').removeClass('hide')
                var shi=$(this).parents('.weixin').siblings().find('.shixin');
                var kong=$(this).parents('.weixin').siblings().find('.kongxin');
                if(kong.is(':visible')){
                    kong.addClass('hide')
                    shi.removeClass('hide')
                }
            }
            else if($(this).find('.kongxin').is(':visible')){
                $(this).find('.kongxin').addClass('hide')
                $(this).find('.shixin').removeClass('hide')
                var shi=$(this).parents('.weixin').siblings().find('.shixin');
                var kong=$(this).parents('.weixin').siblings().find('.kongxin');
                if(shi.is(':visible')){
                    shi.addClass('hide')
                    kong.removeClass('hide')
                }
            }
            if($("#native .shixin").hasClass("hide")){
                paytype = "alipay"
            }else{
                paytype = 'native'
            }
        })

        var wechat = function(){
            var return_url = encodeURIComponent($("#return_url").val());
            $("#show_url").val()
            $.ajax({
                url:'/wechat/api/jsapipay',
                type:'post',
                data:'out_trade_no='+$("#out_trade_no").val()+'&subject='+$("#subject").val()+'&openid='+$("#openid").val()+'&total_fee='+$("#total_fee").val()+'&show_url='+$("#show_url").val()+'&return_url='+return_url+'&pay_body='+$("#pay_body").val()+'&wechatBody='+$("#wechatBody").val(),
                success: function(data){
                    //alert(JSON.stringify(data))
                    //console.log(JSON.stringify(data))
                    //alert(data.apiparams)
                    WeixinJSBridge.invoke(
                            'getBrandWCPayRequest',
                            JSON.parse(data.apiparams),
                            //null,
                            function(res){
                                WeixinJSBridge.log(res.err_msg);
                                switch(res.err_msg){
                                    case "get_brand_wcpay_request:ok":
                                        //window.location.href="/wxpay/success/"+openid;
                                        window.location.href=data.return_url;
                                        break;
                                    case "get_brand_wcpay_request:cancel":
                                        alert("您取消了付款");
                                        $('.guding').show();
                                        break;
                                    case "get_brand_wcpay_request:fail":
                                        alert("支付错误");
                                        break;
                                }
                            }
                    );
                },
                error: function(err){
                    console.log(err)
                }
            })
        }

        $(".guding").click(function(){
            switch(paytype){
                case "native":
                    $('#alipayment').attr('action','nativepay');
                    $('#alipayment').submit();
                    break;
                case "alipay":
                    $('#alipayment').attr('action','alipay');
                    $('#alipayment').submit();
                    break;
                    break;
                case "wapaipay":
                    $('#alipayment').attr('action','alipay');
                    $('#alipayment').submit();
                    break;
                    break;
                case "wechat":
                    wechat();
                    break;
                case "tishi":
                    $('.fucengqu').removeClass('hide')
                    $('.mask').removeClass('hide')
                    break;
            }
        });
    });



    function IsPC()
    {
        var userAgentInfo = navigator.userAgent;
        var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
        var flag = true;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
        }
        return flag;
    }
    if(!IsPC()){
        $(".guding").attr("style","position:fixed");
    }else{
        $(".guding").attr("style","margin-top:0.5rem;");
    }
</script>

</body>
</center>
</html>