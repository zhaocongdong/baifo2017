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
    <form method='post'>
        <div>
            <p>
                <span>用户名:</span>
                <?php echo html::input("name");?>
            </p>
            <p>
                <span>密  码:</span>
                <?php echo html::password("password");?>
            </p>
            <p>
                <span>确认密码:</span>
                <?php echo html::password("repwd");?>
            </p>
        </div>
        <div>
            <?php echo html::submitButton("注册") ;?>
            <?php echo html::a($this->createLink('user','login'),"已有账号直接登录");?>
        </div>
        <div style="height:10px;"></div>
    </form>

</div>
<?php include '../../common/view/footer.html.php';?>
