var lastTime = 0;
var vendors = ['webkit', 'moz'];
for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
    window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
    window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] ||    // Webkit中此取消方法的名字变了
                                  window[vendors[x] + 'CancelRequestAnimationFrame'];
}

if (!window.requestAnimationFrame) {
    window.requestAnimationFrame = function(callback, element) {
        var currTime = new Date().getTime();
        var timeToCall = Math.max(0, 16.7 - (currTime - lastTime));
        var id = window.setTimeout(function() {
            callback(currTime + timeToCall);
        }, timeToCall);
        lastTime = currTime + timeToCall;
        return id;
    };
}
if (!window.cancelAnimationFrame) {
    window.cancelAnimationFrame = function(id) {
        clearTimeout(id);
    };
}

var fnLoading = function(images,callback){
    var queue = images.slice(0);
    queue.forEach(function(item,index){
        item.onload = function(){
            queue.splice(index,1);
        };
        item.onerror = function(){
            throw Error("图片地址不正确,请确认数据格式正确并且没有缺少数据");
        }
    });
    var complete = function(){
        callback();
    };
    var loading = function(){
        var _interval = setInterval(function(){
            if(queue.length === 0){
                clearInterval(_interval);
                complete();
            }else{
                if(queue[0].width > 0){
                    queue.splice(0,1);
                }
            }
        },40)
    }
    loading();
}
var GifElement = function(parent,elm){
    this.parent = parent;
    this.elm = elm;
    this.ctx = elm.getContext("2d");
    this.imgs = [];
};
GifElement.prototype = {
    status:"dead",
    load : function(data){
        var _this = this;
        for(var i = 0,len = data.frames;i < len;i++){
            var _img = document.createElement("img");
            _img.src = data.src + (i+1) + data.extension;
            this.imgs.push(_img);
        }
        this.swidth = data.swidth;
        this.sheight = data.sheight;
        this.width = data.width;
        this.height = data.height;
        this.elm.width = data.width;
        this.elm.height = data.height;
        this.frames = data.frames;
        this.frameRate = 1000 / data.frameRate;

        fnLoading(this.imgs,function(){
            _this.loading = true;
            _this.parent.appendChild(_this.elm);
            setTimeout(function(){
                _this.run()
            },100);
        });
    },
    run:function(){
        if(this.loading){
            this.status = "live";
            this.elm.classList.add("active");
            this.render(0);
        }
    },
    stop:function(){
        this.status = "dead";
        this.elm.classList.remove("active");
    },
    render : function(n){
        var _this = this;
        _this.ctx.clearRect(0,0,_this.width,_this.height);
        _this.ctx.drawImage(_this.imgs[n],0,0,_this.swidth,_this.sheight,0,0,_this.width,_this.height);

        if(_this.frames > 1 && _this.status === "live"){
            setTimeout(function(){
                n++;
                if(n === _this.frames){
                    n = 0;
                }
                _this.render(n);
            },_this.frameRate);
        }
    }
};

var fnDoubleDigit = function(n){
    return ("0" + n).substr(-2,2);
};

var AnimalList = {
    "hamster":{
        price:20,
        frames:55,
        moveFrames:55
    },
    "rabbit":{
        price:20,
        frames:18,
        moveFrames:55
    },
    "goose":{
        price:25,
        frames:12,
        moveFrames:55
    },
    "seaotter":{
        price:30,
        frames:14,
        moveFrames:55
    },
    "deer":{
        price:60,
        frames:23,
        moveFrames:55
    },
    "koala":{
        price:50,
        frames:33,
        moveFrames:55
    },
    "flamingo":{
        price:80,
        frames:9,
        moveFrames:55
    }
}

