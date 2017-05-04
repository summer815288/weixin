<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"H:\web\wifi\php_1\weixing\weixin\public/../application/home\view\index\detail.html";i:1493817966;s:82:"H:\web\wifi\php_1\weixing\weixin\public/../application/home\view\index\footer.html";i:1493785476;}*/ ?>
<?php
use \think\Request;
use \think\Session;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <style>
        *{
            font-size: 50px;;
        }

        .cho div{
            width:50%;
            height:80px;
            display: inline;
            border-bottom: 5px lightgrey solid;
            margin-top: 30px;;
            font-size: 50px;
        }
        .cho .selected{
            width:50%;
            height:80px;
            display: inline;
            border-bottom: 5px green solid;
            color:green;
            font-size: 50px;

        }
        .choo ul li{
            text-decoration: none;
            text-align:left;
            line-height:80px;
            font-size: 40px;
        }
        .choo{
            padding:10px;
        }
        .article{
            font-size: 35px;color:grey;line-height:25px;text-indent:2em;
        }
        a{
            text-decoration: none;
        }
        #inputText{
            height:80px;line-height: 80px;font-size: 50px;
        }

        /*弹幕样式*/
        .danmu-player{
            width:100%;
            height:800px;
            font-size: 14px;
        }
        .danmup{
            width:100%;
            height:800px;
            font-size: 14px;
        }
        .demo{
            width:100%;
            height:800px;
            font-size: 14px;
        }
        .ctrl-main{
            font-size: 14px;
            width:100%;
            height:400px;
        }
        .send-btn{
            font-size: 20px;
        }
        /*ctrl-btn-right ctrl-btn-right-active*/
        .show-danmu span{
            font-size: 20px;
        }
        .show-danmu{
            width:300px;
        }
        .ctrl-btn-right{
            font-size: 20px;
        }

        .ctrl-btn-right span{
            font-size: 20px;
            width:300px;
        }


    </style>
    <script src="../../../../public/js/jquery.js"></script>
    <link rel="stylesheet" href="../../../../public/lunbo/css/main.css">
