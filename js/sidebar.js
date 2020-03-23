var isShow = false;
$(document).ready(function(){
    $("#side-toggle").click(function(){
        if (!isShow){
            $("aside").addClass("wb-side-show");
        } else {
            $("aside").removeClass("wb-side-show");
        }
        isShow = !isShow;
    })
})
