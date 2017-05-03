<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/data/wwwroot/default/weixin/public/../application/admin/view/index/all.html";i:1492687550;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>课程展示</title>
    <style>
        .pagination{
            display: inline-block;
        }
        .pagination li{
            display:inline-block;
        }

    </style>
    <script src="../../../../public/js/jquery.js"></script>
</head>
<body>
<center>
<!--课程所有的分类：-->
    <!--<select  class="tid">-->
        <!--<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
        <!--<option value="<?php echo $vo['tid']; ?>"><?php echo $vo['tname']; ?></option>-->
        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
    <!--</select>-->
    <!--开始时间：<input type="text" class="begin" >&nbsp;&nbsp;&nbsp;-->
    <!--结束时间：<input type="text" class="end">-->
    <!--<input type="button" value="搜索" class="search">-->

    <table>
        <tr>
            <td>图片名称</td>
            <td>标题</td>
            <td>描述</td>
            <td>内容介绍</td>
            <td>所属分类</td>
            <td>视频地址</td>
            <td>作者介绍</td>
            <td>作者</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        <tbody class="tbody">
        <?php if(is_array($p['data']) || $p['data'] instanceof \think\Collection || $p['data'] instanceof \think\Paginator): if( count($p['data'])==0 ) : echo "" ;else: foreach($p['data'] as $key=>$vo): ?>
        <tr id="<?php echo $vo['id']; ?>">
            <td>
                <img src="../../../../public/img/<?php echo $vo['img']; ?>"  style="width:100px;height:100px;">
            </td>
            <td><?php echo $vo['title']; ?></td>
            <td><?php echo $vo['desc']; ?></td>
            <td><?php echo $vo['content']; ?></td>
            <td><?php echo $vo['tname']; ?></td>
            <td> <video src="../../../../public/video/<?php echo $vo['video']; ?>"  style="width:100px;height:100px;"></video></td>
            <td><?php echo $vo['man_desc']; ?></td>
            <td><?php echo $vo['man']; ?></td>
            <td><?php echo $vo['addtime']; ?></td>
            <td><a href="javascript:;" class="del">删除</a>||<a href="">修改</a></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>

        <tr>
            <td colspan="9">
                总共<?php echo $p['total']; ?>页，每页显示3页，当前第<?php echo $p['current_page']; ?>页
                <?php echo $page; ?>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
<script>
    //ajax删除
    $('.del').click(function(){
        var tr=$(this).parent().parent();
        var id=tr.attr('id');
        $.ajax({
            type:'post',
            data:{id:id},
            url:'__URL__/del',
            success:function(msg){
              if(msg==1){
                tr.remove();
              }else{
                  alert('删除失败');
              }
            }
        })
    })
    //现在做搜索后分页
    $('.search').click(function(){
        var tid=$('.tid').val();
        var begin=$('.begin').val();
        var end=$('.end').val();
        $.ajax({
            type:'post',
            data:{tid:tid,begin:begin,end:end},
            url:'__URL__/search',
            success:function(msg){
                $.each(msg.p,function(k,vo){
                    str=' <tr id="'+$vo.id+'"><td><img src="../../../../public/img/'+$vo.img+'"   style="width:100px;height:100px;"></td><td>'+$vo.title+'</td><td>'+$vo.desc+'</td><td>'+$vo.content+'</td><td>'+$vo.tname+'</td><td><video src="../../../../public/video/'+$vo.video+'"   style="width:100px;height:100px;"></video></td><td>'+$vo.man_desc+'</td><td>'+$vo.man+'</td><td>'+$vo.addtime+'</td><td><a href="javascript:;" class="del">删除</a>||<a href="">修改</a></td></tr>';
                })
                $('.tbody').html(str);
            }
        })

    })
</script>