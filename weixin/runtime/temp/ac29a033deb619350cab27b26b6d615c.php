<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\WWW\weixinss\weixin\public/../application/admin\view\photo\upload.html";i:1492677942;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/public/background/css/pintuer.css">
    <link rel="stylesheet" href="/public/background/css/admin.css">
    <script src="/public/background/js/jquery.js"></script>
    <script src="/public/background/js/pintuer.js"></script>
</head>
<body>

<div class="panel admin-panel" style="margin-left: 40%;line-height: 30px;">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 图片信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="" enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label>分类名称：</label>
                </div>
                <div class="field">
                   <select name="c_id">
                       <?php foreach($category as $k=>$v){?>
                       <option value="<?php echo $v['id'];?>"><?php echo $v['c_name'];?></option>
                       <?php }?>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div>
                    <input type="file"  name="img"  >
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>