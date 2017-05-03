<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/data/wwwroot/default/weixin/public/../application/admin/view/index/product_add.html";i:1492432264;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>产品添加</title>
</head>
<body>
<center>
    <form action="__URL__/product_pro"  method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>图片：</td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td>标题：</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>描述：</td>
                <td><textarea name="desc" cols="40" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>内容详情：</td>
                <td><textarea name="content" id="" cols="40" rows="10"></textarea></td>
            </tr>

            <tr>
                <td>所属分类：</td>
                <td>
                    <select name="tid">
                        <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['tid']; ?>"><?php echo $vo['tname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>视频添加：</td>
                <td>
                    <input type="file" name="video">
                </td>
            </tr>
            <tr>
                <td>作者：</td>
                <td><input type="text" name="man"></td>
            </tr>
            <tr>
                <td>作者描述：</td>
                <td>
                    <textarea name="man_desc"  cols="10" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="提交"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>