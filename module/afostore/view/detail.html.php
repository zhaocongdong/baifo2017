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
            <div class="sidebar_content"><h3 class="h_title">产品分类</h3>
                <ul class="list">
                    <li><a href="shop.html?cid=19" class="left" title="佛珠">佛珠</a></li>
                    <li><a href="shop.html?cid=20" class="left" title="挂件">挂件</a></li>
                    <li><a href="shop.html?cid=22" class="left" title="摆设">摆设</a></li>
                    <li><a href="shop.html?cid=23" class="left" title="转经轮系列">转经轮系列</a></li>
                    <li><a href="shop.html?cid=24" class="left" title="佛塔坛城类">佛塔坛城类</a></li>
                    <li><a href="shop.html?cid=25" class="left" title="小精品类">小精品类</a></li>
                    <li><a href="shop.html?cid=26" class="left" title="佛像类">佛像类</a></li>
                    <li><a href="shop.html?cid=27" class="left" title="挥洒">挥洒</a></li>
                    <li><a href="shop.html?cid=28" class="left" title="方位改运类">方位改运类</a></li>
                    <li><a href="shop.html?cid=29" class="left" title="综合佛品类">综合佛品类</a></li>
                    <li><a href="shop.html?cid=30" class="left" title="护身金卡\护身符类">护身金卡\护身符类</a></li>
                    <li><a href="shop.html?cid=31" class="left" title="综合佛品系列">综合佛品系列</a></li>
                    <li><a href="shop.html?cid=32" class="left" title="琉璃挂件">琉璃挂件</a></li>
                    <li><a href="shop.html?cid=37" class="left" title="开光灵符">开光灵符</a></li>
                </ul>
            </div>
            <div class="sidebar_content"><h3 class="h_title">热门产品</h3>
                <ul class="list">
                    <li><a href="Shop-1397.html" class="left" title="黄金木佛珠">黄金木佛珠</a></li>
                    <li><a href="Shop-1399.html" class="left" title="香柏木佛珠">香柏木佛珠</a></li>
                    <li><a href="Shop-1402.html" class="left" title="小叶红檀佛珠">小叶红檀佛珠</a></li>
                    <li><a href="Shop-1405.html" class="left" title="黄金木佛珠">黄金木佛珠</a></li>
                    <li><a href="Shop-1411.html" class="left" title="紫罗兰木佛珠">紫罗兰木佛珠</a></li>
                </ul>
            </div>
            <div class="sidebar_content"><h3 class="h_title">推荐产品</h3>
                <ul class="list">
                    <li><a href="shop-1402.html" class="left" title="小叶红檀佛珠">小叶红檀佛珠</a></li>
                    <li><a href="shop-1405.html" class="left" title="黄金木佛珠">黄金木佛珠</a></li>
                    <li><a href="shop-1415.html" class="left" title="酸枝提珠">酸枝提珠</a></li>
                    <li><a href="shop-1481.html" class="left" title="莲花生大士护身符">莲花生大士护身符</a></li>
                    <li><a href="shop-1511.html" class="left" title="金刚萨垛(大)">金刚萨垛(大)</a></li>
                </ul>
            </div>
            <div class="sidebar_content"><h3 class="h_title">新品推荐</h3>
                <ul class="list">
                    <li><a href="Shop-1499.html" class="left" title="琉璃骑龙观音">琉璃骑龙观音</a></li>
                    <li><a href="Shop-1509.html" class="left" title="绿度母">绿度母</a></li>
                    <li><a href="Shop-1556.html" class="left" title="驾驶避祸平安符">驾驶避祸平安符</a></li>
                    <li><a href="Shop-1560.html" class="left" title="经文同步祥云念佛机">经文同步祥云念佛机</a></li>
                    <li><a href="Shop-1563.html" class="left" title="血龙木佛珠">血龙木佛珠</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
