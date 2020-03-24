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

    var h = $("html").css("height");
    var hi = parseInt(h.substring(0, h.length - 2));
    var b = $(window).height();
    // alert("Height = " + hi + "\nBottom = " + b);

    if (hi < b){
        $("footer").addClass("position-fixed");
    }
})
