$(document).ready(function () {
  $(".js-toggle-navi").click(function () {
    $(".header").toggleClass("on-nav");
    $("body").toggleClass("overflow-hidden");
  });

  $(window).scroll(function () {
    let header = $("header").innerHeight();
    if ($(this).scrollTop()) {
      $(".backtotop").fadeIn();
      // $(".header").addClass("fixed");
      // $("body").css("padding-top", header);
    } else {
      $(".backtotop").fadeOut();
      // $(".header").removeClass("fixed");
      // $("body").css("padding-top", "0");
    }
  });
  // nav-link
  const widtScreen = window.innerWidth;
  let topMenu = 150;
  if (widtScreen < 768) {
    topMenu = 80;
  }
  // anker link
  $('a[href*="#"]:not([href="#"])').click(function () {
    $(".header").removeClass("on-nav");
    $("body").removeClass("overflow-hidden");
    let target = $(this.hash);
    $("html, body").animate(
      {
        scrollTop: target.offset().top - topMenu,
      },
      800
    );
    return false;
  });

});

$(document).ready(function () {
  var modal = $(".modal");
  var btn = $(".btn-show");
  var span = $(".close");

  btn.click(function () {
    modal.show();
    $("body").addClass("overflow-hidden");
  });

  span.click(function () {
    modal.hide();
    $("body").removeClass("overflow-hidden");
  });

  $(window).on("click", function (e) {
    if ($(e.target).is(".modal")) {
      modal.hide();
      $("body").removeClass("overflow-hidden");
    }
  });
});
// $(document).ready(function() {
//   let isScrolling = false;
//   let scrollTimeout;

//   function scrollToSection(index) {
//       if (isScrolling) return;
//       isScrolling = true;

//       $('html, body').animate({
//           scrollTop: $(window).height() * index
//       }, 600, function() {
//           isScrolling = false;
//       });
//   }

//   function handleScroll(event) {
//       if (isScrolling) return;

//       clearTimeout(scrollTimeout);
//       scrollTimeout = setTimeout(() => {
//           let currentIndex = Math.floor($(window).scrollTop() / $(window).height());
//           let nextIndex = event.originalEvent.deltaY > 0 ? currentIndex + 1 : currentIndex - 1;
//           nextIndex = Math.max(0, Math.min($('.section').length - 1, nextIndex));
//           scrollToSection(nextIndex);
//       }, 150); // Thời gian delay để tránh cuộn liên tục
//   }

//   $(window).on('wheel', handleScroll);

//   $(window).on('resize', function() {
//       $('.section').css('height', $(window).height());
//       $('html, body').scrollTop($(window).height() * Math.floor($(window).scrollTop() / $(window).height()));
//   }).trigger('resize');
// });