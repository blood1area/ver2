$(document).ready(function(){
    if ( $(".bxslider li").length>1) {
        let el = $(".bxslider");

        el.bxSlider({
            auto:true,
            pause: 3000,
            onSlideAfter: function(){
                el.stopAuto();
                el.startAuto();
            }
        });
    }
})