<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/data/wwwroot/default/weixin/public/../application/home/view/league/show.html";i:1493728119;}*/ ?>
<!DOCTYPE html>
<html style="font-size:100px !important" lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title></title>
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
<div class="tupian">
    <p><img src="../../../..//public/<?php echo $course['img'];?>"  style=""></p>
    <p><br></p>
</div>
<input id="openid" value="" type="hidden">
<div class="zhezhao" style="position: relative;border-top:1px solid #e1e1e1;">
    <div class="xinxi" style="width:6.9rem;padding-left:0!important;">请输入您的报名信息
    </div>
    <div class="shurukuang">
        <span class="mingzi">姓名<i>*</i></span><input id="name" class="mingzitext" placeholder="你想让我们怎么称呼你？"  onblur="checkUname()" type="text">
    </div><p class="unameP" style="margin-left: 1em;color:red;"></p>
    <div class="shurukuang">
        <span class="mingzi">手机<i>*</i></span><input id="mobile" name="mobile" maxlength="11" class="mingzitext" placeholder="手机号是您的登录账号，请准确填写" onblur="checkPhone()"  type="text">
    </div><p class="phone" style="margin-left: 1em;color:red;"></p>
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
    </div>
    <div class="shurukuang">
        <span class="mingzi">城市<i>*</i></span>
        <select class="mingzitext1" style="width:2.7rem;" id="first_city" >
            <?php foreach($pro as $k=>$v){ ?>
            <option value="<?= $v['region_id'] ?>"><?= $v['region_name'] ?></option>
            <?php }?>
        </select>
        <select class="mingzitext1" style="width:2.7rem;" id="second_city">
                <?php foreach($city as $kk=>$vv){ ?>
                <option value="<?= $vv['region_id'] ?>"><?= $vv['region_name'] ?></option>
                <?php }?>
        </select>
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
                U范商学院发布的课程（包括视频、音频、文字资料）仅限学员个人学习使用，任何人不得以复制、摘录等形式就课程内容对外传播。否则，馒头商学院将依法维护自己的权益。
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
    /*当鼠标放在通行证用户名文本框时，提示文本及样式*/    
  function checkUname(){
     var userNameId=$("#name").val();  
     if(userNameId == ""){
        $(".unameP").html("姓名不能为空");
        return false;
     }else{
        $(".unameP").html("");
     }
    
    }
    /*当鼠标放在密码文本框时，提示文本及样式*/    
   function checkPhone(){
    var mobile=$("#mobile").val();

     var reg=/^1[3,5,8,7]\d{9}$/;
        if (reg.test(mobile)) {
            $(".phone").html("");
        }else{
         $(".phone").html("手机号码为空或不正确");
          return false;
        }
    }
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
<script type="text/javascript" src="../../../../public/js/jquery.js"></script>
<script>

    $(document).on('change','.mingzitext1',function(){
     var id=$(this).val();
        var str="";
    $.ajax({
        type:'get',
        data:{id:id},
        url:'__URL__/region',
        dataType:'json',
        success:function(msg){
            $.each(msg,function(k,v){
                str +='<option value="'+v['region_id']+'">'+v['region_name']+'</option>';
            })
            $('#second_city').html(str);
        }
    })




})


</script>
</body>
</html>