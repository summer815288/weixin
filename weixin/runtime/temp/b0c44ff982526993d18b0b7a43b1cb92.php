<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/data/wwwroot/default/weixin/public/../application/admin/view/video/index.html";i:1492666456;}*/ ?>
<style>
    .sub-btn{
        background: #6CB98F;
        color: #FFFFFF;
        padding: 0 15px;
        height: 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100px;
    }
</style>
<center>
    <form action="<?php echo url('video/video_do'); ?>" enctype="multipart/form-data" method="post">
        <table>
            <tr>
                <td>直播标题</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="video_name"></td>
            </tr>
            <tr>
                <td>封面</td>
                <td><input type="file"  name="video_img"></td>
            </tr>
            <tr>
                <td>直播地址</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="video_url"></td>
            </tr>
            <tr>
                <td>开始时间</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="video_start"></td>
            </tr>
            <tr>
                <td>结束时间</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="video_end"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="sub-btn" value="提交">
                </td>
            </tr>
        </table>
    </form>
</center>