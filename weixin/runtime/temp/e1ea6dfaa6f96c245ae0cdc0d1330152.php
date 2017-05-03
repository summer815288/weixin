<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\WWW\weixinss\weixin\public/../application/admin\view\rbac\node_add.html";i:1492602613;}*/ ?>
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
    <form action="<?php echo url('rbac/node_add'); ?>" method="post">
        <table>
            <tr>
                <td>权限名称</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="n_name"></td>
            </tr>
            <tr>
                <td>控制器名称</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="n_action"></td>
            </tr>
            <tr>
                <td>方法名称</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="n_controller"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="sub-btn" value="提交">
                </td>
            </tr>
        </table>
    </form>
</center>