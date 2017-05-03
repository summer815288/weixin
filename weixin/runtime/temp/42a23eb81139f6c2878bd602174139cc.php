<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/data/wwwroot/default/weixin/public/../application/admin/view/rbac/user.html";i:1492602614;}*/ ?>
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
    <form action="<?php echo url('rbac/userto'); ?>" method="post">
        <table>

            <tr>
                <td>管理员名</td>
                <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="user_name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="user_pwd"></td>
            </tr>
            <tr>
                <td>确定密码</td>
                <td><input type="password" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="user_pwds"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="sub-btn" value="提交">
                </td>
            </tr>
        </table>
    </form>
</center>