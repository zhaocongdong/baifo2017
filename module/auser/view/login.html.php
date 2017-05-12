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
<?php include '../../common/view/header.html.php'; ?>
<?php
css::import($webRoot . 'module/auser/css/auser.css');
?>
<div class='container'>
    <div class="Login_Wrapper clearfix">
        <form class="form_Info left clearfix" id="logform" method="post">
            <?php echo html::hidden('backurl', $backurl); ?>
            <div class="long_Text clearfix LNormal">
                <p class="textBox">
                    <label>帐号：</label>
                    <input type="text" id="account" name="name" autocomplete="on" >
                </p>
                <p class="prompt">
                    <span class="Validform_checktip"><span class="img">请输入你的账号！</span></span>
                </p>
            </div>
            <div class="long_Text clearfix LNormal">
                <p class="textBox">
                    <label>密码：</label>
                    <input type="password" name="password">
                </p>
                <p class="prompt">
                    <span class="Validform_checktip"><span class="img">请输入你的密码！</span></span>
                </p>
            </div>
            <div class="agreement">
                <input type="checkbox" checked="checked" name="remember_me">下次自动登录
                <a id="resetpwd" >忘记密码点击重置</a>
            </div>
            <input type="submit" class="login_Submit" value="登录">
        </form>
    </div>
    <script type="text/javascript">
        $('#resetpwd').click(function (e) {
            if ($('#account').val() == "") {
                alert("请填写账号!");
                $('#account').focus();
            } else {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo $this->createLink('auser', 'resetpwd'); ?>',
                    data: {name: $('#account').val()},
                    dataType: 'json',
                    success: function (resp){
                        window.alert(resp.msg);
                    }
                });
            }
        });
    </script>
    <!--
    <form method="post">
        <?php //echo html::hidden('backurl', $backurl); ?>
        <p>
            <span>用户名:</span><?php //echo html::input('name'); ?>
        </p>
        <p>
            <span>密  码:</span><?php //echo html::password('password'); ?>
        </p>
        <p>
            <?php //echo html::submitButton('登录'); ?>
        </p>
    </form>
    -->
</div>
<?php include '../../common/view/footer.html.php'; ?>
