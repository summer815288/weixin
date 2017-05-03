<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\WWW\weixinss\weixin\public/../application/admin\view\category\add.html";i:1492689939;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="../../../../public/background/css/pintuer.css">
    <link rel="stylesheet" href="../../../../public/background/css/admin.css">
    <script src="../../../../public/background/js/jquery.js"></script>
    <script src="../../../../public/background/js/pintuer.js"></script>
</head>

<body>

<div class="panel admin-panel"  >
    <div class="panel-head"><strong><span class="icon-key"></span> 课程添加</strong></div>
    <div class="body-content form-x">

            <div class="form-group">
                <div class="label">
                    <label >课程名称：</label>
                </div>
                <div class="field">
                    <label style="line-height:33px;">
                        <input type="text" class="input w50" id="mpass" name="c_name" size="50" placeholder="请输入课程名称" data-validate="required:请输入新闻名称" />
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label >课程简介：</label>
                </div>
                <div class="field">
                    <textarea  id="c_content" name="c_content"style="height:80px"></textarea>
                </div>
            </div>

            <label  style="margin-left: 40px;">课程视频：</label>
            <div class="form-group" style="margin-left: 40px;" >

            <div  id="drop_area" style="border:3px dashed silver;width:200px; height:200px;" >
                将视频上传
            </div>

            <progress value="0" max="10" id="prouploadfile"></progress>

            <span id="persent">0%</span>
            <br />
            <!--<button onclick="xhr2()">ajax上传</button>-->
            <button onclick="stopup()" id="stop">上传</button>
                <input type='file' id='file' multiple='multiple' name='test[]' />
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
    </div>
</div>

</body>

