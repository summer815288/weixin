<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/data/wwwroot/default/weixin/public/../application/admin/view/het/add.html";i:1492687662;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>添加热文</title>
    <script src="/wenjian/shiyi/weixin/public/jquery-1.8.2.min.js"></script>
</head>
<body>
<form method="post" action="<?php echo url('Het/h_add'); ?>" enctype="multipart/form-data" style="margin-left: 30%;line-height: 30px;">
    <table border="1">
        <tr><td>标题</td><td><input type="text" name="h_title" class="title"></td></tr>
        <tr><td>图片</td><td><input type="file" name="h_img" class="img"></td></tr>
        <tr><td>所属分类</td><td>
            <select name="c_id">
                <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
                <option value="<?php echo $v['cid']; ?>" ><?php echo $v['className']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </td></tr>
        <tr><td>作者</td><td><input type="text" name="h_author" class="aut"></td></tr>
        <tr><td>内容</td><td><textarea name="h_content" class="con"></textarea></td></tr>
        <tr><td colspan="2" class="sub"><input type="submit" value="添加热文" onclick="checkForm();"></td></tr>
    </table>
</form>
</body>
<script>
    //验证标题唯一性和非空
    $(".title").blur(function ()
    {
        var title=$(this).val();
        var sub=$(".sub");
        if(title ==null ||title=="" || title==undefined)
        {
            alert("标题不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo url('Het/yan'); ?>",
            data:{title:title},
            success: function(msg){
                if(msg==1)
                {
                    alert("标题已存在");
                    sub.html('<input type="button" value="拒绝添加热文">');
                }
                else
                {
                    sub.html('<input type="submit" value="添加热文" onclick="checkForm();" >');
                }
            }
        });
    } );
    //验证内容非空
    $(".con").blur(function(){
        var con=$(this).val();
        var sub=$(".sub");
        if(con==null ||con=="" || con==undefined)
        {
            alert("内容不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        else
        {
            sub.html('<input type="submit" value="添加热文" onclick="checkForm();" >');
        }

    })
    //验证作者
    $(".aut").blur(function(){
        var aut=$(this).val();
        var sub=$(".sub");
        if(aut ==null ||aut=="" || aut==undefined)
        {
            alert("作者不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        else
        {
            sub.html('<input type="submit" value="添加热文" onclick="checkForm();" >');
        }
    })
    //验证图片非空
    $(".img").change(function(){
        var img=$(this).val();
        var sub=$(".sub");
        if(img ==null ||img=="" || img==undefined)
        {
            alert("图片不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        else
        {
            sub.html('<input type="submit" value="添加热文" onclick="checkForm();" >');
        }
    })
    //提交的时候验证非空
    function checkForm(){
        var title=$(".title").val();
        var sub=$(".sub");
        if(title ==null ||title=="" || title==undefined)
        {
            alert("标题不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        var con=$(".con").val();
        if(con==null ||con=="" || con==undefined)
        {
            alert("内容不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        var aut=$(".aut").val();
        if(aut ==null ||aut=="" || aut==undefined)
        {
            alert("作者不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
        var img=$(".img").val();
        if(img ==null ||img=="" ||img==undefined)
        {
            alert("图片不能为空");
            sub.html('<input type="button" value="拒绝添加热文">');
            return false;
        }
    }
</script>
</html>