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
var GifElement = function(id,parent,elm){
    this.id = id;
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
        this.loading = false;
    },
    run:function(){
        var _this = this;
        if(_this.loading){
            _this.status = "live";
            _this.elm.classList.add("active");
            _this.render(0);
        }else{
            fnLoading(_this.imgs,function(){
                _this.loading = true;
                _this.parent.appendChild(_this.elm);
                setTimeout(function(){
                    _this.run()
                },100);
            });
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
        "name":"仓鼠",
        "price":20,
        "frames":55,
        "moveFrames":70
    },
    "rabbit":{
        "name":"玉兔",
        "price":20,
        "frames":18,
        "moveFrames":68
    },
    "goose":{
        "name":"鹅",
        "price":25,
        "frames":12,
        "moveFrames":73
    },
    "seaotter":{
        "name":"海獭",
        "price":30,
        "frames":14,
        "moveFrames":70
    },
    "deer":{
        "name":"梅花鹿",
        "price":60,
        "frames":23,
        "moveFrames":61
    },
    "koala":{
        "name":"树懒",
        "price":50,
        "frames":33,
        "moveFrames":104
    },
    "flamingo":{
        "name":"火烈鸟",
        "price":80,
        "frames":9,
        "moveFrames":76
    },
    "koi":{
        "name":"锦鲤",
        "price":15,
        "frames":10,
        "moveFrames":28
    },
    "mandarinduck":{
        "name":"鸳鸯",
        "price":40,
        "frames":13,
        "moveFrames":81
    },
    "dove":{
        "name":"白鸽",
        "price":15,
        "frames":5,
        "moveFrames":52
    },
    "pigeon":{
        "name":"灰鸽",
        "price":15,
        "frames":8,
        "moveFrames":43
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
    },
    "koi":{
        stay:["./assets/images/afreeanimal/koi/koi"],
        move:["./assets/images/afreeanimal/koi/koi2_"]
    },
    "mandarinduck":{
        stay:["./assets/images/afreeanimal/mandarinduck/mandarinduck"],
        move:["./assets/images/afreeanimal/mandarinduck/mandarinduck2_"]
    },
    "dove":{
        stay:["./assets/images/afreeanimal/dove/dove"],
        move:["./assets/images/afreeanimal/dove/dove2_"]
    },
    "pigeon":{
        stay:["./assets/images/afreeanimal/pigeon/pigeon"],
        move:["./assets/images/afreeanimal/pigeon/pigeon2_"]
    }
}

var userId = $("#userid").val();

