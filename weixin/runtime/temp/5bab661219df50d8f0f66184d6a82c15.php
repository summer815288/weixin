<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/data/wwwroot/default/weixin/public/../application/admin/view/consultation/img_add.html";i:1492686994;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
<form method="post" action="<?php echo url('Index/add'); ?>" enctype="multipart/form-data" style="margin-left: 40%;line-height: 30px;">
    <table>
        <tr><td>图片 ：</td><td><input type="file" name="file"></td></tr>
        <tr><td colspan="2"><input type="submit" value="添加"></td></tr>
    </table>

</form>
</body>
</html>