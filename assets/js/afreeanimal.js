AFreeAnimal.start();
dataController.getUserInfo(function(res){
    if(res.name){
        AFreeAnimal.gold = res.gold_num;

        $(".nickname").html("昵称："+res.name);
        $(".title").html("称呼："+res.title);
        $(".balance").html("银两："+res.gold_num+"两");
    }
});