</head>
<body>
<center>
    <?php if(($arr['uid'] =='')): ?>
    <div style="position:absolute;top:0px;left:0px;width:100%;height:550px;z-index:1;background: black;"  id="tans" style="font-size: 50px;">
        <div style="top:150px;position:absolute;left:30%;width:500px;height:100px;color:white;font-size:40px;">登录之后才可以观看的呦</div>
        <button style="top:250px;position:absolute;left:15%;width:300px;height:100px;background:dimgrey;color:white;" class="agains">试看5秒钟</button>
        <button style="top:250px;position:absolute;right:15%;width:300px;height:100px;background:red;color:white;" ><a href="__ROOT__/index.php/home/login/login" style="color:white;">登录</a></button>
    </div>
    <video src="../../../../public/video/<?php echo $arr['video']; ?>" controls   style="width:100%;height:550px;" id="myVideo" ></video>

    <?php else: ?>
    <input type="hidden" value="../../../../public/video/<?php echo $arr['video']; ?>" class="video">
    <!--<video src="../../../../public/video/<?php echo $arr['video']; ?>" controls   style="width:100%;height:550px;"  ></video>-->

    <div id="danmup" style="font-size: 12px;"></div>

    <?php endif; ?>
    <div id="demo" style="color:#f9f9f9" ></div>

    <div class="cho" >
        <div class="selected"  style="float:left;">简介 </div>
        <div  style="float:right"> 问答 </div>
    </div>
    <br><br>
    <div class="choo">
        <ul>
            <li><?php echo $arr['title']; ?></li>
            <li style="border:1px lightpink solid;width:100px;float:left;font-size: 40px;text-align: center"><?php echo $arr['tname']; ?></li><br>
            <li style="margin-top:20px;font-size: 35px;">
                已有<span style="color:red;font-size: 40px;"><?php echo $arr['count']; ?></span>个同学学过
                <div></div>

            </li>
            <div style="background: lightgrey;height:10px;"></div>
            <li>
                <div style="width:2%;background: green;margin-right:10px;float:left;height:25px;"></div>
                <div >导师介绍</div>
            </li>
            <li><?php echo $arr['man']; ?></li>
            <li style="text-align: center;">
                <?php if(($arr['status'] ==0)): ?>
                <div style="display: inline;"><span style="color:green;font-size: 40px;" class="zan"  pid="<?php echo $arr['id']; ?>" man="<?php echo $arr['man']; ?>"  uid="<?php echo $arr['uid']; ?>">喜欢就送老师花花吧</span></div>
                <?php else: ?>
                <span style="color:grey;font-size: 40px;">已送花</span>
                <?php endif; ?>
                <img src="../../../../public/img/hua.png"  style="width:60px;height:60px;margin-left: 20px;">(<span style="color:red;" class="zan_num"><?php echo $arr['zan']; ?></span>)
            </li>
            <li class="article"><?php echo $arr['man_desc']; ?></li>
            <li>
                <div style="width:2%;background: green;margin-right:10px;float:left;height:25px;"></div>
                <div >简介</div>
            </li>
            <li class="article"><?php echo $arr['desc']; ?></li>
        </ul>
        <ul class="rightawei" hidden>
        <if condition="$data['empty']==1" >
        <?= '该文章还没有评论'?>
        <else/>

            <?php foreach ($data['arrComment']  as $kC => $vC): ?>
            <li style="margin-left: 5%"><?= $vC['account']  ?>&nbsp;&nbsp;<?= $vC['addTime']  ?></li>
            <li style="margin-left: 4%;word-wrap:break-word;">&nbsp;<?= $vC['comment']  ?></li>
            <?php  if(isset($vC['son'])){?>

            <li style="margin-left: 5%"><?= $vC['son']['account']  ?>回复<?= $vC['account']  ?>：</li>
            <li style="margin-left: 4%;word-wrap:break-word;">&nbsp;<?= $vC['son']['htmla']  ?><?= $vC['son']['comment']  ?>&nbsp;&nbsp;<span style="font-size: 30px;"><?= $vC['son']['addTime']  ?></span></li>
            <?php  if(isset($vC['son']['sons'])){?>
            <li style="margin-left: 5%"><?= $vC['son']['sons']['account']  ?>回复<?= $vC['son']['account']  ?>：</li>
            <li style="margin-left: 4%;word-wrap:break-word;">&nbsp;<?= $vC['son']['htmla']  ?><?= $vC['son']['sons']['comment']  ?>&nbsp;&nbsp;<span style="font-size: 30px;"><?=  $vC['son']['sons']['addTime']  ?></span></li>
            <?php }}?>
            <li style="margin-left:70%;">
                <span class="backCom" cid="<?=$vC['cid'] ?>"  uname="<?= $vC['account'] ?>" uid="<?= $vC['uid'] ?>" path="<?=$vC['path'] ?>">回复</span>|
                <!-- 这里先用uid代替username,后面完善了，再修改 -->
                <span class="app" cid="<?=$vC['cid'] ?>" >点赞</span>
            </li>
            <div class="addWord"></div>
            <hr />

            <?php endforeach ?>
            <span id="add" ></span>
            <!-- 提问框 -->
            <div class='foot-input' style="display:block;clear:both;" >
                <div class='input' style='margin-left: 0.5%;width: 90%;float: left;border: 1px solid red;border-radius: 5px;'>
                    <input type="text" placeholder="看了课程有疑问？快说出来吧~" id="inputText" class="weui-input">
                </div>
                <a href="javascript:;" class="weui-btn weui-btn_plain-default" id="submit">提问</a>
            </div>
            <!-- 提问框 end -->

            <!-- 回复框2 -->
            <div class='foot-input2' style="display: none;" >
                <div class='input' style='margin-left: 0.5%;width: 90%;float: left;border: 1px solid red;border-radius: 5px; '>
                    <input type="text"  id="inputText2" class="weui-input">
                </div>
                <a href="javascript:;" class="weui-btn weui-btn_plain-default submit2" >回复</a>
            </div>
            <!-- 提问框2 end -->
            </if>
        </ul>
    </div>
    <div style="width:100%;height:200px;" href="javascript:;"></div>

    <div style="position:absolute;top:0px;left:0px;width:100%;height:550px;z-index:1;background: black;display:none;" id="tan" >
        <div style="top:150px;position:absolute;left:30%;width:500px;height:100px;color:white;font-size:40px;">登录之后才可以观看的呦</div>
        <button style="top:250px;position:absolute;left:15%;width:300px;height:100px;background:dimgrey;color:white;" class="again">重新试看</button>
        <button style="top:250px;position:absolute;right:15%;width:300px;height:100px;background:red;color:white;" ><a href="__ROOT__/index.php/home/login/login" style="color:white;">登录</a></button>
    </div>
    <!--尾部-->
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
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

    <!--尾部-->