var AnimalManifest = {
    "hamster":{
        stay:["./assets/images/afreeanimal/mouse/mouse"],
        move:["./assets/images/afreeanimal/mouse/mouse2_"]
    },
    "goose":{
        stay:["./assets/images/afreeanimal/goose/goose"],
        move:["./assets/images/afreeanimal/goose/goose2_"]
    },
    "seaotter":{
        stay:["./assets/images/afreeanimal/seaotter/seaotter"],
        move:["./assets/images/afreeanimal/seaotter/seaotter2_"]
    },
    "rabbit":{
        stay:["./assets/images/afreeanimal/rabbit/rabbit"],
        move:["./assets/images/afreeanimal/rabbit/rabbit2_"]
    },
    "deer":{
        stay:["./assets/images/afreeanimal/sikadeer/sikadeer"],
        move:["./assets/images/afreeanimal/sikadeer/sikadeer2_"]
    },
    "koala":{
        stay:["./assets/images/afreeanimal/koala/koala"],
        move:["./assets/images/afreeanimal/koala/koala2_"]
    },
    "flamingo":{
        stay:["./assets/images/afreeanimal/flamingo/flamingo"],
        move:["./assets/images/afreeanimal/flamingo/flamingo2_"]
    }
}

var userId = $("#userid").val();
var dataController = {
    purchaseAnimal:function(name,number,amount){
        $.post("index.php?m=afreeanimal&f=opAnimal",{"uid":userId,"name":name,"is_buy":1,"num":number,"total":amount},function(res){
            console.log(res);
        });
    },
    releaseAnimal:function(name){
        $.post("index.php?m=afreeanimal&f=opAnimal",{"uid":userId,"name":name,"is_buy":0,"num":-1,"total":0},function(res){
            console.log(res);
        });
    }
}

