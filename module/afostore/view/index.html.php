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
    <div class="column">
        <div class="main main_list">
            <h2 class="main_title">最新精品</h2>
            <ul class="clearfix">
                <?php foreach($all_goods as $goods):?>
                <li class="acc_adv_li">
                    <dl>
                        <dt class="item1">
                            <a href="<?php echo $this->createLink('afostore', 'detail', array('id'=>$goods->id));?>" target="_blank">
                                <img alt="<?php echo $goods->goods_name;?>" style="opacity: 1;" src="<?php echo $goods->goods_img;?>">
                            </a>
                        </dt>
                        <dd class="item2">
                            <a href="<?php echo $this->createLink('afostore', 'detail', array('id'=>$goods->id));?>" target="_blank"><?php echo $goods->goods_name;?></a>
                        </dd>
                        <dd class="item3">
                            <em class="discount">价格：¥<?php echo $goods->goods_price;?></em>
                        </dd>
                    </dl>
                </li>
                <?php endforeach;?>
            </ul>
            <p class="page">
                <?php
                    $pager->show('right', 'short');
                ?>
            </p>
            <!--
            <p class="page">   &nbsp;<span class="current">1</span>&nbsp;<a href="/Shop.html?&amp;p=2">&nbsp;2&nbsp;</a>&nbsp;<a
                    href="/Shop.html?&amp;p=3">&nbsp;3&nbsp;</a>&nbsp;<a href="/Shop.html?&amp;p=4">&nbsp;4&nbsp;</a>&nbsp;<a
                    href="/Shop.html?&amp;p=5">&nbsp;5&nbsp;</a>&nbsp;<a href="/Shop.html?&amp;p=6">&nbsp;6&nbsp;</a> <a
                    href="/Shop.html?&amp;p=9">...9</a> <a href="/Shop.html?&amp;p=2">下一页</a>
            </p>
            -->
        </div>
        <div class="sidebar">
            <div class="sidebar_content"><h3 class="h_title">热门产品</h3>
                <ul class="goods_list">
                    <li><a href="Shop-1397.html" title="黄金木佛珠"><img class="left" alt="黄金木佛珠" style="opacity: 1;"
                                                                    src="/Public/Uploads/Product/51f74b0f39387.jpg">
                            <p class="goods_title">黄金木佛珠</p>
                            <p class="discount">¥98.00</p></a></li>
                    <li><a href="Shop-1399.html" title="香柏木佛珠"><img class="left" alt="香柏木佛珠" style="opacity: 1;"
                                                                    src="/Public/Uploads/Product/51e64d0394c5f.jpg">
                            <p class="goods_title">香柏木佛珠</p>
                            <p class="discount">¥80.00</p></a></li>
                    <li><a href="Shop-1402.html" title="小叶红檀佛珠"><img class="left" alt="小叶红檀佛珠" style="opacity: 1;"
                                                                     src="/Public/Uploads/Product/51e657a776417.jpg">
                            <p class="goods_title">小叶红檀佛珠</p>
                            <p class="discount">¥60.00</p></a></li>
                    <li><a href="Shop-1405.html" title="黄金木佛珠"><img class="left" alt="黄金木佛珠" style="opacity: 1;"
                                                                    src="/Public/Uploads/Product/51e659f389544.jpg">
                            <p class="goods_title">黄金木佛珠</p>
                            <p class="discount">¥40.00</p></a></li>
                    <li><a href="Shop-1411.html" title="紫罗兰木佛珠"><img class="left" alt="紫罗兰木佛珠" style="opacity: 1;"
                                                                     src="/Public/Uploads/Product/51e6674b98968.jpg">
                            <p class="goods_title">紫罗兰木佛珠</p>
                            <p class="discount">¥28.00</p></a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php include '../../common/view/footer.html.php'; ?>
