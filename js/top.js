$(window).bind("load", function () {
  "use strict";

  if ($(window).width() > 750) {
    AOS.init({
      once: "true",
      duration: 1200,
    });
  } else {
    AOS.init({ disable: "mobile" });
    $('.sc_temp ul').slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
    });
  }


  $("#tabs-nav .tab:first-child").addClass("active");
  $(".tab-content").hide();
  $(".tab-content:first").show();

  $("#tabs-nav .tab").click(function () {
   
    $("#tabs-nav .tab").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();

    var activeTab = $(this).find("a").attr("href");
    if ($(window).width() < 750) {
      $(activeTab).fadeIn("0", function () {
      // click tab reload slick
        $('.sc_temp ul').slick('refresh');
      });
    }
    else {
      $(activeTab).fadeIn();
    }
    return false;
  });
});
