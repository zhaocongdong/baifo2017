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
<style type="text/css">
    .qian_num {
        font-size: 1.25em;
        color: #E74C3C;
    }
    .qian_title {
        color: #E74C3C;
        font-weight: bold;
    }
    .qian_num, .qian p {
        margin-bottom: 10px;
    }
</style>
<div class='container'>
    <div class="content qian">
        <h2 class="qian_num"><?php echo $lot->no; ?></h2>
        <p><span class="qian_title">签名:</span><?php echo $lot->title; ?></p>
        <p><span class="qian_title">吉凶:</span>【<?php echo $lot->jx; ?>】<?php echo $lot->jxexp; ?></p>
        <p><span class="qian_title">解曰:</span><?php echo $lot->exp; ?></p>
        <p><span class="qian_title">诗意:</span><?php echo $lot->poem; ?></p>
        <p><span class="qian_title">典故:</span><?php echo $lot->gu; ?></p>
        <p><span class="qian_title">仙机:</span><?php echo $lot->jie; ?></p></div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
