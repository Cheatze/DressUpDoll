//Dit aanpassen zodat dezelfde 'kleren' aan blijven maar dan van de andere kant
var view = "front"; //veranderd van back naar front
var viewer = 0;//het begin nummer moet de voorkant zijn

function toggleview(viewvar){

    if(viewvar == 0){//front

    $("#bob").attr("src", "Plaatjes/BobVoorkant.png");
    $("[data-toggle='on']").removeClass("verstopt");
    $("[data-viewpoint='back']").addClass("verstopt"); //hide all 'back'imgs
    $("[data-viewpoint='left']").addClass("verstopt"); //hide all 'left'
    $("[data-viewpoint='right']").addClass("verstopt"); //hide all 'right'
    $("#bob").attr("data-view", "front");

    }else if(viewvar == 1){//right

    $("#bob").attr("src", "Plaatjes/BobRechterkant.png");
    $("[data-toggle='on']").removeClass("verstopt");
    $("[data-viewpoint='left']").addClass("verstopt"); //hide all 'left'
    $("[data-viewpoint='back']").addClass("verstopt"); //hide all 'back'
    $("[data-viewpoint='front']").addClass("verstopt");//hide all 'front'
    $("#bob").attr("data-view", "right");

    }else if(viewvar == 2){//back

    $("#bob").attr("src", "Plaatjes/BobAchterkant.png");
    $("[data-toggle='on']").removeClass("verstopt");
    $("[data-viewpoint='front']").addClass("verstopt");//hide all 'front' imgs
    $("[data-viewpoint='left']").addClass("verstopt"); //hide all 'left'
    $("[data-viewpoint='right']").addClass("verstopt"); //hide all 'right'
    $("#bob").attr("data-view", "back");
    

    }else if(viewvar == 3){//left

    $("#bob").attr("src", "Plaatjes/BobLinkerkant.png");
    $("[data-toggle='on']").removeClass("verstopt");
    $("[data-viewpoint='right']").addClass("verstopt"); //hide all 'right'
    $("[data-viewpoint='front']").addClass("verstopt");//hide all 'front'
    $("[data-viewpoint='back']").addClass("verstopt"); //hide all 'back'
    $("#bob").attr("data-view", "left");

    }

}

//linker knopje
$("button[name='left']").click(function(){
    //als viewer 0 is naar 3 zetten anders viewer min 1
    if(viewer==0){
        viewer = 3;
    }else{
        viewer--;
    }
    //roep toggleview aan met viewer als argument
    toggleview(viewer);
});

//rechter knopje
$("button[name='right']").click(function(){
    //als viewer 3 is naar 0 zetten anders viewer plus 1
    if(viewer==3){
        viewer = 0;
    }else{
        viewer++;
    }
    //roep toggleview aan met viewer als argument
    toggleview(viewer);
});