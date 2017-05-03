<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\weixin\tp\weixin\public/../application/home\view\index\video_start.html";i:1492576225;}*/ ?>
<?php
use think\Url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $videoData['video_name']; ?></title>
    <link rel="stylesheet" href="../../../../public/css/weui.css"/>
    <link rel="stylesheet" href="../../../../public/css/example.css"/>
    <script src="../../../../public/js/jquery.js"></script>
    <style>
        *{
            padding: 20px;;
            font-size: 50px;
        }
    </style>
</head>
<body>
<center>
    <h2>在线直播</h2>
    <div class="weui-cells__title">
        <?php if(($videoData['video_start'] >= $time) and ($time <= $videoData['video_end'])): ?>
        <table>
            <tr>
                <td>
                    <video width="auto" height="500" controls autobuffer>
                        <source src="<?php echo $videoData['video_url']; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
                    </video>
                </td>
            </tr>
        </table>
        <?php elseif(($videoData['video_start'] > $time)): ?>
        <table>
            <tr>
                <td><p style="font-size: 50px">直播未开始，请您耐心等待</p></td>
            </tr>
        </table>
        <?php endif; ?>
    </div>
</center>
</body>
</html>