</center>
</body>
</html>
<script>
    //做选项卡
    $('.cho div').click(function(){
        $(this).addClass('selected').siblings().removeClass('selected');
        var index=$(this).index();
        $('.choo ul').eq(index).show().siblings().hide();
    })
    //没有送过话的用户可以给老师送花
    $(document).on('click','.zan',function(){
        //$('.zan').click(function(){
        var zan_num=parseInt($('.zan_num').text())+parseInt(1);
        var pid=$(this).attr('pid');
        var man=$(this).attr('man');
        var uid=$(this).attr('uid');
        if(uid==""){
            alert('登陆之后才可以送花的呦');
            return false;
        }else if(uid!=""){
            var obj=$(this);
            var str='<span style="color:grey;font-size: 40px;">已送花</span>';
            $.ajax({
                type:'post',
                url:'__URL__/zan',
                data:{man:man},
                success:function(msg){
                    if(msg==1){
                        alert('送花成功');
                        obj.html('已送花');
                        $('.zan_num').text(zan_num);
                        obj.parent().html(str);
                    }else{
                        alert('送花失败');
                    }
                }
            })

        }



    })

    //点击重新试看
    // 使用 currentTime 属性设置播放位置为 5 秒:

    $(document).on('click','.again',function(){
        var obj=document.getElementById("myVideo");
        obj.currentTime = 0;
        document.getElementById('myVideo').play();
    })

    //试看5秒钟
    $(document).on('click','.agains',function(){
        var obj=document.getElementById("myVideo");
        document.getElementById("tans").style.display="none";
        document.getElementById('myVideo').play();
    })



</script>

<script>
    //试看5秒钟
    // 获取 id="myVideo"的 <video> 元素
    var vid = document.getElementById("myVideo");
    //为 <video> 元素添加 ontimeupdate 事件，如果当前播放位置改变则执行函数
    vid.ontimeupdate = function() {myFunction()};
    function myFunction() {
// 显示 id="demo" 的 <p> 元素中视频的播放位置
        var time=vid.currentTime;
        if(parseInt(time)>4){
            document.getElementById('myVideo').pause();
            document.getElementById('myVideo').style.background="black";
            document.getElementById("demo").innerHTML= 0;
            document.getElementById("tan").style.display="inline-block";

        }else{
            document.getElementById("tan").style.display="none";
            document.getElementById("demo").innerHTML =time ;
        }
    }


</script>

