jQuery(document).ready(function () {
  var contactForm = jQuery(".contactForm");
  contactForm.submit(function (event) {
    var formID = jQuery(this).attr("id");
    var currentForm = jQuery("#" + formID);
    currentForm.find(".contactForm__submit").prop("disabled", true);
    var contactForm__name = currentForm.find(".contactForm__name").val();
    var contactForm__phone = currentForm.find(".contactForm__phone").val();
    var contactForm__email = currentForm.find(".contactForm__email").val();
    var nonceValue = currentForm.find(".nonce").val();
    var formTermID = currentForm.find(".contactForm__term").val();

    if (contactForm__name == "") {
      currentForm.find(".contactForm__name").addClass("required");
    } else {
      currentForm.find(".contactForm__name").removeClass("required");
    }

    if (phoneVail(contactForm__phone) == false) {
      currentForm.find(".contactForm__phone").addClass("required");
    } else {
      currentForm.find(".contactForm__phone").removeClass("required");
    }

    if (emailVail(contactForm__email) == false) {
      currentForm.find(".contactForm__email").addClass("required");
    } else {
      currentForm.find(".contactForm__email").removeClass("required");
    }

    if (
      contactForm__name &&
      phoneVail(contactForm__phone) &&
      emailVail(contactForm__email) &&
      nonceValue &&
      formTermID
    ) {
      console.log(formTermID);
      var contact__data = {
        action: "add_contact",
        name: contactForm__name,
        phone: contactForm__phone,
        formname: formID,
        nonce: nonceValue,
        termID: formTermID,
      };
      jQuery.ajax({
        type: "post",
        dataType: "json",
        url: global_params.ajaxurl,
        data: contact__data,
        success: function (response) {
          var kpopup = jQuery("#kpopup__common");
          var kpopMsg = kpopup.find(".kpopup__common__desc");
          if (response.type == "success") {
            kpopMsg.html(response.msg);
            kpopup.addClass("animate__animated animate__fadeIn");
            //Clear up input fields
            currentForm.find(".contactForm__name").val("");
            currentForm.find(".contactForm__phone").val("");
            currentForm.find(".contactForm__email").val("");
            currentForm.find(".contactForm__submit").prop("disabled", false);
          } else {
            kpopMsg.html(response.msg);
            kpopup.addClass("animate__animated animate__fadeIn");
            currentForm.find(".contactForm__submit").remove();
          }
        },
      });
    }

    return false;
  });
});
