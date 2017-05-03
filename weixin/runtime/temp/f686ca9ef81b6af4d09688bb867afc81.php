<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/data/wwwroot/default/weixin/public/../application/admin/view/rbac/role_node.html";i:1492666456;}*/ ?>
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
    <form action="<?php echo url('rbac/role_node'); ?>" method="post">
        <table>
            <tr>
                <td>角色名</td>
                <td><input type="text"  value="<?php echo $roleList['role_name'];?>" style="width:200px;height: 32px;line-height: 32px;border-radius: 8px;border:1px solid #ccc;padding-left: 10px;outline: none;" ></td>
            </tr>
            <tr>
                <td>角色赋权</td>

                <td>
                    <?php if(is_array($nodeList) || $nodeList instanceof \think\Collection || $nodeList instanceof \think\Paginator): if( count($nodeList)==0 ) : echo "" ;else: foreach($nodeList as $key=>$val): ?>
                    <tr>
                   <td>&nbsp;<input   type="checkbox"  value="<?php echo $val['n_id']?>"name="n_id[]"><?php echo $val['n_name'];?></td>
                     </tr>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                      </td>

            </tr>
            <tr>
                <td>
                    <input type="hidden"  name="r_id" value="<?php echo $roleList['role_id'];?>"/>
                    <input type="submit" class="sub-btn" value="提交">
                </td>
            </tr>
        </table>
    </form>
</center>