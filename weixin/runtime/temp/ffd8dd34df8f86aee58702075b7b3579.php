<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/data/wwwroot/default/weixin/public/../application/admin/view/apply/apply_list.html";i:1492821843;}*/ ?>
<form action="<?php echo url('apply/apply_enter'); ?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>sql文件：<input type="file" name="database_sql"></td>
        </tr>
        <tr>
            <td>数据库名称：<input type="text" name="database_name"></td>
        </tr>
        <tr>
            <td><input type="submit" value="导入"></td>
        </tr>
    </table>
</form>