var dataController = {
    getUserInfo:function(successCallback){
        $.get("index.php?m=afreeanimal&f=userInfo",successCallback,"json");
    },
    purchaseAnimal:function(name,number,amount,successCallback){
        if(userId){
            $.post("index.php?m=afreeanimal&f=opAnimal",{"uid":userId,"name":name,"is_buy":1,"num":number,"total":amount},successCallback,"json");
        }else{
            document.location.href = "index.php?m=auser&f=login&backurl=afreeanimal";
        }
    },
    releaseAnimal:function(name){
        if(userId){
            $.post("index.php?m=afreeanimal&f=opAnimal",{"uid":userId,"name":name,"is_buy":0,"num":-1,"total":0},function(res){
            },"json");
        }else{
            document.location.href = "index.php?m=auser&f=login&backurl=afreeanimal";
        }
    },
    getAnimals:function(successCallback){
        $.post("index.php?m=afreeanimal&f=getAnimal",{"uid":userId},successCallback,"json");
    },
    buyBg:function(bgid,gold,successCallback){
        if(userId){
            $.post("index.php?m=afreeanimal&f=buybg",{"uid":userId,"bgid":bgid,"gold":1},successCallback,"json");
        }else{
            document.location.href = "index.php?m=auser&f=login&backurl=afreeanimal";
        }
    },
    setBg:function(bgid,successCallback){
        $.post("index.php?m=afreeanimal&f=setBG",{"uid":userId,"bgid":bgid},successCallback,"json");
    },
    getMyBG:function(successCallback){
        if(userId){
            $.post("index.php?m=afreeanimal&f=getMyBG",{"uid":userId},successCallback,"json");
        }
    },
    burnjoss:function(data,successCallback){
        if(userId){
            data.uid = userId;
            $.post("index.php?m=aburnjoss&f=burnjoss",data,successCallback,"json");
        }else{
            document.location.href = "index.php?m=auser&f=login&backurl=aburnjoss";
        }
    },
    initBj:function(successCallback){
        $.post("index.php?m=aburnjoss&f=initBJ",{"uid":userId},successCallback,"json");
    },
    meritBox:function(total,successCallback){
        if(userId){
            $.post("index.php?m=aburnjoss&f=meritBox",{"total":total,"uid":userId},successCallback,"json");
        }else{
            document.location.href = "index.php?m=auser&f=login&backurl=aburnjoss";
        }
    },
    drawLots:function(successCallback){
        if(userId){
            $.post("index.php?m=aburnjoss&f=userLot",{"uid":userId},successCallback,"json");
        }else{
            document.location.href = "index.php?m=auser&f=login&backurl=aburnjoss";
        }
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
    createAnimal:function(name){
        console.log(name);
        if(name == "flamingo"){
            var _animal = new Animal(name,100,70);
        }else{
            var _animal = new Animal(name,100,70);
        }
        var _animalData = AnimalList[name];
        _animal.setStayFrames(_animalData.frames,150);
        _animal.setMoveFrames(_animalData.moveFrames,150)
        _animal.load(AnimalManifest[name]);
        _animal.setImageZoom(0,0,650,488);
        return _animal;
    },
    onDisplayAnimal :function(){
        var _this = this;
        var oAnimalLists = $(".animal-lists li");
        var oAnimalName = $(".animal-name");
        var oInputAnimalCount = $(".animal-count input");
        var oAnimalTotalPrice = $(".animal-cost span");
        var oAnimalDisplayContainer = $(".animal-show-container");
        oAnimalLists.each(function(){
            var $this = $(this);
            $this.bind("click",function(){
                var sAnimalName = $this.attr("data-name");
                if(_this.selectedName != sAnimalName){
                    _this.selectedCount = 1;
                    _this.selectedUnitPrice = AnimalList[sAnimalName].price;
                    _this.totalAmount = _this.selectedUnitPrice;
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
                        _this.animalList[sAnimalName] = _this.createAnimal(sAnimalName);
                        oAnimalDisplayContainer.append(_this.animalList[sAnimalName].o);
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

        oPurchaseAnimalButton.bind("click",function(){
            _this.oLayerBlockTrans.fadeOut();
            oLayerAnimalShop.fadeOut();

            dataController.purchaseAnimal(_this.selectedName,_this.selectedCount,_this.totalAmount,function(res){
                var animalName = _this.selectedName;
                for(var i = 0;i < _this.selectedCount;i++){
                    _this.insertAnimalToFarm(animalName);
                }

                $(".balance").html("银两："+ (parseInt(_this.gold) - parseInt(_this.totalAmount))+"两");
            });
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
    onSwitchAnimalShop:function(){
        var oAnimalTypeNavs = $(".animal-type-nav span");
        var oAnimalLists = $(".animal-lists");
        oAnimalTypeNavs.each(function(){
            var _$this = $(this);
            var _id = _$this.index();
            _$this.bind("click",function(){
                $(".layer-animal-shop .active").hide().removeClass("active");
                oAnimalLists.eq(_id).show().addClass("active");
            });
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
    onEnterRepository:function(){
        var _this = this;
        var oButtonEnterRepository = $(".pop-layer-repository");
        var oButtonCloseRepository = $(".layer-user-repository .button-close-layer");
        var oLayerUserRepository = $(".layer-user-repository");
        oButtonEnterRepository.bind("click",function(){
            _this.oLayerBlockTrans.fadeIn();
            oLayerUserRepository.fadeIn();
        });
        oButtonCloseRepository.bind("click",function(){
            _this.oLayerBlockTrans.fadeOut();
            oLayerUserRepository.fadeOut();
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
                dataController.releaseAnimal(_animal.name);
                _animal.stop();
                _animal.setImageZoom(0,0,650,488);
                var _animalName = _animal.name;
                if(_animalName == "pigeon" || _animalName == "dove"){
                    _animal.setStartPoint(0,0);
                }else if(_animalName == "mandarinduck" || _animalName == "koi"){
                    _animal.setStartPoint(0,100);
                }else{
                    _animal.setStartPoint(0,220);
                }
                _animal.setCanvasSize(1000,600);
                _animal.o.style.position = "absolute";
                _animal.o.style.top = 0;
                _animal.o.style.left = 0;
                oAFreeAnimal.append(_animal.o);
                _animal.leave();
                _this.oLayerBlockTrans.fadeOut();
            })
        });
    },
    imageRoot:"./assets/images/afreeanimal",
    sceneList:[{
        "id":"1",
        "name":"默认场景",
        "price":"0",
        "frames":11,
        "thumb":"/scene/scene-thumb-1.jpg",
        "sold":0
    },{
        "id":"2",
        "name":"临路池",
        "price":"1",
        "frames":10,
        "thumb":"/scene/scene-thumb-2.jpg",
        "sold":0
    },{
        "id":"3",
        "name":"天湖",
        "price":"1",
        "frames":8,
        "thumb":"/scene/scene-thumb-3.jpg",
        "sold":0
    },{
        "id":"4",
        "name":"宁静山林",
        "price":"1",
        "frames":11,
        "thumb":"/scene/scene-thumb-4.jpg",
        "sold":0
    }],
    renderSceneList:function(){
        var _this = this, oNewLi = "",_imageRoot = this.imageRoot;
        var oSceneShopList = $(".scene-shop-list");
        oSceneShopList.html("");
        this.sceneList.forEach(function(item,index){
            oNewLi = $("<li><img alt='"+item.name+"' class='scene-thumb' src='"+_imageRoot+item.thumb+"'/><p class='scene-name'>"+item.name+"</p><p class='scene-price'>价格："+item.price+" 两</p></li>");
            if(item.sold == 1){
                oNewLi.append("<div class='scene-is-sold'></div>");
            }else{
                oNewLi.bind("click",function(){
                    if(confirm("是否确认购买背景："+item.name)){
                        dataController.buyBg(item.id,1,function(){
                            _this.getMyBg();
                        });
                    }
                });
            }
            oSceneShopList.append(oNewLi);
        });
    },
    repositoryList:[],
    renderRepositoryList:function(){
        var _this = this;
        var _repositoryList = this.repositoryList;
        var oRepositoryList = $(".repository-list ul");
        var sHtmlRepositoryList = "";
        var _currentSceneId = this.currentSceneId;
        var _imageRoot = this.imageRoot;
        oRepositoryList.html("");
        for(var i = 0,len = _repositoryList.length;i < len; i++){
            sHtmlRepositoryList += "<li data-id='"+ _repositoryList[i].id +"'>";
            console.log(_currentSceneId,_repositoryList[i].id);
            if(_currentSceneId == _repositoryList[i].id){
                this.currentScene = _repositoryList[i].thumb;
                sHtmlRepositoryList += "<div class='repository-is-set'></div>";
            }
            sHtmlRepositoryList += "<img alt='"+ _repositoryList[i].name +"' src='"+ _imageRoot + _repositoryList[i].thumb +"' /></li>";
        }
        oRepositoryList.html(sHtmlRepositoryList);
        oRepositoryList.find("li").each(function(){
            var _$this = $(this);
            _$this.bind("click",function(){
                _this.currentSceneId = _$this.attr("data-id")
                dataController.setBg(_this.currentSceneId,function(data){
                    _this.renderRepositoryList();
                    _this.scene.setFrames(_this.sceneList[_this.currentSceneId - 1].frames);
                    _this.scene.setImage("./assets/images/afreeanimal/scene/scene"+ _this.currentSceneId +"-",".jpg");
                })
            });
        });
    },
    insertAnimalToFarm:function(name){
        var newAnimal = this.createAnimal(name);
        var nAnimalId = "id-" + this.animalInFarm.length;
        var oAnimalFarm = $(".animal-farm");
        var nMaxLeft = oAnimalFarm.width();
        var nMaxTop = oAnimalFarm.height();

        newAnimal.init();
        if(name == "flamingo"){
            newAnimal.setCanvasSize(100,168);
            newAnimal.setImageZoom(162,0,325,488);
            var y = Math.round(Math.random() * nMaxTop) - 160;
        }else{
            newAnimal.setCanvasSize(100,70);
            newAnimal.setImageZoom(162,122,325,244);
            var y = Math.round(Math.random() * nMaxTop) - 65;
        }
        var x = Math.round(Math.random() * nMaxLeft) - 80;
        newAnimal.randomRender(x,y);
        this.animalInFarm[nAnimalId] = newAnimal;
        newAnimal.o.id = nAnimalId;
        oAnimalFarm.append(newAnimal.o);
        this.animalInFarm.length++;
    },
    renderScene:function(){
        var _scene = new Scene("scene-canvas");
        _scene.setScene(1000,600);
        _scene.setFrames(this.sceneList[this.currentSceneId - 1].frames);
        _scene.setImage("./assets/images/afreeanimal/scene/scene"+ this.currentSceneId +"-",".jpg");
        _scene.start();
        this.scene = _scene;
    },
    renderGrass:function(){
        var _scene = new Scene("scene-grass-canvas");
        _scene.setScene(1000,182);
        _scene.setFrames(81);
        _scene.setImage("./assets/images/afreeanimal/grass/grass",".png");
        _scene.start();
    },
    init:function(){
        var _this = this;
        this.oLayerBlockTrans = $(".layer-block-transparent");
        dataController.getAnimals(function(data){
+           data.forEach(function(item){
                for(var i = 0,len = item.num;i < len;i++){
                    _this.insertAnimalToFarm(item.name);
                }
            });
        });
        _this.getMyBg();
    },
    getMyBg:function(){
        var _this = this;
        _this.currentSceneId = 1;
        _this.renderSceneList();
        _this.renderScene();
        _this.renderGrass();
        dataController.getMyBG(function(data){
            for(var i = 0,len = data.length;i < len;i++){
                if(data[i].using === "1"){
                    _this.currentSceneId = data[i].bgid;
                }
                _this.sceneList[data[i].bgid - 1].sold = 1;
                _this.repositoryList.push(_this.sceneList[data[i].bgid - 1]);
            }
            _this.renderSceneList();
            _this.renderRepositoryList();
            _this.renderScene();
            _this.renderGrass();
        });
    },
    renderPage:function(){
    },
    bind:function(){
        this.onDisplayAnimal();
        this.onEnterPurchaseShop();
        this.onSwitchAnimalShop();
        this.onEnterSceneShop();
        this.onEnterRepository();
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

var Scene = function(cid){
    this.o = document.getElementById(cid);
    this.ctx = this.o.getContext("2d");
}
Scene.prototype = {
    setScene:function(w,h){
        this.o.width = w;
        this.o.height = h;
    },
    setFrames:function(frames){
        this.frames = frames;
    },
    setImage:function(src,ext){
        this.imgs = [];
        for(var i = 0,len = this.frames;i < len;i++){
            var _img = document.createElement("img");
            _img.src = src + (i + 1) + ext;
            this.imgs.push(_img);
        }
    },
    start:function(){
        var _this = this,
            n = 0;
        fnLoading(_this.imgs,function(){
            _this.render();
        });
        _this.img = _this.imgs[0];
        setInterval(function(){
            n = n == _this.frames ? 0: n;
            _this.img = _this.imgs[n]
            n++
        },100);
    },
    render:function(){
        var _this = this;
        _this.ctx.clearRect(0,0,1000,600);
        _this.ctx.drawImage(_this.img,0,0);
        requestAnimationFrame(function(){
            _this.render();
        });
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
    render:function(images,frames,rate,status){
        var _this = this;
        clearTimeout(_this.timeout);
        _this.ctx.clearRect(0,0,_this.w,_this.h);
        if(frames >= _this.activeFrames){
            if(_this.status === "leaving"){
                _this.status = "paused";
                _this.remove();
                return true;
            }else{
                frames = 0;
            }
        }
        _this.ctx.drawImage(images[frames],_this.sl,_this.st,_this.sw,_this.sh,_this.cx,_this.cy,_this.w,_this.h);
        frames++;

        if(_this.status === status){
            _this.timeout = setTimeout(function(){
                _this.render(images,frames,rate,status);
            },rate);
        }
    },
    stay:function(){
        this.o.style.display = "block";
        this.status = "staying";
        this.prepare(this.stayImages,this.stayRate,this.stayFrames,"staying");
    },
    stop:function(){
        this.o.style.display = "none";
        this.status = "paused";
    },
    leave:function(){
        this.o.style.display = "block";
        this.status = "leaving";
        this.prepare(this.moveImages,this.moveRate,this.moveFrames,"leaving");
    },
    prepare:function(imgs,rate,frames,type){
        this.activeFrames = frames;
        this.render(imgs,0,rate,type);
    },
    remove:function(){
        this.o.parentNode.removeChild(this.o);
    }
}