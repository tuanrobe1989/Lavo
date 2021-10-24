jQuery(document).ready(function(){
    if(jQuery('.blog__detail__relateditem--image').length > 0){
        jQuery('.blog__detail__relateditem--image').matchHeight();
    }
    if(jQuery('.blog__category__sliders').length > 0){
        jQuery('.blog__category__sliders').owlCarousel({
            lazyLoad:true,
            nav:true,
            smartSpeed:450,
            animateOut: 'animate__animated animate__fadeOut',
            animateIn: 'animate__animated animate__fadeIn',
            items:1,
        })
    }
    if(jQuery('.blog__detail__postrelated').length > 0){
        jQuery('.blog__detail__postrelated').owlCarousel({
            lazyLoad:true,
            nav:false,
            smartSpeed:450,
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
    }

    if(jQuery('.blog__category__sliders').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('blog__category__sliders'),
            handler: function (direction) {
                jQuery('.blog__category__sliders').addClass('eff_actived animate__animated animate__zoomIn');
            },
            offset: '70%'
        })
    }

    if(jQuery('.blog__category').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('blog__category'),
            handler: function (direction) {
                jQuery('.blog__category').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.blog__category__item').addClass('eff_actived animate__animated animate__zoomIn');
            },
            offset: '60%'
        })
    } 

    
    if(jQuery('.common__content').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('common__content'),
            handler: function (direction) {
                jQuery('.common__content').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '60%'
        })
    } 
    if(jQuery('.common__sidebar').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('common__sidebar'),
            handler: function (direction) {
                jQuery('.common__sidebar').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '60%'
        })
    } 

    
    

})