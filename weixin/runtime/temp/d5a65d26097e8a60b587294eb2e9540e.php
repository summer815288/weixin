<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\WWW\weixinss\weixin\public/../application/admin\view\rbac\node.html";i:1492602613;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台欢迎页</title>
    <link rel="stylesheet" href="../../../../public/css/reset.css" />
    <link rel="stylesheet" href="../../../../public/css/content.css" />
</head>
<body marginwidth="0" marginheight="0">
<div class="container">
    <div class="public-content">
        <div class="public-content-header">
            <!-- <h3>修改网站配置</h3> -->
        </div>
        <div class="public-content-cont">
            <table class="public-cont-table">
                <tr>
                    <th style="width:5%">编号</th>
                    <th style="width:5%">权限名称</th>
                    <th style="width:5%">控制器名称</th>
                    <th style="width:5%">方法名称</th>
                </tr>
                <tbody id="tbody">
                <?php foreach($node as $vo): ?>
                <tr>
                    <td><?php echo $vo['n_id']; ?></td>
                    <td><?php echo $vo['n_name']; ?></td>
                    <td><?php echo $vo['n_controller']; ?></td>
                    <td><?php echo $vo['n_action']; ?></td>

                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="../../../../public/js/jquery.js"></script>
<script>
    $(".del").click(function(){
        $(this).parent().parent().parent().remove();
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "roledel",
            data: "role_id="+id,
            success: function(msg){
                if(msg==1){

                    alert("删除成功！");

                }else {
                    alert("删除失败！");
                }
                // alert("删除成功！");
            }
        });
    })
</script>