</html>
<script>
    function clearpro(){
        pro.value=0;
        persent.innerHTML="0%";
    }
    function test1(files){
        var fileList = files; //获取文件对象
        console.log(fileList)
        //检测是否是拖拽文件到页面的操作
        if(fileList.length == 0){
            return false;
        }
        //拖拉图片到浏览器，可以实现预览功能
        //规定视频格式
        //in_array
        Array.prototype.S=String.fromCharCode(2);
        Array.prototype.in_array=function(e){
            var r=new RegExp(this.S+e+this.S);
            return (r.test(this.S+this.join(this.S)+this.S));
        };
        var video_type=["video/mp4","video/ogg"];

        //创建一个url连接,供src属性引用
        var fileurl = window.URL.createObjectURL(fileList[0]);
        if(fileList[0].type.indexOf('image') === 0){  //如果是图片
            var str="<img width='200px' height='200px' src='"+fileurl+"'>";
            document.getElementById('drop_area').innerHTML=str;
        }else if(video_type.in_array(fileList[0].type)){   //如果是规定格式内的视频
            var str="<video width='200px' height='200px' controls='controls' src='"+fileurl+"'></video>";
            document.getElementById('drop_area').innerHTML=str;
        }else{ //其他格式，输出文件名
            //alert("不预览");
            var str="文件名字:"+fileList[0].name;
            document.getElementById('drop_area').innerHTML=str;
        }
        resultfile = fileList[0];
        console.log(resultfile.name);

        //切片计算
        filesize= resultfile.size;
        setsize=500*1024;
        filecount = filesize/setsize;
        //console.log(filecount)
        //定义进度条
        pro.max=parseInt(Math.ceil(filecount));



        i =getCookie(resultfile.name);
        i = (i!=null && i!="")?parseInt(i):0

        if(Math.floor(filecount)<i){
            //alert("已经完成");
            //  pro.value=i+1;
            // persent.innerHTML="100%";

            setCookie(resultfile.name,0,365)

        }else{
            //alert(i);
            pro.value=i;
            p=parseInt(i)*100/Math.ceil(filecount)
            persent.innerHTML=parseInt(p)+"%";
        }
    }
    //拖拽上传开始
    //-1.禁止浏览器打开文件行为
    document.addEventListener("drop",function(e){  //拖离
        e.preventDefault();
    })
    document.addEventListener("dragleave",function(e){  //拖后放
        e.preventDefault();
    })
    document.addEventListener("dragenter",function(e){  //拖进
        e.preventDefault();
    })
    document.addEventListener("dragover",function(e){  //拖来拖去
        e.preventDefault();
    })
    //上传进度
    var pro = document.getElementById('prouploadfile');
    var persent = document.getElementById('persent');

    //2.拖拽
    var stopbutton = document.getElementById('stop');

    var resultfile=""
    var box = document.getElementById('drop_area'); //拖拽区域
    box.addEventListener("drop",function(e){
        var fileList = e.dataTransfer.files; //获取文件对象
        console.log(fileList)
        //检测是否是拖拽文件到页面的操作
        if(fileList.length == 0){
            return false;
        }
        //拖拉图片到浏览器，可以实现预览功能
        //规定视频格式
        //in_array
        Array.prototype.S=String.fromCharCode(2);
        Array.prototype.in_array=function(e){
            var r=new RegExp(this.S+e+this.S);
            return (r.test(this.S+this.join(this.S)+this.S));
        };
        var video_type=["video/mp4","video/ogg"];

        //创建一个url连接,供src属性引用
        var fileurl = window.URL.createObjectURL(fileList[0]);
        if(fileList[0].type.indexOf('image') === 0){  //如果是图片
            var str="<img width='200px' height='200px' src='"+fileurl+"'>";
            document.getElementById('drop_area').innerHTML=str;
        }else if(video_type.in_array(fileList[0].type)){   //如果是规定格式内的视频
            var str="<video width='200px' height='200px' controls='controls' src='"+fileurl+"'></video>";
            document.getElementById('drop_area').innerHTML=str;
        }else{ //其他格式，输出文件名
            //alert("不预览");
            var str="文件名字:"+fileList[0].name;
            document.getElementById('drop_area').innerHTML=str;
        }
        resultfile = fileList[0];
        console.log(resultfile);

        //切片计算
        filesize= resultfile.size;
        setsize=500*1024;
        filecount = filesize/setsize;
        //console.log(filecount)
        //定义进度条
        pro.max=parseInt(Math.ceil(filecount));



        i =getCookie(resultfile.name);
        i = (i!=null && i!="")?parseInt(i):0

        if(Math.floor(filecount)<i){
            alert("已经完成");
            pro.value=i+1;
            persent.innerHTML="100%";

        }else{
            alert(i);
            pro.value=i;
            p=parseInt(i)*100/Math.ceil(filecount)
            persent.innerHTML=parseInt(p)+"%";
        }

    },false);

    //3.ajax上传

    var stop=1;
    function xhr2(){
        if(stop==1){
            return false;
        }
        if(resultfile==""){
            alert("请选择文件")
            return false;
        }
        i=getCookie(resultfile.name);
        console.log(i)
        i = (i!=null && i!="")?parseInt(i):0

        if(Math.floor(filecount)<parseInt(i)){
            alert("已经完成");
            return false;
        }else{
            //alert(i)
        }
        var xhr = new XMLHttpRequest();//第一步
        //新建一个FormData对象
        var formData = new FormData(); //++++++++++
        //追加文件数据

        //改变进度条
        pro.value=i+1;
        p=parseInt(i+1)*100/Math.ceil(filecount)
        persent.innerHTML=parseInt(p)+"%";
        //进度条


        if((filesize-i*setsize)>setsize){
            blobfile= resultfile.slice(i*setsize,(i+1)*setsize);
        }else{
            blobfile= resultfile.slice(i*setsize,filesize);
            formData.append('lastone', Math.floor(filecount));
        }
        formData.append('file', blobfile);
        //return false;
        formData.append('blobname', i); //++++++++++
        formData.append('filename', resultfile.name); //++++++++++
        //post方式
        xhr.open('POST', 'up1'); //第二步骤
        //发送请求
        xhr.send(formData);  //第三步骤
        stopbutton.innerHTML = "暂停"
        //ajax返回
        xhr.onreadystatechange = function(){ //第四步
            if ( xhr.readyState == 4 && xhr.status == 200 ) {
            　console.log( xhr.responseText );
                if(i<filecount){
                    xhr2();
                }else{
                    if(current_file<filesx.length){
                        current_file++;
                        var files2=Array();
                        clearpro();
                        files2[0]=filesx[current_file];
                        test1(files2);
                        xhr2()
                    }else{
                        i=0;
                        stop = 1
                        stopbutton.innerHTML = "完成!"
                        alert('全部完成');
                     }

            　   }
               }
            　};
        //设置超时时间
        xhr.timeout = 20000;
        xhr.ontimeout = function(event){
            alert('请求超时，网络拥堵！低于25K/s');
            　}

        i=i+1;
        setCookie(resultfile.name,i,365)

    }

    //设置cookie
    function setCookie(c_name,value,expiredays)
    {
        var exdate=new Date()
        exdate.setDate(exdate.getDate()+expiredays)
        document.cookie=c_name+ "=" +escape(value)+
        ((expiredays==null) ? "" : ";expires="+exdate.toGMTString()+";path=/")
    }
    //获取cookie
    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
            }
        }
        return ""
    }

    var filesx;
    var current_file=0;
    function stopup(){
        if(stop==1){
            stop = 0
            filesx=document.getElementById('file').files  ;
            var files2=Array();
            console.log(filesx)
            clearpro();
            files2[0]=filesx[current_file];
            test1(files2);
            xhr2();
        }else{
            stop = 1
            stopbutton.innerHTML = "继续"

        }

    }
    //添加
    $(".button").click(function(){
        //课程名称
        var c_name=$("#mpass").val();
        //课程简介
        var intro=$("#c_content").val();
        //视频名称
        var video=$("#file").val();
        $.ajax({
            type: "POST",
            url: "add",
            data: {
                c_name:c_name,
                intro:intro,
                video:video
            },
            success: function(msg){
               if(msg==0){
                  alert('添加成功');
                  location.href='show';
               }
                if(msg==1){
                    alert('添加失败');
                }
            }
        });

    })
</script>