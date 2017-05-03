<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/data/wwwroot/default/weixin/public/../application/admin/view/het/index.html";i:1492687626;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>热文展示</title>
    <script src="../../../../public/js/jquery.js"></script>
</head>
<body>

<br>
内容：<input type="text" class="n">作者：<input type="text" class="z">
<input type="button" value="搜索" class="but">
<table border="1" class="tab">
    <tr>
        <td>ID</td>
        <td>标题</td>
        <td>内容</td>
        <td>图片</td>
        <td>添加时间</td>
        <td>作者</td>
        <td>所属分类</td>
        <td>阅读量</td>
        <td>点赞数</td>
        <td>是否通过</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
    <tr>
        <td><?php echo $v['h_id']; ?></td>
        <td><?php echo $v['h_title']; ?></td>
        <td><?php echo $v['h_content']; ?></td>
        <td><img src='../../../../public/<?php echo $v['h_img']; ?>' style="width: 50px;height: 50px"></td>
        <td><?php echo $v['h_time']; ?></td>
        <td><?php echo $v['h_author']; ?></td>
        <td><?php echo $v['className']; ?></td>
        <td><?php echo $v['h_amount']; ?></td>
        <td><?php echo $v['h_spot']; ?></td>
        <td>
            <?php if(($v['h_start'])==0): ?>
            <span class="sp" id="<?php echo $v['h_id']; ?>">未审核</span>
            <?php else: ?>
            <span>通过</span>
            <?php endif; ?>

        </td>
        <td>
            <a href="<?php echo url('Het/del',['id'=>$v['h_id']]); ?>">删除</a>
            ||
            <a href="<?php echo url('Het/update',['id'=>$v['h_id']]); ?>">修改</a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="page">
    <?= $page;?>
</div>
</body>
<script>

    //审核
    $(document).on("click",".sp",function(){
        var _this=$(this);
       var id=$(this).attr('id');

        if(confirm("确定要通过吗？"))
        {
            $.ajax({
                type: "POST",
                url: "<?php echo url('Het/start'); ?>",
                data:{id:id},
                success: function(msg){
                    if(msg==1)
                    {
                        _this.html(' <span>通过</span>');
                    }

                }
            });
        }
        else
        {
            return false;
        }
    })
    //搜索
    $(".but").click(function()
    {
        var nr=$(".n").val();
        var zz=$(".z").val();
        var html="<table border='1'> <tr> <td>ID</td> <td>标题</td> <td>内容</td> <td>图片</td> <td>添加时间</td> <td>作者</td><td>所属分类</td> <td>阅读量</td> <td>点赞数</td> <td>是否通过</td> <td>操作</td> </tr>";
        //发送AJAX请求
        $.ajax({
            url:"<?php echo url('Het/ss'); ?>",
            data:{pages:1,h_content:nr,h_author:zz},
            type:"POST",
           dataType:"json",
            success:function(msg){
               // alert(msg);
                if(msg.aa.length>0)
                {
                    for(var i=0;i<msg.aa.length;i++)
                    {
                        html+="<tr><td>"+msg.aa[i]['h_id']+"</td>" +
                        "<td>"+msg.aa[i]['h_title']+"</td>"+
                        "<td>"+msg.aa[i]['h_content']+"</td>"+
                        "<td>"+'<img src="../../../../public/'+msg.aa[i]["h_img"] +'"style="width: 50px;height: 50px">'+"</td>"+
                        "<td>"+msg.aa[i]['h_time']+"</td>"+
                        "<td>"+msg.aa[i]['h_author']+"</td>"+
                        "<td>"+msg.aa[i]['className']+"</td>"+
                        "<td>"+msg.aa[i]['h_amount']+"</td>"+
                        "<td>"+msg.aa[i]['h_spot']+"</td>"+
                        "<td>"+ "<?php if(("+msg.aa[i]['h_start']==0+")): ?> <span class='sp' id="+msg.aa[i]['h_id']+">未审核</span><?php else: ?> <span>通过</span><?php endif; ?>"+
                        "</td>"+
                        "<td>"+ '<a href="del?id='+msg.aa[i]['h_id']+'">删除</a>'+ "||"+ '<a href="update?id='+msg.aa[i]['h_id']+'">修改</a>'+"</td></tr>";

                    }
                    html+="</table>";

                    $(".tab").html(html);
                    $(".page").html("<div class='page'>"+msg.str+"</div>");
                }
                else
                {
                    $(".tab").html("没有相关数据");
                    $(".page").html("");
                }


            }
        });
    });
    //翻页函数
    function page(page){
        var nr=$(".n").val();
        var zz=$(".z").val();
        var html="<table border='1'> <tr> <td>ID</td> <td>标题</td> <td>内容</td> <td>图片</td> <td>添加时间</td> <td>作者</td><td>所属分类</td> <td>阅读量</td> <td>点赞数</td> <td>是否通过</td> <td>操作</td> </tr>";
        //发送AJAX请求
        $.ajax({
            url:"<?php echo url('Het/ss'); ?>",
            data:{pages:page,h_content:nr,h_author:zz},
            type:"POST",
            dataType:"json",
            success:function(msg){
                //alert(msg);
                if(msg.aa.length>0)
                {
                    for(var i=0;i<msg.aa.length;i++)
                    {
                        html+="<tr><td>"+msg.aa[i]['h_id']+"</td>" +
                        "<td>"+msg.aa[i]['h_title']+"</td>"+
                        "<td>"+msg.aa[i]['h_content']+"</td>"+
                        "<td>"+'<img src="../../../../public/'+msg.aa[i]["h_img"] +'"style="width: 50px;height: 50px">'+"</td>"+
                        "<td>"+msg.aa[i]['h_time']+"</td>"+
                        "<td>"+msg.aa[i]['h_author']+"</td>"+
                        "<td>"+msg.aa[i]['className']+"</td>"+
                        "<td>"+msg.aa[i]['h_amount']+"</td>"+
                        "<td>"+msg.aa[i]['h_spot']+"</td>"+
                        "<td>"+"<?php if(("+msg.aa[i]['h_start']==0+")): ?> <span class='sp' id="+msg.aa[i]['h_id']+">未审核</span><?php else: ?> <span>通过</span><?php endif; ?>"+
                        "</td>"+
                        "<td>"+ '<a href="del?id='+msg.aa[i]['h_id']+'">删除</a>'+ "||"+ '<a href="update?id='+msg.aa[i]['h_id']+'">修改</a>'+"</td></tr>";

                }
                    html+="</table>";

                    $(".tab").html(html);
                    $(".page").html("<div class='page'>"+msg.str+"</div>");
                }
                else
                {
                    $(".tab").html("没有相关数据");
                    $(".page").html("");
                }


            }
        });
    }
</script>
</html>