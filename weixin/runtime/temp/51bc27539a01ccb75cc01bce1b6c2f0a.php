<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\WWW\weixinss\weixin\public/../application/admin\view\het\lei.html";i:1492687932;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="../../../../public/js/jquery.js"></script>
</head>
<style>

    .page{
        margin-left: 30%;line-height: 30px;
    }
    .page a{
        text-decoration: none;
        list-style-type:none;

        width:80px;;font-size: 16px;line-height: 30px;
        text-decoration: none;

    }
    table tr td{
        line-height: 30px;
        width: 100px;;
    }

</style>
<body>

<table border="1" class="tab"   style="margin-left: 30%;line-height: 30px;">
    <tr>
        <td>ID</td>
        <td>分类名称</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
    <tr>
        <td><?php echo $v['cid']; ?></td>
        <td><span class="sp" id="<?php echo $v['cid']; ?>"><?php echo $v['className']; ?></span><input type="text"  style="display:none" class="pp"></td>
        <td><a href="<?php echo url('Het/class_del',['id'=>$v['cid']]); ?>">删除</a></td>

    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="page">
    <?= $page;?>
</div>
</body>
<script>
    //机点及改

    $(document).on("click",".sp",function(){
       var _this=$(this);
        _this.hide();
        _this.next().show();

    })
    //修改
    $(document).on("blur",".pp",function(){
        var _this=$(this);
        var id=_this.prev().attr("id");
        var value=_this.val();
        if(value==null ||value=="" ||value==undefined)
        {
            alert("内容不能为空");
            _this.hide();
            _this.prev().show();
            return false;
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "<?php echo url('Het/class_update'); ?>",
                data:{id:id,value:value},
                success: function(msg){
                    if(msg==1)
                    {
                        _this.prev().html(' <span class="sp">'+value+'</span>');
                        _this.hide();
                        _this.prev().show();
                    }

                }
            });
        }

    });
    //翻页函数
    function page(page){
        var html="<table border='1'><tr> <td>ID</td> <td>分类名称</td> <td>操作</td> </tr>";
        //发送AJAX请求
        $.ajax({
            url:"<?php echo url('Het/calss_fen'); ?>",
            data:{pages:page},
            type:"POST",
            dataType:"json",
            success:function(msg){
                //alert(msg);
                if(msg.aa.length>0)
                {
                    for(var i=0;i<msg.aa.length;i++)
                    {
                        html+="<tr><td>"+msg.aa[i]['cid']+"</td>" +
                        "<td><span class='sp' id='"+msg.aa[i]['cid']+"'>"+msg.aa[i]['className']+"</span><input type='text'  style='display:none' class='pp'></td>"+
                        "<td>"+ '<a href="class_del?id='+msg.aa[i]['cid']+'">删除</a>'+"</td></tr>";

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