var deepCopy = function(obj){
    var newObj = {}
    for(var i in obj){
        newObj[i] = obj[i];
    }
    return newObj;
}
var AFreeAnimal = {
    selectedName:"",
    selectedCount:1,
    selectedUnitPrice:20,
    animalList:{},
    oLayerBlockTrans:null,
    totalAmount:0,
    onDisplayAnimal :function(){
        var _this = this;
        var oAnimalLists = $(".animal-lists li");
        var oAnimalDisplayContainer = $(".animal-show-container");
        var oAnimalName = $(".animal-name");
        var oInputAnimalCount = $(".animal-count input");
        var oAnimalTotalPrice = $(".animal-cost span");
        oAnimalLists.each(function(){
            var $this = $(this);
            $this.bind("click",function(){
                var sAnimalName = $this.attr("data-name");
                if(_this.selectedName != sAnimalName){
                    _this.selectedCount = 1;
                    _this.selectedUnitPrice = AnimalList[sAnimalName].price;
                    oAnimalName.html("名称："+$this.find("label").html()).show();
                    oInputAnimalCount.val(_this.selectedCount);
                    oAnimalTotalPrice.html(_this.selectedUnitPrice);

                    if(_this.runningAnimal){
                        _this.runningAnimal.stop();
                    }else{
                        $(".is-not-selected").hide();
                        _this.onCountHandle();
                    }
                    if(_this.animalList[sAnimalName]){
                        _this.animalList[sAnimalName].stay();
                    }else{
                        var _animal = new Animal(sAnimalName,100,70);
                        _animal.setStayFrames(AnimalList[sAnimalName].frames,150);
                        _animal.setMoveFrames(AnimalList[sAnimalName].moveFrames,150)
                        _animal.load(AnimalManifest[sAnimalName]);
                        _animal.setImageZoom(0,0,650,488);
                        _this.animalList[sAnimalName] = _animal;
                        oAnimalDisplayContainer.append(_animal.o);
                    }
                    _this.runningAnimal = _this.animalList[sAnimalName];
                }
                _this.selectedName = sAnimalName;
            });
        });
    },
    onCountHandle:function(){
        var _this = this;
        var oPlusButton = $(".plus-button");
        var oMinusButton = $(".minus-button");
        var oInputAnimalCount = $(".animal-count input");
        var oAnimalTotalPrice = $(".animal-cost span");
        var nPriceCount;
        oPlusButton.bind("click",function(){
            _this.selectedCount++;
            nPriceCount = _this.selectedUnitPrice * _this.selectedCount;
            oInputAnimalCount.val(_this.selectedCount);
            oAnimalTotalPrice.html(nPriceCount);
            _this.totalAmount = nPriceCount;
        });
        oMinusButton.bind("click",function(){
            if(_this.selectedCount > 0){
                _this.selectedCount--;
                nPriceCount = _this.selectedUnitPrice * _this.selectedCount;
                oInputAnimalCount.val(_this.selectedCount);
                oAnimalTotalPrice.html(nPriceCount);
                _this.totalAmount = nPriceCount;
            }
        });
    },
    animalInFarm:{
        length:0
    },
    onPurchaseAnimal:function(){
        var _this = this;
        var oPurchaseAnimalButton = $(".animal-purchase-button");
        var oLayerAnimalShop = $(".layer-animal-shop");
        var oAnimalFarm = $(".animal-farm");
        var nMaxLeft = oAnimalFarm.width();
        var nMaxTop = oAnimalFarm.height();

        oPurchaseAnimalButton.bind("click",function(){
            for(var i = 0;i < _this.selectedCount;i++){
                var newAnimal = deepCopy(_this.runningAnimal);
                newAnimal.init();
                newAnimal.setImageZoom(162,122,325,244);
                var x = Math.round(Math.random() * nMaxLeft) - 65;
                var y = Math.round(Math.random() * nMaxTop) - 45;
                newAnimal.randomRender(x,y);
                _this.animalInFarm["id-"+_this.animalInFarm.length] = newAnimal;
                newAnimal.o.id = "id-"+_this.animalInFarm.length;
                oAnimalFarm.append(newAnimal.o);
                _this.animalInFarm.length++;
            }
            dataController.purchaseAnimal(_this.selectedName,1,_this.selectedCount,_this.totalAmount);
            _this.oLayerBlockTrans.fadeOut();
            oLayerAnimalShop.fadeOut();
        });
    },
    onEnterPurchaseShop:function(){
        var _this = this;
        var oLayerAnimalShop = $(".layer-animal-shop");
        var oButtonEnterAnimalShop = $(".pop-layer-purchase");
        var oButtonClosePurchaseLayer = $(".layer-animal-shop .button-close-layer");
        oButtonEnterAnimalShop.bind("click",function(){
            _this.oLayerBlockTrans.fadeIn();
            oLayerAnimalShop.fadeIn();
        });
        oButtonClosePurchaseLayer.bind("click",function(){
            _this.oLayerBlockTrans.fadeOut();
            oLayerAnimalShop.fadeOut();
        });
    },
    onEnterSceneShop:function(){
        var _this = this;
        var oButtonEnterSceneShop = $(".pop-layer-scene");
        var oLayerSceneShop = $(".layer-scene-shop");
        var oButtonCloseSceneShop = $(".layer-scene-shop .button-close-layer");
        oButtonEnterSceneShop.bind("click",function(){
            _this.oLayerBlockTrans.fadeIn();
            oLayerSceneShop.fadeIn();
        });
        oButtonCloseSceneShop.bind("click",function(){
            _this.oLayerBlockTrans.fadeOut();
            oLayerSceneShop.fadeOut();
        });
    },
    onReleaseAnimal:function(){
        var _this = this;
        var oAnimalFarm = $(".animal-farm");
        var oLayerReleaseAnimal = $(".layer-release-animal");
        oAnimalFarm.bind("click",function(e){
            _this.willReleaseAnimal = e.target;
            _this.oLayerBlockTrans.fadeIn();
            oLayerReleaseAnimal.fadeIn();
        });
    },
    onConfirmReleaseAnimal:function(){
        var _this = this;
        var oAFreeAnimal = $(".afreeanimal-container");
        var oConfirmRelease = $(".animal-release-button");
        var oLayerReleaseAnimal = $(".layer-release-animal");
        oConfirmRelease.bind("click",function(){
            oLayerReleaseAnimal.fadeOut(function(){
                var _animal = _this.animalInFarm[_this.willReleaseAnimal.getAttribute("id")];
                _animal.stop();
                _animal.setImageZoom(0,0,1000,600);
                _animal.setStartPoint(250,150);
                _animal.setCanvasSize(1000,600);
                _animal.o.style.position = "absolute";
                _animal.o.style.top = 0;
                _animal.o.style.left = 0;
                oAFreeAnimal.append(_animal.o);
                _animal.leave();
                dataController.releaseAnimal(_animal.name)
                // _this.willReleaseAnimal.parentNode.removeChild(_this.willReleaseAnimal);
            })
        });
    },
    sceneList:[{
        "name":"默认场景",
        "price":"0",
        "thumb":""
    },{
        "name":"临路池",
        "price":"1",
        "thumb":""
    },{
        "name":"默认场景",
        "price":"1",
        "thumb":""
    },{
        "name":"默认场景",
        "price":"1",
        "thumb":""
    }],
    renderSceneList:function(){
        var _scenes = "";
        this.sceneList.forEach(function(item,index){
            _scenes += "<li><img alt='"+item.name+"' class='scene-thumb'/><p class='scene-name'>"+item.name+"</p><p class='scene-price'>价格："+item.price+" 两</p></li>"
        });
        $(".scene-list").html(_scenes);
    },
    init:function(){
        this.oLayerBlockTrans = $(".layer-block-transparent");
    },
    renderPage:function(){
        this.renderSceneList();
    }
    bind:function(){
        this.onDisplayAnimal();
        this.onEnterPurchaseShop();
        this.onEnterSceneShop();
        this.onPurchaseAnimal();
        this.onReleaseAnimal();
        this.onConfirmReleaseAnimal();
    },
    start:function(){
        this.init();

        this.renderPage();

        this.bind();
    }
}

