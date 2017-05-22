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
            <h2 class="main_title"><?php echo empty($good_cate) ?  '最新精品' : $good_cate->cate_name;?></h2>
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
        </div>
        <div class="sidebar">
            <div class="sidebar_content">
                <h3 class="h_title">热门产品</h3>
                <ul class="goods_list">
                    <?php foreach ($hot_list as $goods): ?>
                    <li>
                        <a href="<?php echo $this->createLink('afostore', 'detail', array('id'=>$goods->id));?>" title="<?php echo $goods->goods_name; ?>">
                            <img class="left" alt="<?php echo $goods->goods_name; ?>" style="opacity: 1;" src="<?php echo $goods->goods_img; ?>">
                            <p class="goods_title"><?php echo $goods->goods_name; ?></p>
                            <p class="discount">¥<?php echo $goods->goods_price; ?></p>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php include '../../common/view/footer.html.php'; ?>
