jQuery(document).ready(function(){
    
    if(jQuery('.sebas__banner').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('sebas__banner'),
            handler: function (direction) {
                jQuery('.sebas__banner').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.sebas__banner__content').addClass('eff_actived animate__animated animate__fadeInLeft');
                jQuery('.sebas__banner__girl').addClass('eff_actived animate__animated animate__fadeInRight');
                
            },
            offset: '70%'
        })
    } 
    if(jQuery('.sebas__traditional').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('sebas__traditional'),
            handler: function (direction) {
                jQuery('.sebas__traditional').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
    if(jQuery('.sebas__traditional__slides').length > 0){
        jQuery('.sebas__traditional__slides').owlCarousel({
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
                680:{
                    items:3,
                },
                1000:{
                    items:4,
                },
                1280:{
                    items:4,
                },
            }
        });
        jQuery('.sebas__traditional__product--title').matchHeight();
    }
    if(jQuery('.sebas__silk').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('sebas__silk'),
            handler: function (direction) {
                jQuery('.sebas__silk').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
    if(jQuery('.sebas__silk__slides').length > 0){
        jQuery('.sebas__silk__slides').owlCarousel({
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
                680:{
                    items:3,
                },
                1000:{
                    items:4,
                },
                1280:{
                    items:4,
                },
            }
        });
        jQuery('.sebas__silk__product--title').matchHeight();
    }
    if(jQuery('.sebas__powerbond').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('sebas__powerbond'),
            handler: function (direction) {
                jQuery('.sebas__powerbond').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
    if(jQuery('.sebas__powerbond__slides').length > 0){
        jQuery('.sebas__powerbond__slides').owlCarousel({
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
                
                680:{
                    items:3,
                },
                1000:{
                    items:4,
                },
                1280:{
                    items:4,
                },
            }
        });
        jQuery('.sebas__powerbond__product--title').matchHeight();
    }
    if(jQuery('.sebas__info').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('sebas__info'),
            handler: function (direction) {
                jQuery('.sebas__info').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
})