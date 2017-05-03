<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/data/wwwroot/default/weixin/public/../application/admin/view/photo/course.html";i:1492672478;}*/ ?>
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
        <button type="button" class="button border-yellow" onclick="window.location.href='__URL__/upload'"><span class="icon-plus-square-o"></span> 添加内容</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">ID</th>
            <th width="15%">图片</th>
            <th>操作</th>
        </tr>
        <?php foreach($data as $key=>$val){?>
        <tr id = "<?php echo $val['id'];?>">
            <td><?php echo $val['id'];?></td>
            <td><img src="../../../../public/<?php echo $val['img'];?>" alt="" width="220" height="330" /></td>
            <!-- <td>描述文字....</td>-->
            <td><div class="button-group">
                <a class="button border-main" href="edit?id=<?php echo $val['id'];?>"><span class="icon-edit"></span> 修改</a>
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
        // alert(title );
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
            url: "photo_list",
            data:{
                id : id,
                name:name
            },
            success: function(msg){
                // alert(msg);
                if(msg==1){
                    obj.parent().html("<span class='name'>"+name+"</span>");
                }else{
                    alert("修改失败");
                }
            }
        });
    });
</script>

</body></html>