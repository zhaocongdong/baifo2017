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
    <div class="afreeanimal-container">
        <canvas id="scene-canvas"></canvas>
        <canvas id="scene-grass-canvas"></canvas>
        <div class="top-user-handle-bar">
            <div class="user-info">
                <img alt="" src="./assets/images/aburnjoss/user-default.jpg" class="user-head-default" />
                <p class="nickname">昵称：未登录</p>
                <p class="title">称呼：初级施主</p>
                <p class="balance">银两：0两</p>
            </div>
            <div class="user-handle">
                <button class="pop-layer-purchase"></button>
                <button class="pop-layer-scene"></button>
                <button class="pop-layer-repository"></button>
            </div>
        </div>
        <div class="animal-farm"></div>
        <div class="layer-release-animal">
            <p>提示：</p>
            <p>心中默念三遍：我叫某某某，出生于某年某月某日，从事什么工作，今天我来放生。</p>
            <p>心中默念三皈依三遍：皈依佛，皈依法，皈依憎。皈依佛不堕地狱，皈依法不堕饿鬼，皈依憎不堕畜生。</p>
            <input type="button" class="animal-release-button" />
        </div>
        <div class="layer-animal-shop">
            <button class="button-close-layer"></button>
            <div class="animal-type-nav">
                <span class="animal-type-1"></span>
                <span class="animal-type-2"></span>
                <span class="animal-type-3"></span>
            </div>
            <ul class="animal-lists animal-lists-type-1 active">
                <li class="animal-1 animal-hamster" data-name="hamster">
                    <label>仓鼠</label>
                    <span>银两:20</span>
                </li>
                <li class="animal-2 animal-rabbit" data-name="rabbit">
                    <label>玉兔</label>
                    <span>银两:20</span>
                </li>
                <li class="animal-3 animal-goose" data-name="goose">
                    <label>鹅</label>
                    <span>银两:25</span>
                </li>
                <li class="animal-4 animal-sea-otter" data-name="seaotter">
                    <label>海獭</label>
                    <span>银两:30</span>
                </li>
                <li class="animal-5 animal-deer" data-name="deer">
                    <label>梅花鹿</label>
                    <span>银两:60</span>
                </li>
                <li class="animal-6 animal-koala" data-name="koala">
                    <label>树懒</label>
                    <span>银两:50</span>
                </li>
                <li class="animal-7 animal-flamingo" data-name="flamingo">
                    <label>火烈鸟</label>
                    <span>银两:80</span>
                </li>
            </ul>
            <ul class="animal-lists animal-lists-type-2">
                <li class="animal-8 animal-koi" data-name="koi">
                    <label>锦鲤</label>
                    <span>银两:15</span>
                </li>
                <li class="animal-9 animal-mandarinduck" data-name="mandarinduck">
                    <label>鸳鸯</label>
                    <span>银两:40</span>
                </li>
            </ul>
            <ul class="animal-lists animal-lists-type-3">
                <li class="animal-10 animal-dove" data-name="dove">
                    <label>白鸽</label>
                    <span>银两:15</span>
                </li>
                <li class="animal-11 animal-pigeon" data-name="pigeon">
                    <label>灰鸽</label>
                    <span>银两:40</span>
                </li>
            </ul>
            <div class="animal-show-container"></div>
            <div class="animal-handle-container">
                <div>
                    <p class="hl1"><span class="is-not-selected">请选择放生动物</span><span class="animal-name">名称：</span></p>
                    <p class="animal-count">数量：<input type="text" value="0" /><label class="count-handle-box"><i class="plus-button"></i><i class="minus-button"></i></label></p>
                    <p class="animal-cost">银两：<span>0</span></p>
                </div>
                <div class="slogan">
                    <p>说明：愿以此功德，庄严佛净土，上报四重恩，下济三途苦，若有见闻者，悉发菩提心，尽此一报身，同生极乐国</p>
                </div>
                <input type="button" class="animal-purchase-button" value="" />
            </div>
        </div>
        <div class="layer-scene-shop">
            <button class="button-close-layer"></button>
            <ul class="scene-shop-list">
            </ul>
        </div>
        <div class="layer-user-repository">
            <button class="repository-left"></button>
            <button class="repository-right"></button>
            <div class="repository-list">
                <ul>
                    <li></li>
                </ul>
            </div>
            <button class="button-close-layer"></button>
        </div>
        <div class="layer-block-transparent"></div>
    </div>
</div>
<script src="./assets/js/cocos2d-js-v3.13-lite.js"></script>
<?php include '../../common/view/footer.html.php';?>
