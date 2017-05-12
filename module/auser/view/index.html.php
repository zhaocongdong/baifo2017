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
<style type="text/css">
    .user_main {
        width: 75%;
        height: auto!important;
        padding: 20px;
        margin: 0 auto;
        line-height: 40px;
        background: #fafafa;
        border: 1px solid #ccc;
    }
    .user_main p span em {
        color: #FF0000;
        font-weight:bold;
    }
</style>
<div class='container'>
    <div class="user_main" >
        <p>
            <span style="color: #FF0000;">邀请地址:</span><?php
            $app_domain = APP_DOMAIN . $this->createLink('auser', 'register') . "&".RMD_UID."=".$user->id;
            echo html::input("", $app_domain, "id='rmd_input'; style='width:500px;'");
            echo html::a("javascript:void(0)", '复制链接', "id='copyurl'");
            ?>
        </p>
        <p>
            <span style="color: #FF0000;">邀请规则，积善网邀请用户注册赠送银两，规则为每邀请一位用户，邀请人与被邀请人都将获得100银两奖励！（如果“复制链接”无效请手动全选复制邀请地址）</span>
        </p>
        <p>
            <span>功德:<em><?php echo $user->merit_num; ?></em></span>
        </p>
        <p>
            <span>银两:<em><?php echo $user->gold_num; ?></em></span>
        </p>
    </div>
</div>
<script type="text/javascript">
    $("#copyurl").click(function () {
        copyUrl($("#rmd_input"));
    });
</script>
<?php include '../../common/view/footer.html.php';?>
