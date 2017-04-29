<?php
/**
 * The html template file of index method of index module of zentaoPHP.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 *
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */
?>
<?php include '../../zcommon/view/header.html.php';?>
<div class='container'>
    <div class='panel'>
        <div class='panel-heading'>
            <strong> <?php echo $lang->blog->index; echo "用户管理" ?></strong>
            <div class='pull-right'> <?php //echo html::a(inlink('create'), $lang->blog->add, "class='btn btn-primary btn-xs'");?></div>
        </div>
        <table class='table table-list table-hover'>
            <thead>
            <tr>
                <td width='50'>编号</td>
                <td>用户名</td>
                <td class='text-center' width='150'>邮箱</td>
                <td class='text-center' width='120'>手机号</td>
                <td class='text-center' width='120'>操作</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <td class='text-center'><?php echo $user->id;?></td>
                    <td><?php echo $user->name;?></td>
                    <td><?php echo $user->email;?></td>
                    <td>
                        <?php
                        echo html::a($this->createLink('zuser', 'view',   "id=$article->id"), "查看");
//                        echo html::a($this->createLink('zuser', 'edit',   "id=$article->id"), "编辑");
//                        echo html::a($this->createLink('zuser', 'delete', "id=$article->id"), "删除");
                        ?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan='5'>
                    <?php
                    $pager->show('right', 'short');
                    ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php include '../../zcommon/view/footer.html.php';?>
