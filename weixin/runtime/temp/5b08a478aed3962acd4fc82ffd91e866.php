<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\WWW\weixin\weixin\public/../application/admin\view\category\show.html";i:1492516785;}*/ ?>
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
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加内容</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">ID</th>
            <th width="20%">课程名称</th>
            <th width="15%">课程简介</th>
            <th>操作</th>
        </tr>
        <?php foreach($data as $key=>$val){?>
        <tr id = "<?php echo $val['id'];?>">
            <td><?php echo $val['id'];?></td>
            <td><span class="name"><?php echo $val['c_name'];?></span></td>
          
            <td><?php echo $val['intro'];?></td>
            <!-- <td>描述文字....</td>-->
            <td><div class="button-group">
                <a class="button border-main" href="#add"><span class="icon-edit"></span> 修改</a>
                <a class="button border-red" href="del?id=<?php echo $val['id'];?>" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
            </div>
            </td>
        </tr>
        <?php  }?>
    </table>

</div>
<script type="text/javascript">
    function del(id,mid){
        if(confirm("您确定要删除吗?")){

        }
    }
    $(document).on("click",".name",function(){
        var name = $(this).html();
        // alert(name );
        $(this).parent().html("<input name='name' value='"+name+"'/>");
    });
    //失去焦点
    $(document).on("blur","input[name='name']",function(){
        var name = $(this).val();
        // alert(title);
        var id = $(this).parents("tr").attr("id");
        //alert(id);
        var obj = $(this);
        $.ajax({
            type: "POST",
            url: "edit",
            data:{
                id : id,
                name:name
            },
            success: function(msg){
                // alert(msg);
                if(msg==2){
                    obj.parent().html("<span class='name'>"+name+"</span>");
                }else{
                    alert("修改失败");
                }
            }
        });
    });

</script>
</body></html>