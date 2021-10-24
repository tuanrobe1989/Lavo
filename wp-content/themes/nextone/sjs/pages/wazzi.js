jQuery(document).ready(function () {
  jQuery("#wazzi-banner__slider").owlCarousel({
    // items:1,
    lazyLoad: true,
    nav: false,
    // center:true,
    // autoWidth:true,
    margin: 46,
    // stagePadding: 32,
    mouseDrag: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      767: {
        items: 2,
      },
      980: {
        items: 2,
      },
    },
  });
  jQuery(".wazzi__slides").owlCarousel({
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

  if (jQuery(".wazzi-banner").length > 0) {
    new Waypoint({
      element: document.getElementsByClassName("wazzi-banner"),
      handler: function (direction) {
        jQuery(".wazzi-banner").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".wazzi-banner__logo").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery(".wazzi-banner__desc").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery(".wazzi-banner__slider").addClass(
          "eff_actived animate__animated animate__fadeInUp"
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
        jQuery("#cate_i_1 .wazzi__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .wazzi__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .wazzi__slides").addClass(
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
        jQuery("#cate_i_2 .wazzi__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .wazzi__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .wazzi__slides").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery(".wazzi__info").length > 0) {
    new Waypoint({
      element: document.getElementsByClassName("wazzi__info"),
      handler: function (direction) {
        jQuery(".wazzi__info").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }
});
