<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\WWW\weixinss\weixin\public/../application/admin\view\het\class_add.html";i:1492688116;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>添加分类</title>
    <script src="/wenjian/shiyi/weixin/public/jquery-1.8.2.min.js"></script>
</head>
<body>
<form method="post" action="<?php echo url('Het/class_ad'); ?>" style="margin-left: 30%;line-height:30px;" >
    <table border="1">
        <tr><td>分类名称</td><td><input type="text" name="className" ></td></tr>
        <tr><td colspan="2" class="sub"><input type="submit" value="添加分类" onclick="checkForm();"></td></tr>
    </table>
</form>
</body>
</html>