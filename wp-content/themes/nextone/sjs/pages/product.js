jQuery(document).ready(function(){

    if(jQuery('.product__category__sliders').length > 0){
        jQuery('.product__category__sliders').owlCarousel({
            lazyLoad:true,
            nav:true,
            smartSpeed:450,
            animateOut: 'animate__animated animate__fadeOut',
            animateIn: 'animate__animated animate__fadeIn',
            items:1,
        })
    }

    if(jQuery('.product__detail__relatedlist').length > 0){
        jQuery('.product__detail__relatedlist').owlCarousel({
            lazyLoad:true,
            nav:false,
            smartSpeed:450,
            margin:32,
            responsive:{
                0:{
                    items:1,
                },
                520:{
                    items:3,
                },
                1000:{
                    items:4,
                },
            }
        });
        jQuery('.product__detail__relateditem--tit').matchHeight();
    }

    if(jQuery('.product__detail').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__detail'),
            handler: function (direction) {
                jQuery('.product__detail').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.product__detail__thumb').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.product__detail__content').addClass('eff_actived animate__animated animate__slideInRight');
            },
            offset: '70%'
        })
    }
    if(jQuery('.product__detail__guide').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__detail__guide'),
            handler: function (direction) {
                jQuery('.product__detail__guide').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.product__detail__modelitem:eq(0)').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.product__detail__modelitem:eq(1)').addClass('eff_actived animate__animated animate__slideInRight');
                jQuery('.product__detail__model--bg').addClass('eff_actived animate__animated animate__bounceIn');
            },
            offset: '70%'
        })
    }

    if(jQuery('.product__detail__related').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__detail__related'),
            handler: function (direction) {
                jQuery('.product__detail__related').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.product__detail__related--tit').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.product__detail__related--des').addClass('eff_actived animate__animated animate__slideInRight');
                jQuery('.product__detail__relatedlist').addClass('eff_actived animate__animated animate__bounceIn');

                jQuery('.common__bortit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.common__bortit--tit').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.common__bortit--des').addClass('eff_actived animate__animated animate__slideInRight');
            },
            offset: '70%'
        })
    }

    if(jQuery('.product__list__item--tit').length > 0){
        jQuery('.product__list__item--tit').matchHeight();
    }

    if(jQuery('.product__category__sliders').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__category__sliders'),
            handler: function (direction) {
                jQuery('.product__category__sliders').addClass('eff_actived animate__animated animate__slideInLeft');
            },
            offset: '70%'
        })
    }
    if(jQuery('.product__list').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__list'),
            handler: function (direction) {
                jQuery('.product__list__title').addClass('eff_actived animate__animated animate__slideInRight');
                jQuery('.product__list__item').addClass('eff_actived animate__animated animate__zoomIn');
            },
            offset: '70%'
        })
    }

    if(jQuery('.product__brand__banner').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__brand__banner'),
            handler: function (direction) {
                jQuery('.product__brand__banner').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.product__brand__banner--tit').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.product__brand__banner--des').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.product__brand__banner--girl').addClass('eff_actived animate__animated animate__slideInRight');
            },
            offset: '70%'
        })
    } 

    if(jQuery('.product__brand__special').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('product__brand__special'),
            handler: function (direction) {
                jQuery('.product__brand__special').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.common__bortit').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.common__bortit--tit').addClass('eff_actived animate__animated animate__slideInLeft');
                jQuery('.common__bortit--des').addClass('eff_actived animate__animated animate__slideInRight');
                jQuery('.product__brand__carousel').addClass('eff_actived animate__animated animate__slideInRight');
            },
            offset: '60%'
        })
    } 

    
    
})
if(jQuery('#brand-carousel').length > 0){
    jQuery('#brand-carousel').carousel({
        numVisible: 5
    });
}