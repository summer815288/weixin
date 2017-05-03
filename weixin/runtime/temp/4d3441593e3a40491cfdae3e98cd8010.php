<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpStudy\WWW\weixin\weixin\public/../application/home\view\league\show.html";i:1492687354;}*/ ?>
<!DOCTYPE html>
<html style="font-size:100px !important" lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>馒头商学院-365成长联盟</title>
    <link rel="stylesheet" href="../../../../public/css/new.css">
    <script src="../../../../public/js/hm.js"></script><script src="../../../../public/js/adaptive.js"></script>
    <script src="../../../../public/js/jquery-2.js"></script>
    <style>
        .tupian img{
            width: 8.0rem !important;
        }

    </style>
    <script src="../../../../public/js/jweixin-1.js"></script><script>
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: '', // 必填，公众号的唯一标识
        timestamp: '', // 必填，生成签名的时间戳
        nonceStr: '', // 必填，生成签名的随机串
        signature: '', // 必填，签名，见附录1
        jsApiList: [
            "onMenuShareTimeline",
            "onMenuShareAppMessage",
            "onMenuShareQQ",
            "onMenuShareWeibo",
            "startRecord",
            "stopRecord",
            "onVoiceRecordEnd",
            "playVoice",
            "pauseVoice",
            "stopVoice",
            "onVoicePlayEnd",
            "uploadVoice",
            "downloadVoice",
            "chooseImage",
            "previewImage",
            "uploadImage",
            "downloadImage",
            "translateVoice",
            "getNetworkType",
            "openLocation",
            "getLocation",
            "hideOptionMenu",
            "showOptionMenu",
            "hideMenuItems",
            "showMenuItems",
            "hideAllNonBaseMenuItem",
            "showAllNonBaseMenuItem",
            "closeWindow",
            "scanQRCode",
            "chooseWXPay",
            "openProductSpecificView",
            "addCard",
            "chooseCard",
            "openCard", ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
</script></head>


<body style=" background:#ffffff">

<!--<div class="manalliance">
   <div class="alliance">
       <div  class="lianmeng">为你量身定制的2017新年成长计划，戳此下载……</div>
       <div class="riqi"><span>1970-01-01</span><span onclick="windiw.location.href='http://www.mtedu.com'">馒头商学院</span></div>
   </div>
</div>-->
<div class="tupian">
    <p><img src="../../../..//public/<?php echo $course['img'];?>"  style=""></p><p><br></p>        </div>
<!--
<div class="wenzi">
<ul class="text1">
  <li>2016年5月8日，馒头商学院创建两周年</li>
  <li>如果有人问，在这两年中，馒头最重要的产品是什么？</li>
  <li>我会告诉他，我们最重要的产品，就是你们</li>
  <li>每一个在馒头学习后有所收获和成长的你们</li>
</ul>
</div>-->
<input id="openid" value="" type="hidden">

<div class="zhezhao" style="position: relative;border-top:1px solid #e1e1e1;">
    <div class="xinxi" style="width:6.9rem;padding-left:0!important;">请输入您的报名信息
    </div>
    <div class="shurukuang">
        <span class="mingzi">姓名<i>*</i></span><input id="name" class="mingzitext" placeholder="你想让我们怎么称呼你？" type="text">
    </div>
    <div class="shurukuang">
        <span class="mingzi">手机<i>*</i></span><input id="mobile" name="mobile" maxlength="11" class="mingzitext" placeholder="手机号是您的登录账号，请准确填写" type="text">
    </div>
    <div class="shurukuang">
        <span class="mingzi">微信号<i>*</i></span><input id="wechat" class="mingzitext" placeholder="请输入您的微信号码" type="text">
    </div>
    <div class="shurukuang">
        <span class="mingzi">公司<i>*</i></span><input id="company" class="mingzitext" placeholder="请输入您的公司名称" type="text">
    </div>
    <div >
        <input id="c_id"  value="<?php echo $course['c_id'];?>" type="hidden">
    </div>
    <div class="shurukuang">
        <span class="mingzi">职位<i>*</i></span><input id="jobtitle" class="mingzitext" placeholder="请输入你的职位" type="text">
        <!--      <span class="mingzi">职位<i>*</i></span><select class="mingzitext1" >
                   <option value="" style="display:none;">请选择您的职位</option>
                   <option value="1">新增图片</option>
                   <option value="2">维护图片</option>
                   <option value="3">新增新闻</option>
              </select>-->
    </div>
    <div class="shurukuang">
        <span class="mingzi">城市<i>*</i></span>
        <select class="mingzitext1" style="width:2.7rem;" id="first_city">
            <option class="huise" value="0" style="display:none;">请选择</option>
            <option value="110000" selected="selected">北京市</option>
            <option value="120000">天津市</option>
            <option value="130000">河北省</option>
            <option value="140000">山西省</option>
            <option value="150000">内蒙古自治区</option>
            <option value="210000">辽宁省</option>
            <option value="220000">吉林省</option>
            <option value="230000">黑龙江省</option>
            <option value="310000">上海市</option>
            <option value="320000">江苏省</option>
            <option value="330000">浙江省</option>
            <option value="340000">安徽省</option>
            <option value="350000">福建省</option>
            <option value="360000">江西省</option>
            <option value="370000">山东省</option>
            <option value="410000">河南省</option>
            <option value="420000">湖北省</option>
            <option value="430000">湖南省</option>
            <option value="440000">广东省</option>
            <option value="450000">广西壮族自治区</option>
            <option value="460000">海南省</option>
            <option value="500000">重庆市</option>
            <option value="510000">四川省</option>
            <option value="520000">贵州省</option>
            <option value="530000">云南省</option>
            <option value="540000">西藏自治区</option>
            <option value="610000">陕西省</option>
            <option value="620000">甘肃省</option>
            <option value="630000">青海省</option>
            <option value="640000">宁夏回族自治区</option>
            <option value="650000">新疆维吾尔自治区</option>
            <option value="990000">新疆建设兵团</option>
        </select>
        <select class="mingzitext1" style="width:2.7rem;" id="second_city"><option value="110100" selected="selected">东城区</option><option value="110200">西城区</option><option value="110500">朝阳区</option><option value="110600">丰台区</option><option value="110700">石景山区</option><option value="110800">海淀区</option><option value="110900">门头沟区</option><option value="111100">房山区</option><option value="111200">通州区</option><option value="111300">顺义区</option><option value="111400">昌平区</option><option value="111500">大兴区</option><option value="111600">怀柔区</option><option value="111700">平谷区</option><option value="112800">密云县</option><option value="112900">延庆县</option></select>
    </div>
    <div class="shurukuang moren"><i>*</i><span>提交即默认同意相关</span><span id="tiaokuan">服务条款</span></div>
    <div class="alert"></div>
    <div class="jige">
        <div class="juji"></div>

        <div class="qianggou" onclick="checkForm();" actionid="110"><div class="jiage"><i></i><i class="yanse">￥</i><i class="shiji"><?php echo $course['cost'];?></i><i class="nian">元/节</i></div> <div actionid="110" class="gou">立即购买</div></div>

    </div>
</div>
<!--<div class="tijiao" style="position: fixed;bottom:0;width:7.5rem;" onclick="checkForm();">购买</div>-->
<div id="tiaokuanct" style="background: rgba(83,83,83,.2);
                 position: fixed;
                 z-index: 200;
                 width: 100%;
                 min-height: 100%;
                 left: 0;
                 top: 0; display: none;">
    <div style="width: 7.5rem;
                     background: rgba(83,83,83,0);
                     position: fixed;
                     bottom: 3rem;
                     z-index: 101;
                     left: 50%;
                     margin-left: -3.75rem;
                     padding-left: 10px;
                     padding-right: 10px;
                     padding-top: 15px;">
        <div style="    padding-left: 5px;
                         padding-right: 5px;
                         background-color: #FFFFFF;
                         border-radius: 9px;
                         padding-bottom: 5px;
                         padding-top: 5px;">
            <div style="padding-bottom:5px;text-align:left;padding-left: 5px;">
                馒头商学院发布的课程（包括视频、音频、文字资料）仅限学员个人学习使用，任何人不得以复制、摘录等形式就课程内容对外传播。否则，馒头商学院将依法维护自己的权益。
            </div>

            <div id="tiaokuanex" style="border-top: 1px solid;
                             height: .7rem;
                             text-align: center;
                             line-height: .7rem;
                             ">关闭
            </div>
        </div>
    </div>
</div>
<div class="maskd hide"></div>
<!--
<div class="gouwuche hide"style="">
    <div class="ghead" style="">输入老学员手机号享受优惠 <span class="guanbi" style="">关闭</span></div>
    <div class="gprice_div">价格&nbsp;<span class="gprice">499</span><span class="youhui hide" style="">已优惠<i class="youhuijine">50</i>元</span></div>
    <div class="yanzheng"><input class="yzinput" style="" placeholder="输入手机号查看老学员专享价"><div class="queren">点此验证</div></div>
    <div class="yzsuccess hide">你已通过验证，可享受老学员价</div>
    <div actionid="110" class="tijiao" onclick="submitForm()" style="position: static;">提交</div>
</div>-->

<script>

    var waresId = "12";
    $('.gou').click(function() {
        $(".mask").removeClass("hide");
        $('.zhezhao ').removeClass('hide');
    });
    $(".close").click(function(){
        $(".mask").addClass("hide");
        $('.zhezhao ').addClass('hide');
    })
    var from = "caidan1";
    var city = '0';
    //if(strstr($wareinfo["smallCover"],"http")){ echo $wareinfo["smallCover"];}else{echo BASE_URL.$wareinfo["smallCover"];
    var imgUrl='http://cdn.img.mtedu.com/xt1/400_400/uploadv2/images/app/6a/f7/05/6af7051a5bca76cf40477194f267175c6587.jpg';
    var title='为你量身定制的2017新年成长计划，戳此下载……';
    var url="http://member2.mtedu.com/sell/article/"+waresId+"/"+"?f="+from;
    var outline='新年，送给自己最好的礼物就是学习。';
    wx.ready(function() {
        wx.onMenuShareAppMessage({
            title: title, // 分享标题
            desc: outline, // 分享描述
            link: url, // 分享链接
            imgUrl: imgUrl, // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareTimeline({
            title: title, // 分享标题
            link: url, // 分享链接
            imgUrl: imgUrl, // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });
    $(document).ready(function(e) {
        if(from=="erweima"){
            $('.mask').removeClass('hide');
            $('.zhezhao ').removeClass('hide');
        }
        function cutStr(obj) {
            for (var i = 0, len = obj.length; i < len; i++) {
                var text = obj[i].innerHTML;
                var newText = text.substring(0, 46);
                var n = obj[i].innerHTML.length;
                if (n > 46) {
                    obj[i].innerHTML = newText + '...';
                }
            }
        }
        cutStr($('.lianmeng'));
    });
    $("#tiaokuan").click(function() {
        $("#tiaokuanct").show();
    });
    $("#tiaokuanex").click(function() {
        $("#tiaokuanct").hide();
    });
    $.ajax({
        url:'actionlog',
        data:{
            url:window.location.href,
            type:1,
            from:from
        },
        dataType:'json',
        type:'post',
        sync:true,
        success:function(){

        },
        error:function(){

        }
    });
    //立即购买
    $(".qianggou").click(function(){
        //名称
       var  name=$("#name").val();
        //手机号
        var mobile=$("#mobile").val();
        var reg=/^1[3,5,8,7]\d{9}$/;
        if (reg.test(mobile)) {
            var mobile=$("#mobile").val();
        }else{
           alert('手机格式不对');
        }

        //微信号
       var wechat=$("#wechat").val();
        //公司
        var company=$("#company").val();
        //职位
        var jobtitle=$("#jobtitle").val();

        var huise=$(".mingzitext1").val();
        var city=$("#second_city").val();
        //拼接住址
         var address=huise+city;
        //课程id
        var c_id=$("#c_id").val();
        $.ajax({
            url:'actionlog',
            data:{
                name:name,
                mobile:mobile,
                wechat:wechat,
                company:company,
                jobtitle:jobtitle,
                address:address,
                c_id:c_id
            },
            type:'post',
            success:function(msg){
                if(msg==0){
                    alert('添加成功');
                    location.href="__URL__/payment"
                }else{
                    alert('添加失败');
                }
            }
        });
    });
</script>
<script src="../../../../public/js/index.js"></script>
<script src="../../../../public/js/sell_info_new.js"></script>
<script type="text/javascript">
    var _maq = _maq || [];
    _maq.push(['_setAccount', 'member_sell']);
</script>
<script type="text/javascript" src="../../../../public/js/click.js"></script>
<script type="text/javascript" src="../../../../public/js/log.js"></script>

</body>
</html>