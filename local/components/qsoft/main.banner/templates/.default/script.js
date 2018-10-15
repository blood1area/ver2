$(document).ready(function(){
    if ( $(".bxslider li").length>1) {
        let el = $(".bxslider"),
            elControl = $('.bx-controls-direction'),
            body = $('body');

        el.bxSlider({
            auto:true,
            pause: 3000
        });

        body.on("click", elControl,function() {
            el.startAuto();
        });


    }
})