var Animal = function(name,w,h){
    this.name = name;
    this.w = w;
    this.h = h;
    this.stayImages = [];
    this.moveImages = [];
};
Animal.prototype = {
    load:function(manifest){
        var _image;
        for(var i = 0;i<this.stayFrames;i++){
            _image = document.createElement("img");
            _image.src = manifest.stay + (i + 1) + ".png";
            this.stayImages.push(_image);
        }
        for(var i = 0;i<this.moveFrames;i++){
            _image = document.createElement("img");
            _image.src = manifest.move + (i + 1) + ".png";
            this.moveImages.push(_image);
        }

        this.init();
    },
    setImageZoom:function(sl,st,sw,sh){
        this.sl = sl;
        this.st = st;
        this.sw = sw;
        this.sh = sh;
    },
    setCanvasSize:function(w,h){
        this.w = w;
        this.h = h;
        this.o.width = w;
        this.o.height = h;
    },
    setStartPoint:function(x,y){
        this.cx = x;
        this.cy = y;
    },
    setStayFrames:function(value,rate){
        this.stayFrames = value;
        this.stayRate = rate;
    },
    setMoveFrames:function(value,rate){
        this.moveFrames = value;
        this.moveRate = rate;
    },
    init:function(){
        this.o = document.createElement("canvas");
        this.o.width = 100;
        this.o.height = 70;
        this.ctx = this.o.getContext("2d");
        this.cx = 0;
        this.cy = 0;
        this.stay();
    },
    randomRender:function(x,y){
        this.o.style.left = x + "px";
        this.o.style.top = y + "px";
    },
    render:function(images,frames,rate){
        var _this = this;
        _this.ctx.clearRect(0,0,_this.w,_this.h);
        if(frames == _this.stayFrames){
            if(_this.status === "leaving"){
                _this.status = "paused";
                _this.remove();
            }else{
                frames = 0;
            }
        };
        _this.ctx.drawImage(images[frames],_this.sl,_this.st,_this.sw,_this.sh,_this.cx,_this.cy,_this.w,_this.h);
        frames++;

        if(_this.status !== "paused"){
            _this.timeout = setTimeout(function(){
                _this.render(images,frames,rate);
            },rate);
        }
    },
    stay:function(){
        this.o.style.display = "block";
        this.status = "staying";
        this.render(this.stayImages,0,this.stayRate);
    },
    stop:function(){
        this.o.style.display = "none";
        this.status = "paused";
        clearTimeout(this.timeout);
    },
    leave:function(){
        console.log("leave");
        this.o.style.display = "block";
        this.status = "leaving";
        this.render(this.moveImages,0,this.moveRate);
    },
    remove:function(){
        this.o.parentNode.removeChild(this.o);
    }
}