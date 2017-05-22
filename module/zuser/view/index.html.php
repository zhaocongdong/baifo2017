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
                <td>功德</td>
                <td>银两</td>
                <td>注册时间</td>
                <td>上次登录</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <td class='text-center'><?php echo $user->id;?></td>
                    <td><?php echo $user->name;?></td>
                    <td><?php echo $user->merit_num;?></td>
                    <td><?php echo $user->gold_num;?></td>
                    <td><?php echo $user->register_time;?></td>
                    <td><?php echo $user->last_time;?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan='6'>
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
