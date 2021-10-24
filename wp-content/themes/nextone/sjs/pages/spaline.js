jQuery(document).ready(function () {
  jQuery(".spaline__slides").owlCarousel({
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
    },
  });
 
  if (jQuery(".spaline__banner").length > 0) {
    new Waypoint({
      element: document.getElementsByClassName("spaline__banner"),
      handler: function (direction) {
        jQuery(".spaline__banner").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".spaline__banner__content").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".spaline__banner__girl").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#cate_i_1").length > 0) {
    new Waypoint({
      element: document.getElementById("cate_i_1"),
      handler: function (direction) {
        jQuery("#cate_i_1").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .spaline__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .spaline__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .spaline__slides").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#cate_i_2").length > 0) {
    new Waypoint({
      element: document.getElementById("cate_i_2"),
      handler: function (direction) {
        jQuery("#cate_i_2").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .spaline__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .spaline__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .spaline__slides").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery(".spaline__info").length > 0) {
    new Waypoint({
      element: document.getElementsByClassName("spaline__info"),
      handler: function (direction) {
        jQuery(".spaline__info").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if(jQuery('.spaline__product__title').length > 0){
    jQuery(this).matchHeight();
  }
  
});
