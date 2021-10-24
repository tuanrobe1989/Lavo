jQuery(document).ready(function () {
  if (jQuery(".yourway__banner__slides").length > 0) {
    jQuery(".yourway__banner__slides").owlCarousel({
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
  }

  jQuery(".yourway-highlight__slider").owlCarousel({
    lazyLoad: true,
    nav: true,
    // center:true,
    // autoWidth:true,
    margin: 16,
    // stagePadding: 32,
    mouseDrag: true,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      580: {
        items: 2,
      },
      767: {
        items: 3,
      },
      980: {
        items: 4,
      },
    },
  });

  if (jQuery("#yourway__banner").length > 0) {
    new Waypoint({
      element: document.getElementById("yourway__banner"),
      handler: function (direction) {
        jQuery("#yourway__banner").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway__banner .yourway__banner__title").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#yourway__banner .yourway__banner__des").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#yourway__banner .yourway__banner__item01").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery("#yourway__banner .yourway__banner__item02").addClass(
          "eff_actived animate__animated animate__fadeInUp"
        );
        jQuery("#yourway__banner .yourway__banner__item03").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#yourway_cate_1").length > 0) {
    new Waypoint({
      element: document.getElementById("yourway_cate_1"),
      handler: function (direction) {
        jQuery("#yourway_cate_1").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_1 .yourway-highlight__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_1 .yourway-highlight__desc").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_1 .yourway-highlight__slider").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#yourway_cate_2").length > 0) {
    new Waypoint({
      element: document.getElementById("yourway_cate_2"),
      handler: function (direction) {
        jQuery("#yourway_cate_2").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_2 .yourway-highlight__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_2 .yourway-highlight__desc").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_2 .yourway-highlight__slider").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery('.yourway-highlight__item__name').matchHeight();
      },
      offset: "70%",
    });
  }

  if (jQuery("#yourway_cate_3").length > 0) {
    new Waypoint({
      element: document.getElementById("yourway_cate_3"),
      handler: function (direction) {
        jQuery("#yourway_cate_3").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_3 .yourway-highlight__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_3 .yourway-highlight__desc").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#yourway_cate_3 .yourway-highlight__slider").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
      },
      offset: "70%",
    });
  }
});
