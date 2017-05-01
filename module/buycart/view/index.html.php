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
        <div class="bread_nav"></div>
        <div class="column">
            <ol class="step step_second">
            </ol>
            <h2 class="main_title" style="margin:20px 0;">确认收货地址</h2>
            <form class="order_address" action="shop-readytopay.html" method="post" name="form1" id="form1">
                <fieldset>
                    <label>省:</label>
                    <select name="province" id="province" nullmsg="收件地址不能为空！" errormsg="收件地址不能为空！" datatype="*">
                        <option value="">--省份--</option>
                        <option value="北京市">北京市</option>
                        <option value="天津市">天津市</option>
                        <option value="河北省">河北省</option>
                        <option value="山西省">山西省</option>
                        <option value="内蒙古">内蒙古</option>
                        <option value="辽宁省">辽宁省</option>
                        <option value="吉林省">吉林省</option>
                        <option value="黑龙江省">黑龙江省</option>
                        <option value="上海市">上海市</option>
                        <option value="江苏省">江苏省</option>
                        <option value="浙江省">浙江省</option>
                        <option value="安徽省">安徽省</option>
                        <option value="福建省">福建省</option>
                        <option value="江西省">江西省</option>
                        <option value="山东省">山东省</option>
                        <option value="河南省">河南省</option>
                        <option value="湖北省">湖北省</option>
                        <option value="湖南省">湖南省</option>
                        <option value="广东省">广东省</option>
                        <option value="广西省">广西省</option>
                        <option value="海南省">海南省</option>
                        <option value="重庆市">重庆市</option>
                        <option value="四川省">四川省</option>
                        <option value="贵州省">贵州省</option>
                        <option value="云南省">云南省</option>
                        <option value="西藏">西藏</option>
                        <option value="陕西省">陕西省</option>
                        <option value="甘肃省">甘肃省</option>
                        <option value="青海省">青海省</option>
                        <option value="宁夏">宁夏</option>
                        <option value="新疆">新疆</option>
                        <option value="香港">香港</option>
                        <option value="澳门">澳门</option>
                        <option value="台湾省">台湾省</option>
                        <option value="其它">其它</option>
                    </select> 市:
                    <select name="city" id="city" nullmsg="收件地址不能为空！" errormsg="收件地址不能为空！" datatype="*">
                        <option value="">--城市--</option>
                    </select> 区:
                    <select name="area" id="area" nullmsg="收件地址不能为空！" errormsg="收件地址不能为空！" datatype="*">
                        <option value="">--地区--</option>
                    </select><span class="Validform_checktip"></span></fieldset>
                <fieldset><label>邮政编码:</label><input type="text" name="zipcode" value="" nullmsg="收件地址的邮政编码不能为空！"
                                                     errormsg="收件地址的邮政编码不能为空！" datatype="*"><span
                        class="Validform_checktip"></span></fieldset>
                <fieldset><label>街道地址:</label><textarea name="address" nullmsg="收件人的联系地址不能为空！" errormsg="收件人的联系地址不能为空！"
                                                        datatype="*"></textarea><span class="Validform_checktip"></span>
                </fieldset>
                <fieldset><label>收货人姓名:</label><input type="text" name="realname" value="" nullmsg="收件人的联系姓名不能为空！"
                                                      errormsg="收件人的联系姓名不能为空！" datatype="*2-20"><span
                        class="Validform_checktip"></span></fieldset>
                <fieldset><label>联系电话:</label><input type="text" name="tel" value="" nullmsg="收件人的联系电话不能为空！"
                                                     errormsg="收件人的联系电话不能为空！" datatype="*7-20"><span
                        class="Validform_checktip"></span></fieldset>
                <fieldset><label>联系QQ:</label><input type="text" name="qq" value=""></fieldset>
                <table class="order_info">
                    <caption class="main_title">确认订单信息</caption>
                    <colgroup class="first_col"></colgroup>
                    <colgroup class="second_col" span="4"></colgroup>
                    <tbody>
                    <tr>
                        <th>宝具名称</th>
                        <th>单价(元)</th>
                        <th>数量</th>
                        <th>小计(元)</th>
                        <th>删除</th>
                    </tr>
                    <tr class="buycar">
                        <td><img alt="" style="opacity: 1;" src="/Public/Uploads/Product/54602733848e2.jpg"><a
                                href="shop-1566.html" title="崖柏佛珠">崖柏佛珠</a></td>
                        <td><span class="now_price" rel="1566">80.00</span></td>
                        <td>
                            <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                <input type="text" value="1" name="subject[1566]" class="buy_num ui-spinner-input" rel="1566" readonly="" aria-valuemin="0" aria-valuenow="1" autocomplete="off" role="spinbutton">
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
                        </td>
                        <td><span class="total" rel="1566">80</span></td>
                        <td><a href="javascript:void(0);" class="del-col" rel="1566">删除</a></td>
                    </tr>
                    </tbody>
                </table>
                <div class="total clearfix"><label>补充说明:</label><textarea class="left" name="remark"></textarea>
                    <div class="right"><p>应付款:<em>¥ <input readonly="" value="0.00" id="total_fee"
                                                           style="border:none;font-weight: bold;font-size: 28px;color: #C7222F;">元</em>
                        </p><input type="submit" value="提交订单" class="submit right"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

?>
<script type="text/javascript" >
    $(function(){
        $('.submit').attr('disabled',false);
        new PCAS('province','city','area','','','');
        $(".buy_num").spinner({
            min			: 0,
            spin: function( event, ui ) {
                id=$(this).attr('rel');
                var Num=parseFloat(ui.value);
                var Price=parseFloat($('.now_price[rel='+id+']').html());
                in_buy_car(id,'',Num,Price,'notips');
                $('.total[rel='+id+']').html((Price*Num).toFixed(2));
            }
        });
        $("#form1").Validform({
            tiptype:3,
            showAllError:true
        });
        $('.del-col').click(function(){
            var pid=$(this).attr('rel');
            var buycar=getCookie('buycar');
            var newbuycar=new Array();
            if (buycar!==null){
                buycar=buycar.split('|');
                for (var i = 0; i < buycar.length; i++) {
                    buycar[i]=buycar[i].split(',');
                    if (buycar[i][0]!=pid){
                        newbuycar.push(buycar[i].join(','));
                    }
                }
                newbuycar=newbuycar.join('|');
                setCookie('buycar',newbuycar);
            }
            $(this).parent().parent().remove();
        });
    });
</script>
<?php include '../../zcommon/view/footer.html.php'; ?>
