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
    <div class="content">
        <div class="aburnjoss-container">
            <div class="fo-lists-container">
                <ul class="fo-lists">
                    <li class="fo1 active"></li>
                    <li class="fo2"></li>
                    <li class="fo3"></li>
                    <li class="fo4"></li>
                    <li class="fo5"></li>
                    <li class="fo6"></li>
                    <li class="fo7"></li>
                    <li class="fo8"></li>
                    <li class="fo9"></li>
                    <li class="fo10"></li>
                    <li class="fo11"></li>
                    <li class="fo12"></li>
                    <li class="fo13"></li>
                    <li class="fo14"></li>
                    <li class="fo15"></li>
                </ul>
                <div class="fo-handle">
                    <input type="button" class="arrow-left" />
                    <input type="button" class="arrow-right" />
                </div>
                <ul class="fo-sample-container">
                    <li id="sample-type01"></li>
                    <li id="sample-type02"></li>
                    <li id="sample-type03"></li>
                    <li id="sample-type04"></li>
                    <li id="sample-type05"></li>
                    <li id="sample-type06"></li>
                    <li id="sample-type07"></li>
                    <li id="sample-type08"></li>
                    <li id="sample-type09"></li>
                    <li id="sample-type10"></li>
                </ul>
            </div>
            <div class="tribute-lists-container">
                <div class="tribute-lists-bg">
                    <div class="tribute-lists-nav">
                        <span class="nav01 active"></span>
                        <span class="nav02"></span>
                        <span class="nav03"></span>
                        <span class="nav04"></span>
                        <span class="nav05"></span>
                        <span class="nav06"></span>
                        <span class="nav07"></span>
                        <span class="nav08"></span>
                        <span class="nav09"></span>
                        <span class="nav10"></span>
                        <span class="nav11"></span>
                    </div>
                    <ul class="tribute-lists">
                    </ul>
                </div>
                <div class="tribute-handle">
                    <input type="button" class="arrow-left" />
                    <input type="button" class="arrow-right" />
                </div>
                <div class="tribute-confirm-submit">
                    <p></p>
                    <input type="button" value="" title="确认上香" />
                </div>
            </div>
            <div class="py-huanyuan"></div>
            <div class="draw-pot"></div>
            <div class="merit-box"></div>
            <div class="layer-block"></div>
            <div class="layer-py-huanyuan">
                <ul>
                    <li>暂无许愿信息</li>
                </ul>
                <a class="layer-py-huanyuan-close" href="javascirpt:void(0)"></a>
            </div>
            <div class="layer-merit-box">
                <input type="text" class="input-merit-amount" value="100"/>
                <input type="button" class="confirm-merit-amount" />
                <input type="button" class="close-layer-merit" />
            </div>
            <div class="layer-draw-pot">
                <img src="./assets/images/aburnjoss/draw-pot-1.gif" class="draw-status draw-start" />
                <img src="./assets/images/aburnjoss/draw-pot-2.gif" class="draw-status draw-over" />
                <div class="draw-result">
                    <p class="draw-number">第肆拾肆签</p>
                    <h4 class="draw-title">姜维邓艾斗阵</h4>
                    <div class="draw-content">
                        <p>棋逢敌手着相宜<br/>，黑白盘中未决时</p>
                        <p>皆因一着知胜败<br/>，须教自有好推宜</p>
                    </div>
                    <a href="javascript:void(0)" class="layer-draw-close"></a>
                </div>
            </div>
            <div class="layer-hint-py-huanyuan"></div>
            <div class="layer-hint-tribute"></div>
            <div class="layer-hint-merit"></div>
        </div>
    </div>
</div>
<?php include '../../common/view/footer.html.php';?>
