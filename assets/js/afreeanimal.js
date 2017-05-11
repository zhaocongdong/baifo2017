AFreeAnimal.start();
dataController.getUserInfo(function(res){
    if(res.name){
        $(".nickname").html("银两："+res.name+"两");
        $(".title").html("银两："+res.title+"两");
        $(".balance").html("银两："+res.gold_num+"两");
    }
});