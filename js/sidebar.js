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

    $('[name="role"]').click(function(){
        if ($(this).val() == "Administrator"){
            khususPLanjut.addClass("collapse");
        } else {
            khususPLanjut.removeClass("collapse");
        }
    });

    $('.wb-content-hidden').on('show.bs.collapse', function () {
    $(this).closest("table")
        .find(".collapse.in")
        .not(this)
        //.collapse('toggle')
    });
})
