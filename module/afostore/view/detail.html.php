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
css::import($webRoot . 'module/afostore/css/fostore.css');
?>

<div class='container'>
    <div class="content clearfix">
        <div class="bread_nav">
            <?php echo html::a($this->createLink('afostore'),     "拜佛商城"); ?>&nbsp;&gt;&nbsp;
            <?php echo $goods->goods_name; ?>
        </div>
        <div class="main main_list">
            <div class="goods clearfix">
                <img alt="<?php echo $goods->goods_name; ?>" style="opacity: 1;" src="<?php echo $goods->goods_img; ?>">
                <form method="POST" name="form1" id="form1" action="shop-confirmorder.html">
                    <input type="hidden" name="pid" value="1568">
                    <ul class="goods_description">
                        <li><h3 class="goods_title"><?php echo $goods->goods_name; ?></h3></li>
                        <li><span class="tb-metatit">价格:</span><em class="discount">¥<?php echo sprintf("%.2f", $goods->goods_price); ?>元</em><span class="baoyou">包邮</span></li>
                        <li><span class="tb-metatit">销量:</span><?php echo $goods->sale_num; ?></li>
                        <li>
                            <span class="tb-metatit">数量:</span>
                            <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                <input type="text" name="buy_num" id="buy_num" value="1" class="goods_num ui-spinner-input" readonly="" aria-valuemin="0" aria-valuenow="1" autocomplete="off" role="spinbutton">
                                <a class="ui-spinner-button ui-spinner-up ui-corner-tr ui-button ui-widget ui-state-default ui-button-text-only" tabindex="-1" role="button" aria-disabled="false">
                                    <span class="ui-button-text">
                                        <span class="ui-icon ui-icon-triangle-1-n">▲</span>
                                    </span>
                                </a>
                                <a class="ui-spinner-button ui-spinner-down ui-corner-br ui-button ui-widget ui-state-default ui-button-text-only" tabindex="-1" role="button" aria-disabled="false">
                                    <span class="ui-button-text">
                                        <span class="ui-icon ui-icon-triangle-1-s">▼</span>
                                    </span>
                                </a>
                            </span>
                        </li>
                        <li>
                            <span class="tb-metatit">总价:</span>
                            <input type="text" readonly="" name="totalnum" id="totalnum" value="<?php echo $goods->goods_price; ?>">
                        </li>
                        <li>
                            <input type="button" value="立刻购买" class="submit" onclick="in_buy_car(1568,'花奇楠佛珠',$('#buy_num').val(),'88.00',true);">
                            <input type="button" value="加入购物车" class="submit" onclick="in_buy_car(1568,'花奇楠佛珠',$('#buy_num').val(),'88.00');"></li>
                    </ul>
                </form>
            </div>
            <div class="goods_details"><h2 class="main_title">商品详情</h2>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px">【产品名称】<?php echo $goods->goods_name; ?></span></p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px"><br></span></p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px">【产品规格】<?php echo $goods->goods_guige; ?></span><br></p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px"><br></span></p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px">【产品用途】</span><span
                        style="font-family:tahoma, arial, 宋体;font-size:14px;background-color:#ffffff"><span
                            style="font-family:tahoma, arial, 宋体;font-size:14px;background-color:#ffffff"><?php echo $goods->goods_use; ?></span></span>
                </p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px"><br></span></p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span style="font-size:14px">【产品描述】</span>
                    <span style="color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;background-color:#ffffff"><?php echo $goods->goods_description; ?></span>
                </p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span
                        style="color:#333333;font-family:arial, 宋体, sans-serif;font-size:16px;background-color:#ffffff"><span
                            style="color:#333333;font-family:宋体, tahoma, sans-serif;font-size:14px;background-color:#ffffff"><br></span></span>
                </p>
                <p style="border:none; margin-top:10px; margin-bottom:0px; padding:0px 10px; color:#333333; font-size:0.875em; text-indent:2em; font-family:宋体, tahoma, sans-serif; white-space:normal; background-color:#ffffff;">
                    <span
                        style="color:#333333;font-family:arial, 宋体, sans-serif;font-size:16px;background-color:#ffffff"><span
                            style="color:#333333;font-family:宋体, tahoma, sans-serif;font-size:14px;background-color:#ffffff">【细节展示】</span><br></span>
                </p>
                <?php foreach($all_goods_img as $img):?>
                <p>
                    <img src="<?php echo $img->path;?>" border="0" style="border:0px; margin:0px; padding:0px; font-family:宋体, tahoma, sans-serif; line-height:24px; white-space:normal;">&nbsp;&nbsp;&nbsp;<br>
                </p>
                <p><br></p>
                <p>&nbsp;&nbsp;</p>
                <p><br></p>
                <?php endforeach;?>
            </div>
        </div>
        <div class="sidebar">
            <div class="sidebar_content"><h3 class="h_title">推荐产品</h3>
                <ul class="list">
                    <?php foreach($rmd_goods_list as $rmd_goods):?>
                        <li><a href="<?php echo $this->createLink('afostore', 'detail', array('id'=>$rmd_goods->id));?>" class="left" title="<?php echo $rmd_goods->goods_name;?>"><?php echo $rmd_goods->goods_name;?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="sidebar_content"><h3 class="h_title">产品分类</h3>
                <ul class="list">
                    <?php foreach($goods_cate_list as $goods_cate):?>
                        <li><a href="<?php echo $this->createLink('afostore', 'index', array('cate_id'=>$goods_cate->id));?>" class="left" title="<?php echo $goods_cate->cate_name;?>"><?php echo $goods_cate->cate_name;?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
