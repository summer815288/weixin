<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/data/wwwroot/default/weixin/public/../application/admin/view/rbac/user_list.html";i:1492602866;}*/ ?>
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
                    <th style="width:30%">编号</th>
                    <th style="width:30%">管理员名称</th>
                    <th style="width:40%">操作</th>
                </tr>
                <tbody id="tbody">
                <?php foreach($userList as $vo): ?>
                <tr>
                    <td><?php echo $vo['user_id']; ?></td>
                    <td><?php echo $vo['user_name']; ?></td>
                    <td>
                        <div class="table-fun" >
                           <!-- <button class="del" value="<?php echo $vo['user_id']; ?>">删除</button>-->
                            <a href="user_role?user_id=<?php echo $vo['user_id'];?>" style="width:200px;height:auto;">分配角色</a>
                        </div>
                    </td>
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