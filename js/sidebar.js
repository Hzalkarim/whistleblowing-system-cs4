var isShow = false;
$(document).ready(function(){
    $("#side-toggle").click(function(){
        if (!isShow){
            $("aside").addClass("wb-side-show");
        } else {
            $("aside").removeClass("wb-side-show");
        }
        isShow = !isShow;
    });

    var khususPLanjut = $(".p-lanjut-field");

    $('[name="peran"]').click(function(){
        var hehe;
        if ($(this).val() == "admin"){
            khususPLanjut.addClass("collapse");
        } else {
            khususPLanjut.removeClass("collapse");
        }
    });
})
