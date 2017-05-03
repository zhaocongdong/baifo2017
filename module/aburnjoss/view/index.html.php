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
                    <li class="fo1 active" data-fo="fo1_guanshiyin"></li>
                    <li class="fo2" data-fo="fo2_shijiamoni"></li>
                    <li class="fo3" data-fo="fo3_wenshupusa"></li>
                    <li class="fo4" data-fo="fo4_wenquxingjun"></li>
                    <li class="fo5" data-fo="fo5_yuelao"></li>
                    <li class="fo6" data-fo="fo6_songziguanyin"></li>
                    <li class="fo7" data-fo="fo7_milefo"></li>
                    <li class="fo8" data-fo="fo8_mazu"></li>
                    <li class="fo9" data-fo="fo9_guangong"></li>
                    <li class="fo10" data-fo="fo10_dashizhi"></li>
                    <li class="fo11" data-fo="fo11_caishenye"></li>
                    <li class="fo12" data-fo="fo12_dizangwang"></li>
                    <li class="fo13" data-fo="fo13_amituofo"></li>
                    <li class="fo14" data-fo="fo14_puxian"></li>
                    <li class="fo15" data-fo="fo15_yaoshifo"></li>
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
                <ul></ul>
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
            <div class="layer-make-wish">
                <div class="layer-make-wish-content">
                    <div class="make-wish-or-not">
                        <label>是否许愿：</label>
                        <label><input type="radio" name="make-wish-or-not">许愿</label>
                        <label><input type="radio" name="make-wish-or-not" checked="checked">不许愿</label>
                    </div>
                    <select class="wish-options">
                        <option data-desc="学业猛进，考试顺利！学有所成，学业进步！各金榜题名，无往不利！稳中求胜，成绩满分！考试顺利，如愿高中！">学业猛进，考试顺利！</option>
                        <option data-desc="财源广进、步步高升！横财滚滚，笑逐颜开！一本万利，东成西就！投资有道，年年有余！和气生财，时来运转！猪笼入水，飞黄腾达！">财源广进，步步高升！</option>
                        <option data-desc="长命百岁、寿比南山！快高长大，茁壮成长！身壮力健、福寿双全！老当益壮，寿若松柏！身体安康，健康活力！">长命百岁，寿比南山！</option>
                        <option data-desc="万事如意，合家安康！福寿双全，平安美满！一帆风顺，四季平安！出入平安，事事顺境！风调雨顺，万事大吉！">万事如意，合家安康！</option>
                        <option data-desc="千里姻缘，携手共牵！众里寻他，天造地设！白头到老，永结同心！百年好合，甜蜜幸福！佳偶天成，出双入对！">千里烟缘，携手共牵！</option>
                    </select>
                    <textarea class="wish-content" name="wish-content">学业猛进，考试顺利！学有所成，学业进步！各金榜题名，无往不利！稳中求胜，成绩满分！考试顺利，如愿高中！</textarea>
                    <div class="wish-private-or-not">
                        <label>
                            <input type="radio" name="private-or-not" checked="checked" />保密
                        </label>
                        <label>
                            <input type="radio" name="private-or-not" />不保密
                        </label>
                        <label class="wish-handle">
                            <button type="button" class="wish-confirm"></button>
                            <button type="button" class="wish-cancel"></button>
                        </label>
                    </div>
                </div>
            </div>
            <div class="layer-py-huanyuan-or-not">
                <div class="py-huanyuan-text"></div>
                <div class="py-huanyuan-handle">
                    <button type="button" class="py-huanyuan-confirm"></button>
                    <button type="button" class="py-huanyuan-cancel"></button>
                </div>
            </div>
            <div class="layer-hint-py-huanyuan"></div>
            <div class="layer-hint-tribute"></div>
            <div class="layer-hint-merit"></div>
            <div class="layer-wish-complete"></div>
            <div class="layer-balance-not-enough"></div>
        </div>
    </div>
</div>
<?php include '../../common/view/footer.html.php';?>
