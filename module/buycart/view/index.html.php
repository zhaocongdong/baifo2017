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
            <span>订单提交</span></div>
        <div class="column">
            <ol class="step step_second"><li>查看购物车</li><li>付款到支付宝</li><li>完成订单</li></ol>
            <h2 class="main_title" style="margin:20px 0;">确认收货地址</h2>
            <form class="order_address" action="" method="post" name="form1" id="form1">
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
                        <th style="text-align: center;">宝具名称</th>
                        <th style="text-align: center;">单价(元)</th>
                        <th style="text-align: center;">数量</th>
                        <th style="text-align: center;">小计(元)</th>
                        <th style="text-align: center;">删除</th>
                    </tr>
                    <?php foreach ($cart_list as $item): ?>
                    <tr class="buycar">
                        <td>
                            <img class="now_img" alt="" style="opacity: 1;" src="<?php echo $item->img;?>" rel="<?php echo $item->id;?>">
                            <a href="<?php echo $this->createLink('afostore','detail',array(id=>$item->id));?>" title="<?php echo $item->name;?>"><?php echo $item->name;?></a>
                        </td>
                        <td><span class="now_price" rel="<?php echo $item->id;?>"><?php echo $item->price;?></span></td>
                        <td>
                            <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                <input type="text" value="<?php echo $item->num;?>" name="subject[<?php echo $item->id;?>]" class="buy_num ui-spinner-input" rel="<?php echo $item->id;?>" readonly="" aria-valuemin="0" aria-valuenow="1" autocomplete="off" role="spinbutton">
                            </span>
                        </td>
                        <td><span class="total" rel="<?php echo $item->id;?>"><?php echo $item->sum;?></span></td>
                        <td><a href="javascript:void(0);" class="del-col" rel="<?php echo $item->id;?>">删除</a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="total clearfix"><label>补充说明:</label><textarea class="left" name="remark"></textarea>
                    <div class="right">
                        <p>应付款:
                            <em>¥ <input readonly="" value="<?php echo $item->order_sum;?>" id="total_fee" style="border:none;font-weight: bold;font-size: 28px;color: #C7222F;">元</em>
                        </p>
                        <input type="submit" value="提交订单" class="submit right"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

?>
<script type="text/javascript" >
    function setCookie(name,value,domain,e) {
        var exp = new Date();
        exp.setTime(exp.getTime() + 30*24*60*60*1000);
        if(e===true){
            document.cookie = name + "="+ escape (value) + ";domain="+domain;
        }else{
            document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";domain="+domain;
        }
    }
    function getCookie(name) {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
    function delCookie(name) {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=getCookie(name);
        if(cval!=null){
            document.cookie= name + "="+cval+";expires="+exp.toGMTString()+";domain=.baifo365.com";
        }
    }
    function tongji(){
        var total=0;
        $('.buycar .total').each(function(){
            total+=parseFloat($(this).html());
        });
        total=total.toFixed(2);
        if (total<=0)
        {
            $('.submit').attr('disabled',false);
        }else{
            $('.submit').attr('disabled',true);
        }
        $('#total_fee').val(total);
    }
    $(function(){
        tongji();
        $('.submit').attr('disabled',false);
        new PCAS('province','city','area','','','');
        $(".buy_num").spinner({
            min			: 0,
            spin: function( event, ui ) {
                id=$(this).attr('rel');
                var Num=parseFloat(ui.value);
                var Price=parseFloat($('.now_price[rel='+id+']').html());
                var now_img = $('.now_img[rel='+id+']').attr('src');
                in_buy_car(id,'',Num,Price, now_img,'<?php echo COOKIE_DOMAIN;?>','notips');
                $('.total[rel='+id+']').html((Price*Num).toFixed(2));
                tongji();
            }
        });
        $('.del-col').click(function(){
            var pid=$(this).attr('rel');
            var buycar=getCookie('<?php echo BUY_CART;?>');
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
                setCookie('<?php echo BUY_CART;?>',newbuycar, '<?php echo COOKIE_DOMAIN;?>');
            }
            $(this).parent().parent().remove();
            tongji();
        });
    });

</script>
<?php include '../../zcommon/view/footer.html.php'; ?>
