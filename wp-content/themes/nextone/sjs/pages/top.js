jQuery(document).ready(function(){
    jQuery('.home__video__term--item').matchHeight();
    if(jQuery('.home__sliders').length > 0){
        jQuery('.home__sliders').owlCarousel({
            lazyLoad:true,
            nav:true,
            smartSpeed:450,
            // animateOut: 'animate__animated animate__fadeOut',
            // animateIn: 'animate__animated animate__fadeIn',
            items:1,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        })
    }

    // jQuery('#home-carousel').carousel({
    //     numVisible: 5
    // });
    if(jQuery('.home__special__slides').length > 0){
        jQuery('.home__special__slides').owlCarousel({
            lazyLoad:true,
            nav:false,
            smartSpeed:450,
            margin: 16,
            responsive:{
                0:{
                    items:1,
                },
                520:{
                    items:1,
                },
                1000:{
                    items:2,
                }
            }
        });
    }
        

    
    if(jQuery('.home__collections__list').length > 0){
        jQuery('.home__collections__list').owlCarousel({
            lazyLoad:true,
            nav:false,
            smartSpeed:450,
            margin: 16,
            responsive:{
                0:{
                    items:2,
                },
                520:{
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
    }

    if(jQuery('.home__blog__list').length > 0){
        jQuery('.home__blog__item--tit').matchHeight();
    //     jQuery('.home__blog__list').owlCarousel({
    //         lazyLoad:true,
    //         nav:false,
    //         smartSpeed:450,
    //         margin: 16,
    //         responsive:{
    //             0:{
    //                 items:1,
    //             },
    //             520:{
    //                 items:2,
    //             },
    //             768:{
    //                 items:3,
    //             },
    //             1280:{
    //                 items:4,
    //             },
    //             1400:{
    //                 items:5,
    //             },
    //             1920:{
    //                 items:6,
    //             },
    //         }
    //     });
    }


    if(jQuery('.home__video__list').length > 0){
        // jQuery('.home__video__list').owlCarousel({
        //     lazyLoad:true,
        //     nav:false,
        //     smartSpeed:450,
        //     margin: 16,
        //     responsive:{
        //         0:{
        //             items:1,
        //         },
        //         520:{
        //             items:2,
        //         },
        //         768:{
        //             items:3,
        //         },
        //         1280:{
        //             items:4,
        //         },
        //         1400:{
        //             items:5,
        //         },
        //         1920:{
        //             items:6,
        //         },
        //     }
        // });
    }

    jQuery('.home__video__item--tit').matchHeight();

    var homeLogoOptions = {
        loop: true,
        margin: 0,
        nav: false,
        responsive: {
            0: {
                items: 1
            }
        }
    };
    jQuery(window).on('load resize', function () {
        if (kenEvents.current_width() <= 767) {
            jQuery('.home__logos__flex').owlCarousel(homeLogoOptions)
        } else {
            jQuery('.home__logos__flex').owlCarousel('destroy');
        }
    })

    
    if(jQuery('.home__sliders').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__sliders'),
            handler: function (direction) {
                jQuery('.home__sliders').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    }
    
    if(jQuery('.home__special').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__special'),
            handler: function (direction) {
                jQuery('.home__special').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__special .common__bortit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__special .common__bortit--tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__special .common__bortit--des').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__carousel').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    } 

    if(jQuery('.home__collections').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__collections'),
            handler: function (direction) {
                jQuery('.home__collections').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__collections .common__bortit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__collections .common__bortit--tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__collections .common__bortit--des').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__collections__list').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    } 

    if(jQuery('.home__about').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__about'),
            handler: function (direction) {
                jQuery('.home__about').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__about__thumb').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__about__content').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    } 

    

    if(jQuery('.home__blog').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__blog'),
            handler: function (direction) {
                jQuery('.home__blog').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__blog__term').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__blog .common__bortit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__blog .common__bortit--tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__blog__list').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    }

    if(jQuery('.home__video').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__video'),
            handler: function (direction) {
                jQuery('.home__video').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__video__term').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__video .common__bortit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__video .common__bortit--tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__video__list').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    }

    if(jQuery('.home__count').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__count'),
            handler: function (direction) {
                jQuery('.home__count').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__count__item').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    }

    if(jQuery('.home__logos').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('home__logos'),
            handler: function (direction) {
                jQuery('.home__logos').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.home__logos__flex').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '65%'
        })
    }
    

    
})
