<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\phpStudy\WWW\weixin\weixin\public/../application/admin\view\consultation\problem.html";i:1492516785;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/wenjian/shiyi/weixin/public/jquery-1.8.2.min.js"></script>
</head>
<body>
<a href="<?php echo url('Consultation/index'); ?>">首页</a>
<table border="1">
    <tr>
        <td>用户序号</td>
        <td>用户称呼</td>
        <td>联系方式</td>
        <td>用户需求</td>
        <td>所在公司</td>
        <td>咨询时间</td>
        <td>是否解决</td>
    </tr>
    <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
    <tr>
        <td><?php echo $v['c_id']; ?></td>
        <td><?php echo $v['c_name']; ?></td>
        <td><?php echo $v['c_tel']; ?></td>
        <td><?php echo $v['c_need']; ?></td>
        <td><?php echo $v['c_pany']; ?></td>
        <td><?php echo $v['c_time']; ?></td>
        <td>
            <?php if(($v['c_start'])==0): ?>
           <span class="sp" id="<?php echo $v['c_id']; ?>">未解决</span>
            <?php else: ?>
            <span>已解决</span>
            <?php endif; ?>
        </td>

    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<script>
    //修改未解决
    $(".sp").click(function(){
        var _this=$(this);
        var id=_this.attr("id");
        $.ajax({
            type: "POST",
            url: "<?php echo url('update'); ?>",
            data:{id:id},
            success: function(msg){
                if(msg==1)
                {
                    _this.html("<span>已解决</span>");
                }
            }
        });
    })
</script>
</body>
</html>