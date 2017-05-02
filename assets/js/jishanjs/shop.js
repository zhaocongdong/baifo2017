
function setCookie(name,value, domain,e)
{
    var exp = new Date();
    exp.setTime(exp.getTime() + 30*24*60*60*1000);
    if(e===true){
        document.cookie = name + "="+ escape (value) + ";domain="+domain;
    }else{
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";domain="+domain;
    }
}
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}
function delCookie(name, domain)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null){
        document.cookie= name + "="+cval+";expires="+exp.toGMTString()+";domain="+domain;
    }
}
function alert(data,time){
	var dialog = $.dialog({
		title:'提示信息',
		content:'<div>'+data+'</div>'
	});
	dialog.time(2000);
}
function in_buy_car(pid,title,num,price,img,domain,jump){
	var buycar=getCookie('C20c6320e78a769300345e1b');
	if (buycar!==null && buycar!=''){
		buycar=buycar.split('|');
	}else{
		buycar=new Array();
	}
	var has=false;
	for (var i = 0; i < buycar.length; i++) {
		buycar[i]=buycar[i].split(',');
		if (buycar[i][0]==pid){
			buycar[i][2]=num;
			buycar[i][3]=price;
			buycar[i][4]=img;
			has=true;
		}
		buycar[i]=buycar[i].join(',');		
	}
	if (!has){
		buycar.push(pid+','+title+','+num+','+price+','+img);
	}
	buycar=buycar.join('|');
	setCookie('C20c6320e78a769300345e1b',buycar,domain);
	RefreshShopCar();
	if (jump.length > 0){
		if (jump==='notips') {

		} else {
			window.location=jump;
		}
	} else {
		alert('已加入购物车!');
	}
}
function RefreshShopCar(){
	var buycar=getCookie('C20c6320e78a769300345e1b');
	if (buycar!==null){
		buycar=buycar.split('|');
	}else{
		buycar=new Array();
	}
	var num=0;
	for (var i = 0; i < buycar.length; i++) {
		buycar[i]=buycar[i].split(',');
		if (buycar[i][2]!=undefined){
			num+=parseInt(buycar[i][2]);
		}
	}
	var str_buy_cart = '购物车(' + num + ')';
	$('#buycart').html(str_buy_cart);
}