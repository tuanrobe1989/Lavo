jQuery(document).ready(function(){
    jQuery('.contact__form__action').submit(function(){
        var curForm = jQuery(this);
        var nonce = curForm.find(".book__nonce").val();
        var contact_name = curForm.find('#contact__form__name').val();
        var contact_email = curForm.find('#contact__form__email').val();
        var contact_phone = curForm.find('#contact__form__phone').val();
        var contact_message = curForm.find('#contact__form__message').val();
        if(contact_name == ''){
            curForm.find('#contact__form__name').addClass('required');
        }else{
            curForm.find('#contact__form__name').removeClass('required');
        }
        if(emailVail(contact_email) == false){
            curForm.find('#contact__form__email').addClass('required');
        }else{
            curForm.find('#contact__form__email').removeClass('required');
        }
        if(phoneVail(contact_phone) == false){
            curForm.find('#contact__form__phone').addClass('required');
        }else{
            curForm.find('#contact__form__phone').removeClass('required');
        }

        if(contact_name != '' && emailVail(contact_email) == true && phoneVail(contact_phone) == true){
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : global_params.ajaxurl,
                data : {
                    action: 'pushmail',
                    nonce: nonce,
                    name: contact_name,
                    phone: contact_phone,
                    email: contact_email,
                    message: contact_message,
                },
                success: function(response) {
                    console.log(response);
                   if(response.type == "success") {
                        jQuery('.contact__form__input').each(function(){
                           jQuery(this).val('');
                        })
                        jQuery('#kpopup-thanks').addClass('animate__animated animate__zoomIn');
                   }
                   else {
                        jQuery('#kpopup-warning').addClass('animate__animated animate__zoomIn');
                   }
                }
             });   
        }
        return false;
    });

    if(jQuery('.contact__banner').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('contact__banner'),
            handler: function (direction) {
                jQuery('.contact__banner').addClass('eff_actived animate__animated animate__lightSpeedInLeft');
                jQuery('.contact__banner__tit').addClass('eff_actived animate__animated animate__zoomIn animate__delay-1s');
            },
            offset: '70%'
        })
    }
    if(jQuery('.contact__content').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('contact__content'),
            handler: function (direction) {
                jQuery('.contact__content').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.contact__content__item.one').addClass('eff_actived animate__animated animate__slideInLeft animate__delay-1s');
                jQuery('.contact__content__item.two').addClass('eff_actived animate__animated animate__slideInRight animate__delay-1s');
            },
            offset: '70%'
        })
    }
    if(jQuery('.contact__form').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('contact__form'),
            handler: function (direction) {
                jQuery('.contact__form').addClass('eff_actived animate__animated animate__fadeIn');
                jQuery('.contact__form__action').addClass('eff_actived animate__animated animate__slideInUp animate__delay-1s');
                jQuery('.contact__form__girlround').addClass('eff_actived animate__animated animate__slideInUp animate__delay-1s');
                jQuery('.contact__form__line').addClass('eff_actived animate__animated animate__zoomIn animate__delay-1s');
            },
            offset: '70%'
        })
    }

    if(jQuery('.contact__map').length > 0){
        new Waypoint({
            element: document.getElementsByClassName('contact__map'),
            handler: function (direction) {
                jQuery('.contact__map').addClass('eff_actived animate__animated animate__fadeIn');
            },
            offset: '70%'
        })
    }
    
})