<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/data/wwwroot/default/weixin/public/../application/admin/view/rbac/role.html";i:1492484428;}*/ ?>
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
    <form action="<?php echo url('rbac/roleto'); ?>" method="post">
    <table>
        <tr>
            <td>角色名</td>
            <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="role_name"></td>
        </tr>
        <tr>
            <td>角色描述</td>
            <td><input type="text" style="width:400px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" name="role_note"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" class="sub-btn" value="提交">
            </td>
        </tr>
    </table>
    </form>
</center>