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
    <div class="Regist_Wrapper clearfix">
        <form class="form_Info left clearfix" id="regformdom"
              method="POST">
            <div class="long_Text clearfix LNormal">
                <p class="textBox">
                    <label for="account">帐号名：</label>
                    <input type="text" name="name" nullmsg="账号不能为空！" autocomplete="off">
                </p>
                <p class="prompt">
                    <span class="Validform_checktip">
                        <span class="img">请输入4-32个字符，建议使用邮箱注册。一旦注册成功将不能修改！</span>
                    </span>
                </p>
            </div>
            <div class="long_Text clearfix LNormal">
                <p class="textBox"><label>登录密码：</label>
                    <input type="password" name="password" nullmsg="密码不能为空！" errormsg="密码必须是6-26个字符！" datatype="*6-26">
                </p>
                <p class="prompt">
                    <span class="Validform_checktip">
                        <span class="img">由6-26个英文字母、数字或符号组成。</span>
                    </span>
                </p>
            </div>
            <div class="long_Text clearfix LNormal">
                <p class="textBox">
                    <label>确认密码：</label>
                    <input type="password" name="repwd">
                </p>
                <p class="prompt">
                    <span class="Validform_checktip">
                        <span class="img">请再次输入你的密码！</span>
                    </span>
                </p>
            </div>
            <div class="long_Text clearfix LNormal">
                <p class="textBox">
                    <label><em style="color:red;">*</em>邀请码：</label>
                    <input type="text" name="mycode">
                </p>
                <p class="prompt">
                    <span class="Validform_checktip">
                        <span class="img">请输入邀请码！</span>
                    </span>
                </p>
            </div>
            <div class="agreement">
                <input type="checkbox" checked="checked" name="ckb_agree" > 我已阅读并接受
                <a href="javascript:void(0)" class="xianshi">《拜佛网用户协议》</a>
            </div>
            <input type="submit" class="register_Submit" value="确定注册">
            <div class="shengming" style="display: none;">
                <p>
                    <span style="font-size:14px;color:#262626">&nbsp;&nbsp;&nbsp;&nbsp;在访问和使用“
                        <strong>
                                <span style="color:#262626; font-size:16px; ">拜佛网</span>
                        </strong>
                        ”前，请您务必仔细阅读和透彻理解本条款，并且遵守有关互联网相关法律及本网站的规定与规则。
                    </span>
                    <br>
                    <span style="font-size:14px;color:#262626">在同意“拜佛网”服务协议（“协议”）之时，你已经同意我们按照本隐私申明来使用和披露您的个人信息。本隐私申明的全部条款属于该协议的一部份。
                    </span>
                    <br>
                    <span style="font-size:14px;color:#262626">&nbsp;&nbsp;&nbsp;&nbsp;本网站上关于“拜佛网”平台会员或他们的（联系人及联络信息，相关图片、视讯等）信息均由会员自行提供，会员依法对其提供的任何信息承受全部责任。本网站对策等信息的准确性、完整性、合法性或真实性均不承担任何责任。此外，"拜佛网"对任何使用或提供本网站信息的商业活动及其风险不承担任何责任。
                    </span>
                    <br>
                </p>
                <p>
                    <span style="font-size:14px;color:#262626">&nbsp;&nbsp;&nbsp;&nbsp;特别声明：拜佛网上素材、程序均为原创，未经允许严谨盗用。</span>
                </p>
            </div>
        </form>
    </div>

    <!--    <form method='post'>-->
    <!--        <div>-->
    <!--            <p>-->
    <!--                <span>用户名:</span>-->
    <!--                --><?php //echo html::input("name"); ?>
    <!--            </p>-->
    <!--            <p>-->
    <!--                <span>密  码:</span>-->
    <!--                --><?php //echo html::password("password"); ?>
    <!--            </p>-->
    <!--            <p>-->
    <!--                <span>确认密码:</span>-->
    <!--                --><?php //echo html::password("repwd"); ?>
    <!--            </p>-->
    <!--        </div>-->
    <!--        <div>-->
    <!--            --><?php //echo html::submitButton("注册"); ?>
    <!--            --><?php //echo html::a($this->createLink('auser', 'login'), "已有账号直接登录"); ?>
    <!--        </div>-->
    <!--        <div style="height:10px;"></div>-->
    <!--    </form>-->

</div>
<script type="text/javascript">
    $('.xianshi').click(function (e) {
        $(".Regist_Wrapper").css("height","550px");
        $(".shengming").fadeIn();
    });
</script>
<?php include '../../common/view/footer.html.php'; ?>