<script>
    //提交提问
    $("#submit").click(function(){
        var  pid  = "<?= Request::instance()->get('id');  ?>"; //留言id
        var  val  = $("#inputText").val();
        var  path = "0";  //第一次留言，path默认为0
        var uid = '<?= Session::get("uid")?Session::get("uid"):"null"; ?>';


        //用户未登录时，不可提问
        if(uid == 'null'){
            alert("请先登录");
            return false;
        }
        $.ajax({
            type: "get",
            url:"__URL__/addComment",
            data:'val='+val+'&pid='+pid+'&path='+path,
            success:function(msg) {
                obj = $.parseJSON(msg);
                if(obj.code == 1){
                    //提问添加ok
                    var str = new String();
                    str+='<li style="margin-left: 5%">'+obj.uname+'&nbsp;&nbsp;'+obj.addTime+'</li>';
                    str+='<li style="margin-left: 4%;word-wrap:break-word;">&nbsp;'+val+'</li>';
                    str+='<li style="margin-left:70%;" ><span class="backCom">回复</span>|<span class="app">点赞</span></li>';
                    str+='<hr />';
                    str+='<div class="huifu-input" style="display: none;">';
                    str+='<div class="input" style="margin-left: 0.5%;width: 90%;float: left;border: 1px solid red;border-radius: 5px;">';
                    str+='<input type="text" placeholder="回复留言" id="inputText" class="weui-input">';
                    str+='</div>';
                    str+='<a href="javascript:;" class="weui-btn weui-btn_plain-default" class="submitCom">回复</a>';
                    str+='</div>';

                    $("#add").append(str);
                }else{
                    alert("添加失败");
                }

            }

        });
    })
    //留言点赞
    $(".app").click(function(){
        console.log("我已点赞");
        var  pid  = "<?= Request::instance()->get('id');  ?>"; //文章id
        var  cid  = $(this).attr("cid");                       //留言id
        var uid = '<?= Session::get("uid")?Session::get("uid"):"null"; ?>';

        //用户未登录时，不可点赞
        if(uid == 'null')
        {
            alert("请先登录");
            return false;
        }

        $.ajax({
            type: "get",
            url:"__URL__/appComment",
            data:'pid='+pid+'&cid='+cid,
            dataType:'json',
            success:function(msg)
            {
                obj= $.parseJSON(msg);

                if(obj.code == 1){
                    alert(obj.message);
                }if(obj.code == 3){
                alert(obj.message);

            }

            }

        });
    })

    //回复消息 框显示
    /*$(".backCom").click(function(){
     _this = $(this);
     var fid = $(this).attr("uid");
     var path = $(this).attr("path");
     uname = $(this).attr("uname");
     $("#inputText2").val("回复"+uname+":");
     $(".submit2").attr('fid',fid); //添加fid
     $(".submit2").attr('path',path); //添加path
     //回复键显示
     $(".foot-input2").show();
     $(".foot-input").hide();


     })*/
    $(".backCom").on("click",hander);
    function hander(event){
        _this = $(this);
        var fid = $(this).attr("uid");
        var path = $(this).attr("path");
        var cid = $(this).attr("cid");
        uname = $(this).attr("uname");
        $("#inputText2").val("回复"+uname+":");
        $(".submit2").attr('fid',fid); //添加fid
        $(".submit2").attr('path',path); //添加path
        $(".submit2").attr('cid',cid); //添加path
        //回复键显示
        $(".foot-input2").show();
        $(".foot-input").hide();
    }

    //回复消息
    //@param: pid[文章id]; cid[留言id]; val [留言内容]; fid[父id] ;path [路径]
    // $("#submit2").click(function(){
    $("body").delegate(".submit2","click",function(){
        var uid = '<?= Session::get("uid")?Session::get("uid"):"null"; ?>';
        //用户未登录时，不可提问
        if(uid == 'null'){
            alert("请先登录");
            return false;
        }
        // $(document).on("click",".submit2",function(){
        var val = $("#inputText2").val();
        _indexs = val.indexOf(":")+1;
        val = val.substring(_indexs);//截取数据 回复内容
        var pid = "<?= Request::instance()->get('id');  ?>";
        var cid = $(this).attr("cid");
        var fid = $(this).attr("fid");
        var path = $(this).attr("path");  //未处理的path

        $.ajax({
            type: "get",
            url:"__URL__/revComment",
            data:'pid='+pid+'&cid='+cid+'&val='+val+'&fid='+fid+'&path='+path,
            dataType:'json',
            success:function(msg)
            {
                obj = $.parseJSON(msg);
                if(obj.code == 1){
                    var str = new String;
                    str +='<div style="width: 80%;height: auto;background: #96FED1;border-radius:15px;text-align: left;margin-right: -10%;margin-top: 3%;margin-bottom:3%;">';
                    str+='<li style="margin-left: 5%">'+obj.uname+'&nbsp;&nbsp;'+obj.addTime+'</li>';
                    str+='<li style="margin-left: 4%;word-wrap:break-word;">&nbsp;'+val+'</li>';
                    str+='<li style="margin-left:70%;" ><span class="backCom">回复</span>|<span class="app">点赞</span></li>';
                    str+='<hr />';
                    str+='<div class="huifu-input" style="display: none;">';
                    str+='<div class="input" style="margin-left: 0.5%;width: 90%;float: left;border: 1px solid red;border-radius: 5px;">';
                    str+='<input type="text" placeholder="回复留言" id="inputText" class="weui-input">';
                    str+='</div>';
                    str+='<a href="javascript:;" class="weui-btn weui-btn_plain-default" class="submitCom">回复</a>';
                    str+='</div>';
                    str+='</div>';

                    _this.parent().next().append(str);
                    $(".backCom").on("click",hander);

                }
                // console.log(_this.parent().next());


            }

        });
    })
    $(document).on(".backCom","click",function(){
        _this = $(this);
        var fid = $(this).attr("uid");
        var path = $(this).attr("path");
        uname = $(this).attr("uname");
        $("#inputText2").val("回复"+uname+":");
        $(".submit2").attr('fid',fid); //添加fid
        $(".submit2").attr('path',path); //添加path
        //回复键显示
        $(".foot-input2").show();
        $(".foot-input").hide();
    })
</script>

<!--轮播css-->
<script src="../../../../public/lunbo/js/jquery.shCircleLoader.js"></script>
<script src="../../../../public/lunbo/js/jquery.danmu.js"></script>
<script src="../../../../public/lunbo/js/main.js"></script>
<script>
    $("#danmup").DanmuPlayer({
        src: "../../../../public/video/<?php echo $arr['video']; ?>",
        height: "550", //区域的高度
        width: "100%", //区域的宽度
        urlToGetDanmu:"__URL__/getData",
        urlToPostDanmu:"__URL__/sendData"
    });
</script>

