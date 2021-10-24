jQuery(document).ready(function () {
    jQuery('.xpros__banner__slides').owlCarousel({
        lazyLoad: true,
        nav: true,
        smartSpeed: 450,
        margin: 32,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            520: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1280: {
                items: 3,
            },
        }
    });
    jQuery('.xpros__tranditional__slides').owlCarousel({
        lazyLoad: true,
        nav: true,
        smartSpeed: 450,
        margin: 32,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            520: {
                items: 2,
            },
            767: {
                items: 3,
            },
            1280: {
                items: 4,
            },
        }
    });

    jQuery('.xpros__fiber__slides').owlCarousel({
        lazyLoad: true,
        nav: true,
        smartSpeed: 450,
        margin: 32,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            520: {
                items: 2,
            },
            767: {
                items: 3,
            },
            1280: {
                items: 4,
            },
        }
    });

    jQuery('.xpros__product__title').matchHeight();
    jQuery('.fiber__product__title').matchHeight();


    if (jQuery('.xpros__slides').length > 0) {
        jQuery('.xpros__slides').owlCarousel({
            lazyLoad: true,
            nav: true,
            smartSpeed: 450,
            margin: 32,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                520: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1280: {
                    items: 3,
                },
            }
        });
        if (jQuery('.lavox__product__title').length > 0) {
            jQuery('.lavox__product__title').matchHeight();
        }
    }

    if (jQuery('#xpros-fiberflex').length > 0) {
        new Waypoint({
            element: document.getElementById('xpros-fiberflex'),
            handler: function (direction) {
                jQuery('#xpros-fiberflex').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#xpros-fiberflex .xpros__fiberflex__content').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#xpros-fiberflex .xpros__fiberflex__thumb').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    }

    if (jQuery('#xpros__banner').length > 0) {
        new Waypoint({
            element: document.getElementById('xpros__banner'),
            handler: function (direction) {
                jQuery('#xpros__banner').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#xpros__banner .xpros__banner__title').addClass('eff_actived animate__animated animate__fadeIn animate__delay-1s');
                jQuery('#xpros__banner .xpros__banner__des').addClass('eff_actived animate__animated animate__fadeIn animate__delay-1s');
                jQuery('#xpros__banner .xpros__banner__item01').addClass('eff_actived animate__animated animate__fadeInLeft');
                jQuery('#xpros__banner .xpros__banner__item02').addClass('eff_actived animate__animated animate__fadeInUp');
                jQuery('#xpros__banner .xpros__banner__item03').addClass('eff_actived animate__animated animate__fadeInRight');
            },
            offset: '70%'
        })
    }

    if (jQuery('#xpros__tranditional').length > 0) {
        new Waypoint({
            element: document.getElementById('xpros__tranditional'),
            handler: function (direction) {
                jQuery('#xpros__tranditional').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.xpros__tranditional__tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.xpros__tranditional__des').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.xpros__tranditional__slides').addClass('eff_actived animate__animated animate__fadeIn');

            },
            offset: '70%'
        })
    }

    if (jQuery('#xpros__fiber').length > 0) {
        new Waypoint({
            element: document.getElementById('xpros__fiber'),
            handler: function (direction) {
                jQuery('#xpros__fiber').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.xpros__fiber__tit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('#xpros__fiber .catelist').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.xpros__fiber__des').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.xpros__fiber__slides').addClass('eff_actived animate__animated animate__fadeIn');

            },
            offset: '70%'
        })
    }

    if (jQuery('.xpros__info').length > 0) {
        new Waypoint({
            element: document.getElementsByClassName('xpros__info'),
            handler: function (direction) {
                jQuery('.xpros__info').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    }
})