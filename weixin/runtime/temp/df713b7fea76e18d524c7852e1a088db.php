<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/data/wwwroot/default/weixin/public/../application/admin/view/index/type.html";i:1492417618;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章分类</title>
    <script src="../../../../public/js/jquery.js"></script>
    <style>
        .typ{
            width:100px;height:20px;background:pink;display:inline-block;text-align: center;font-weight: bold;
        }
    </style>
</head>
<body>
<div class="ty">
课程现在所属分类有：
<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div  class="typ" ><?php echo $vo['tname']; ?></div>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>
    <h2>添加课程分类</h2>
    <table>
        <tr>
            <td>分类名称：</td>
            <td><input type="text" class="tname"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" value="添加" class="add">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</body>
</html>
<script>
    $('.add').click(function(){
        var tname=$('.tname').val();
        $.ajax({
            type:'post',
            url:"__URL__/type_pro",
            data:{tname:tname},
            success:function(msg){
              if(msg==1){
                  var str='<div  class="typ" >'+tname+'</div>';
                  alert('添加成功');
                  $('.ty').append(str);
              }else{
                  alert('添加失败，请重新添加');
              }
            }
        })

    })
</script>