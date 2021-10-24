jQuery(document).ready(function(){
    if(jQuery('.mpros__banner__slides').length > 0){
        jQuery('.mpros__banner__slides').owlCarousel({
            lazyLoad:true,
            nav:true,
            smartSpeed:450,
            margin: 10,
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
    }
    if(jQuery('.mpros__banner').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('mpros__banner'),
            handler: function (direction) {
                jQuery('.mpros__banner').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.mpros__banner--tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.mpros__banner--des').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.mpros__banner__item:eq(0)').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.mpros__banner__item:eq(1)').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.mpros__banner__item:eq(2)').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
    if(jQuery('.mpros__skin__slides').length > 0){
        jQuery('.mpros__skin__slides').owlCarousel({
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
    }
    
    if(jQuery('.mpros__skin').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('mpros__skin'),
            handler: function (direction) {
                jQuery('.mpros__skin').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
    if(jQuery('.mpros__hair__slides').length > 0){
        jQuery('.mpros__hair__slides').owlCarousel({
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
                    items:4,
                },
            }
        });
        jQuery('.mpros__hair__item--title').matchHeight();
    }
    if(jQuery('.mpros__hair').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('mpros__hair'),
            handler: function (direction) {
                jQuery('.mpros__hair').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
    
    if(jQuery('.mpros__cosmetic__slides').length > 0){
        jQuery('.mpros__cosmetic__slides').owlCarousel({
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
                    items:4,
                },
            }
        });
        jQuery('.mpros__cosmetic__item--title').matchHeight();
        if(jQuery('.mpros__cosmetic').length > 0){
            new Waypoint({
                element: document.getElementsByClassName('mpros__cosmetic'),
                handler: function (direction) {
                    jQuery('.mpros__cosmetic').addClass('eff_actived animate__animated animate__fadeIn');
                },
                offset: '70%'
            })
        } 
    }
    if(jQuery('.mpros__info').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('mpros__info'),
            handler: function (direction) {
                jQuery('.mpros__info').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 
})