jQuery(document).ready(function(){
    jQuery('.about__history__images').owlCarousel({
        lazyLoad:true,
        nav:false,
        items:1,
        smartSpeed:450,
    });
    jQuery('.about__award__images').owlCarousel({
        lazyLoad:true,
        nav:false,
        items:1,
        smartSpeed:450,
    });
    if(jQuery('.about__map__main').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__map__main'),
            handler: function (direction) {
                jQuery('.about__map__main').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.about__map__item:eq(0)').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.about__map__item:eq(1)').addClass('eff_actived animate__animated animate__slideInRight');
                
            },
            offset: '70%'
        })
    }
    if(jQuery('.about__factory').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__factory'),
            handler: function (direction) {
                jQuery('.about__factory').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.about__factory__bg').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.about__factory__item').addClass('eff_actived animate__animated animate__slideInRight');
                
            },
            offset: '70%'
        })
    }
    if(jQuery('.about__career').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__career'),
            handler: function (direction) {
                jQuery('.about__career__title ').addClass('eff_actived animate__animated animate__fadeInUp')
                jQuery('.about__career').addClass('eff_actived animate__animated animate__fadeIn')
                jQuery('.about__career li').addClass('eff_actived animate__animated animate__zoomIn')
                jQuery('.about__career__thumb').addClass('eff_actived animate__animated animate__zoomIn')
            },
            offset: '70%'
        })
    }

    if(jQuery('.about__prod').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__prod'),
            handler: function (direction) {
                jQuery('.about__prod').addClass('eff_actived animate__animated animate__zoomIn')
            },
            offset: '70%'
        })
    }

    if(jQuery('.about__history').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__history'),
            handler: function (direction) {
                jQuery('.about__history').addClass('eff_actived animate__animated animate__fadeIn')
                jQuery('.about__history__title').addClass('eff_actived animate__animated animate__fadeInUp')
                jQuery('.about__history__item:eq(0)').addClass('eff_actived animate__animated animate__slideInLeft')
                jQuery('.about__history__item:eq(1)').addClass('eff_actived animate__animated animate__slideInRight')
                
            },
            offset: '70%'
        })
    }

    if(jQuery('.about__value').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__value'),
            handler: function (direction) {
                jQuery('.about__value').addClass('eff_actived animate__animated animate__fadeIn')
                jQuery('.about__value__columntit').addClass('eff_actived animate__animated animate__slideInLeft')
                jQuery('.about__value__columnicon').addClass('eff_actived animate__animated animate__slideInRight')
                
            },
            offset: '70%'
        })
    }

    if(jQuery('.about__award').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('about__award'),
            handler: function (direction) {
                jQuery('.about__award').addClass('eff_actived animate__animated animate__fadeIn')
                jQuery('.about__value__columntit').addClass('eff_actived animate__animated animate__slideInLeft')
                jQuery('.about__award__item').addClass('eff_actived animate__animated animate__zoomIn')
            },
            offset: '70%'
        })
    }


     
})

