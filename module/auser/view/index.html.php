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
    <p>
        <span>邀请地址:</span><?php
        $app_domain = APP_DOMAIN . $this->createLink('auser', 'register') . "&".RMD_UID."=".$user->id;
        echo html::input("", $app_domain, "id='rmd_input'; style='width:600px;'");
        echo html::a("javascript:void(0)", '复制链接', "id='copyurl'");
        ?>
    </p>
    <p>
        <span>邀请规则，积善网邀请用户注册赠送银两，规则为每邀请一位用户，邀请人与被邀请人都将获得100银两奖励！（如果“复制链接”无效请手动全选复制邀请地址）</span>
    </p>
    <p>
        <span>功德:<?php echo $user->merit_num; ?></span>
    </p>
    <p>
        <span>银两:<?php echo $user->gold_num; ?></span>
    </p>
</div>
<script type="text/javascript">
    $("#copyurl").click(function () {
        copyUrl($("#rmd_input"));
    });
</script>
<?php include '../../common/view/footer.html.php';?>
