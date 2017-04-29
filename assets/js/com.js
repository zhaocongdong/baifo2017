var ABurnjoss = {
    foCarousel:function(){
        var oFoUl = $(".fo-lists");
        var oFoLists = $(".fo-lists li");
        var nLiCounts = oFoLists.length;
        var oLeftButton = $(".fo-handle .arrow-left");
        var oRightButton = $(".fo-handle .arrow-right");
        var oActiveLi = $(".fo-lists li.active");
        var nCurrentId = 0, nInitLeft, oTargetLi,isMoving = false;
        var fnSlide = function(n){
            if(!isMoving){
                isMoving = true;
                if(nCurrentId === 0 && n === 1){
                    oFoLists.last().prependTo(oFoUl);
                    oFoLists = $(".fo-lists li");
                    nCurrentId = 1;
                }else if(nCurrentId === nLiCounts - 1 && n === -1){
                    oFoLists.first().appendTo(oFoUl);
                    oFoLists = $(".fo-lists li");
                    nCurrentId = nLiCounts - 2;
                }
                nCurrentId = nCurrentId - n;

                oActiveLi.animate({"left":n*1000},100,function(){
                    $(this).removeClass("active");
                });
                oActiveLi = oFoLists.eq(nCurrentId).css({"left":-n*1000}).animate({"left":0},100,function(){
                    $(this).addClass("active");
                    isMoving = false;
                });
            }
        };
        oLeftButton.bind("click",function(){
            fnSlide(1);
        });
        oRightButton.bind("click",function(){
            fnSlide(-1);
        });
    },
    tributeSwitch:function(){
        var oTributeNav = $(".tribute-lists-nav");
        var oTributeNavs = $(".tribute-lists-nav span");
        var oTributeUl = $(".tribute-lists");
        var oTributeLists = $(".tribute-lists li");
        oTributeNavs.each(function(){
            var _this = $(this);
            var _id = _this.index();
            var oTributeLi = oTributeLists.eq(_id);
            _this.bind("mouseenter",function(){
                oTributeNav.find(".active").removeClass("active");
                _this.addClass("active");
                oTributeUl.find(".display-block").removeClass("display-block");
                oTributeLi.addClass("display-block");
            });
        });
    },
    oLayerBlock:$(".layer-block"),
    onOpenMeritBox:function(){
        var _this = this;
        var oMeritBox = $(".merit-box");
        var oLayerMeritBox = $(".layer-merit-box");
        var oCloseMeritBox = $(".close-layer-merit");
        oMeritBox.bind("click",function(){
            _this.oLayerBlock.fadeIn();
            oLayerMeritBox.fadeIn();
        });
        oCloseMeritBox.bind("click",function(){
            _this.oLayerBlock.fadeOut();
            oLayerMeritBox.fadeOut();
        });
    },
    start:function(){
        this.foCarousel();
        this.tributeSwitch();
        this.onOpenMeritBox();
    }
}
ABurnjoss.start();