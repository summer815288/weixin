<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/data/wwwroot/default/weixin/public/../application/admin/view/rbac/user_role.html";i:1492666456;}*/ ?>
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
    <form action="<?php echo url('rbac/user_role'); ?>" method="post">
        <table>
            <tr>
                <td>管理员名</td>
                <td><input type="text"  value="<?php echo $userList['user_name'];?>" style="width:200px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" ></td>
            </tr>
            <tr>
                <td>分配角色</td>
                <td>
                    <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): if( count($role)==0 ) : echo "" ;else: foreach($role as $key=>$val): ?>
            <tr>
                <!--<td>&nbsp;<input   type="checkbox"  value="<?php echo $val['role_id']?>"name="role_id[]"><?php echo $val['role_name'];?></td>-->
            <td>
                &nbsp;<input   type="radio"  value="<?php echo $val['role_id']?>"name="role_id[]" <?php if($val['status'] == 1): ?> checked="checked" <?php endif; ?>><?php echo $val['role_name'];?>
            </td>
        </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </td>

            </tr>
            <tr>
                <td>
                    <input type="hidden"  name="user_id" value="<?php echo $userList['user_id'];?>"/>
                    <input type="submit" class="sub-btn" value="提交">
                </td>
            </tr>
        </table>
    </form>
</center>