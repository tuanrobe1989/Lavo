jQuery(document).ready(function () {
  if (jQuery(".nowkonn__banner__slides").length > 0) {
    jQuery(".nowkonn__banner__slides").owlCarousel({
      lazyLoad: true,
      nav: true,
      smartSpeed: 450,
      margin: 10,
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
  }
  jQuery(".nowkonn__slides").owlCarousel({
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

  // if (jQuery("#nowkonn__common").length > 0) {
  //   new Waypoint({
  //     element: document.getElementById("nowkonn__common"),
  //     handler: function (direction) {
  //       jQuery("#nowkonn__common").addClass(
  //         "eff_actived animate__animated animate__fadeIn"
  //       );
  //       jQuery("#nowkonn__common .nowkonn__common__flex").addClass(
  //         "eff_actived animate__animated animate__fadeIn"
  //       );
  //       jQuery("#nowkonn__common .nowkonn__common__thumb").addClass(
  //         "eff_actived animate__animated animate__fadeIn"
  //       );
  //     },
  //     offset: "70%",
  //   });
  // }

  if (jQuery("#nowkonn__banner").length > 0) {
    new Waypoint({
      element: document.getElementById("nowkonn__banner"),
      handler: function (direction) {
        jQuery("#nowkonn__banner").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#nowkonn__banner .nowkonn__banner__title").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#nowkonn__banner .nowkonn__banner__des").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#nowkonn__banner .nowkonn__banner__item01").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery("#nowkonn__banner .nowkonn__banner__item02").addClass(
          "eff_actived animate__animated animate__fadeInUp"
        );
        jQuery("#nowkonn__banner .nowkonn__banner__item03").addClass(
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
        jQuery("#cate_i_1 .nowkonn__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .nowkonn__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_1 .nowkonn__slides").addClass(
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
        jQuery("#cate_i_2 .nowkonn__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .nowkonn__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_2 .nowkonn__slides").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#cate_i_3").length > 0) {
    new Waypoint({
      element: document.getElementById("cate_i_3"),
      handler: function (direction) {
        jQuery("#cate_i_3").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_3 .nowkonn__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_3 .nowkonn__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_3 .nowkonn__slides").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#cate_i_4").length > 0) {
    new Waypoint({
      element: document.getElementById("cate_i_4"),
      handler: function (direction) {
        jQuery("#cate_i_4").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_4 .nowkonn__common__content--tit").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_4 .nowkonn__common__content--des").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#cate_i_4 .nowkonn__slides").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery(".nowkonn__info").length > 0) {
    new Waypoint({
      element: document.getElementsByClassName("nowkonn__info"),
      handler: function (direction) {
        jQuery(".nowkonn__info").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }
});
