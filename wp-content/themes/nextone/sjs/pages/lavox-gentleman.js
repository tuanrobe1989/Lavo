highlightHandler = function () {
  var faqItem = jQuery(".gentleman-question__item-wrapper");

  faqItem.click(function () {
    if (jQuery(this).hasClass("active") == false) {
      jQuery(this).addClass("active");
    } else {
      jQuery(this).removeClass("active");
    }
  });
};
jQuery(document).ready(function () {
  highlightHandler();

  if (jQuery(".gentleman-highlight__item__name").length > 0) {
    jQuery(".gentleman-highlight__item__name").matchHeight();
  }

  jQuery("#gentleman-highlight__slider").owlCarousel({
    // items:1,
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

  if (jQuery("#gentleman-header").length > 0) {
    new Waypoint({
      element: document.getElementById("gentleman-header"),
      handler: function (direction) {
        jQuery("#gentleman-header").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery("#gentleman-header .gentleman-header__logo").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#gentleman-header .gentleman-header__desc").addClass(
          "eff_actived animate__animated animate__fadeIn animate__delay-1s"
        );
        jQuery("#gentleman-header .gentleman-header__nav").addClass(
          "eff_actived animate__animated animate__fadeInUp animate__delay-1s"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#gentleman-brand").length > 0) {
    new Waypoint({
      element: document.getElementById("gentleman-brand"),
      handler: function (direction) {
        jQuery("#gentleman-brand").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".gentleman-brand__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".gentleman-brand__img-wrapper").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".gentleman-brand__info").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#gentleman-highlight").length > 0) {
    new Waypoint({
      element: document.getElementById("gentleman-highlight"),
      handler: function (direction) {
        jQuery("#gentleman-highlight").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".gentleman-highlight__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".gentleman-highlight__slider").addClass(
          "eff_actived animate__animated animate__fadeInUp"
        );
      },
      offset: "70%",
    });
  }

  if (jQuery("#gentleman-question").length > 0) {
    new Waypoint({
      element: document.getElementById("gentleman-question"),
      handler: function (direction) {
        jQuery("#gentleman-question").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".gentleman-question__title").addClass(
          "eff_actived animate__animated animate__fadeIn"
        );
        jQuery(".gentleman-question__question").addClass(
          "eff_actived animate__animated animate__fadeInLeft"
        );
        jQuery(".gentleman-question__answer").addClass(
          "eff_actived animate__animated animate__fadeInRight"
        );
      },
      offset: "70%",
    });
  }

  if(jQuery('.gentleman-highlight__item').length > 0){
    jQuery('.gentleman-highlight__item').matchHeight();
  }

});
