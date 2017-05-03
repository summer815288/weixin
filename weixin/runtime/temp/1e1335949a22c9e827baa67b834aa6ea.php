<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\weixin\tp\weixin\public/../application/home\view\index\video.html";i:1492573610;}*/ ?>
<?php
use think\Url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>在线直播</title>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <script src="../../../../public/js/jquery.js"></script>
    <style>
        *{


        }
    </style>
</head>
<body>
<center>
        <h2>在线直播</h2>
        <div class="weui-cells__title">
            <?php foreach($video as $v): ?>
                <table style="padding: 20px;font-size: 50px;">
                    <tr>
                        <td>
                            <a href="<?php echo url('index/appstart'); ?>?id=<?php echo $v['video_id']; ?>" style="margin: auto">
                            <img src="../../../../public/uploads/zhibo/<?php echo $v['video_img']; ?>" width="500" height="200"><br>
                                <p style="font-size: 30px">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['video_name']; ?></p>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <td><p style="font-size: 30px">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('H:i开始',$v['video_start']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('H:i结束',$v['video_end']); ?></p></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div>
</center>
</body>
</html>
