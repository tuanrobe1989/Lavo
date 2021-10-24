jQuery(document).ready(function(){
    jQuery('.lavox__slides').owlCarousel({
        lazyLoad:true,
        nav:true,
        smartSpeed:450,
        margin: 32,
        dots: false,
        responsive:{
            0:{
                items:1,
            },
            520:{
                items:2,
            },
            1000:{
                items:3,
            },
            1280:{
                items:3,
            },
        }
    });
    if(jQuery('.lavox__product__title').length > 0){
        jQuery('.lavox__product__title').matchHeight();
    }
    // if(jQuery('.lavox__product__thumb').length > 0){
    //     jQuery('.lavox__product__thumb').matchHeight();
    // }
    if(jQuery('.lavox__banner').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('lavox__banner'),
            handler: function (direction) {
                jQuery('.lavox__banner').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.lavox__banner__model').addClass('eff_actived animate__animated animate__fadeInLeft');
                jQuery('.lavox__banner__content').addClass('eff_actived animate__animated animate__fadeInRight');         
            },
            offset: '70%'
        })
    } 
    if(jQuery('#lavox-tranditional').length > 0){
        new Waypoint({
            element: document.getElementById('lavox-tranditional'),
            handler: function (direction) {
                jQuery('#lavox-tranditional').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#lavox-tranditional .lavox__common__content').addClass('eff_actived animate__animated animate__fadeInLeft');
                jQuery('#lavox-tranditional .lavox__common__thumb').addClass('eff_actived animate__animated animate__fadeInRight');
            },
            offset: '70%'
        })
    } 
    if(jQuery('#lavox-nano').length > 0){
        new Waypoint({
            element: document.getElementById('lavox-nano'),
            handler: function (direction) {
                jQuery('#lavox-nano').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#lavox-nano .lavox__common__content').addClass('eff_actived animate__animated animate__fadeInRight');
                jQuery('#lavox-nano .lavox__common__thumb').addClass('eff_actived animate__animated animate__fadeInLeft');
            },
            offset: '70%'
        })
    } 
    if(jQuery('#lavox-bondpro').length > 0){
        new Waypoint({
            element: document.getElementById('lavox-bondpro'),
            handler: function (direction) {
                jQuery('#lavox-bondpro').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#lavox-bondpro .lavox__common__content').addClass('eff_actived animate__animated animate__fadeInLeft');
                jQuery('#lavox-bondpro .lavox__common__thumb').addClass('eff_actived animate__animated animate__fadeInRight');
            },
            offset: '70%'
        })
    } 
    if(jQuery('#lavox-consumer').length > 0){
        new Waypoint({
            element: document.getElementById('lavox-consumer'),
            handler: function (direction) {
                jQuery('#lavox-consumer').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#lavox-consumer .lavox__common__content').addClass('eff_actived animate__animated animate__fadeInRight');
                jQuery('#lavox-consumer .lavox__common__thumb').addClass('eff_actived animate__animated animate__fadeInLeft');
            },
            offset: '70%'
        })
    } 
    if(jQuery('.lavox__info').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('lavox__info'),
            handler: function (direction) {
                jQuery('.lavox__info').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
})