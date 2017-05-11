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
<?php include '../../common/view/header.html.php';?>
<div class='container'>
    <form method="post">
        <?php echo html::hidden('backurl', $backurl);?>
        <p>
            <span>用户名:</span><?php echo html::input('name');?>
        </p>
        <p>
            <span>密  码:</span><?php echo html::password('password');?>
        </p>
        <p>
            <?php echo html::submitButton('登录'); ?>
        </p>
    </form>
</div>
<?php include '../../common/view/footer.html.php';?>
