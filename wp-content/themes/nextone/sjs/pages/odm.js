jQuery(document).ready(function () {
  if (jQuery(".odm-services__detail-list").length > 0) {
    jQuery(".odm-services__detail-list").owlCarousel({
      lazyLoad: true,
      nav: true,
      dots: true,
      items: 1,
      center: true,
      margin: 32,
    });
  }

  if (jQuery(".odm-services__info__item").length > 0) {
    jQuery(".odm-services__info__item").click(function () {
      var click_id = jQuery(this).attr("data-tab-id");
      jQuery(".odm-services__detail-list .owl-dots .owl-dot")
        .eq(click_id)
        .trigger("click");
    });
  }

  if (jQuery("#odm-banner").length > 0) {
    new Waypoint({
      element: document.getElementById("odm-banner"),
      handler: function (direction) {
        jQuery("#odm-banner").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#odm-banner .odm-banner__title").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#odm-banner .odm-banner__desc").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#odm-banner .odm-banner__CTA").addClass(
          "eff_actived animate__animated animate__fadeInUp animate__delay-1s"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#odm-services").length > 0) {
    new Waypoint({
      element: document.getElementById("odm-services"),
      handler: function (direction) {
        jQuery("#odm-services").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-services__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-services__detail").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".odm-services__info").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#odm-processes").length > 0) {
    new Waypoint({
      element: document.getElementById("odm-processes"),
      handler: function (direction) {
        jQuery("#odm-processes").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-processes__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-processes__info").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".odm-processes__img").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#odm-advisory").length > 0) {
    new Waypoint({
      element: document.getElementById("odm-advisory"),
      handler: function (direction) {
        jQuery("#odm-advisory").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-advisory__item01").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".odm-advisory__item02").addClass(
          "eff_actived animate__animated animate__fadeInUp"
        );
        jQuery(".odm-advisory__item03").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#odm-sucesses").length > 0) {
    new Waypoint({
      element: document.getElementById("odm-sucesses"),
      handler: function (direction) {
        jQuery("#odm-sucesses").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-sucesses__logo").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-sucesses__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-sucesses__list").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-sucesses__info").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
        jQuery(".odm-sucesses__left-img").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".odm-sucesses__right-img").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
        jQuery(".odm-sucesses__info-certification").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#odm-register").length > 0) {
    new Waypoint({
      element: document.getElementById("odm-register"),
      handler: function (direction) {
        jQuery("#odm-register").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".odm-register__wrapper").addClass(
          "eff_actived animate__animated animate__fadeInUp"
        );
      },
      offset: "70%",
    });
  }
});
