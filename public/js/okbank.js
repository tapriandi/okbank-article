jQuery(document).ready(function () {
  jQuery('.article-slider').slick({
    infinite: false,
    dots: false,
    arrows: false,
    slidesToShow: 3,
    swipeToSlide: true,
    responsive: [{
      breakpoint: 480,
      settings: {
        slidesToShow: 2.2
      }
    }]
  });

  jQuery('.article-slider-2').slick({
    infinite: false,
    dots: false,
    arrows: false,
    slidesToShow: 1.5,
    swipeToSlide: true,
    responsive: [{
      breakpoint: 480,
      settings: {
        slidesToShow: 1.5
      }
    }]
  });

  jQuery('.hamburger').click(function () {
    jQuery('header .menu').toggleClass('active');
    jQuery('.hamburger').toggleClass('active');
  });
  jQuery('.search img.open').click(function () {
    jQuery('.search input').addClass('active');
    jQuery(this).css({display: 'none'});
    jQuery('#input-search').focus();
    jQuery('.search img.close').css({display: 'block'});
  });
  jQuery('.search img.close').click(function () {
    jQuery('.search input').removeClass('active');
    jQuery(this).css({display: 'none'});
    jQuery('.search img.open').css({display: 'block'});
  });

  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("header").style.top = "0";
      document.getElementById("header").style.transition = "0.8s";
    } else {
      document.getElementById("header").style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
  }

  const pathname = jQuery(location).attr("href").split('/').pop();
  console.log(pathname);
  if (pathname == 'finansial') {
    console.log('masuk 1');
    jQuery('.menu ul li.a').addClass('active');
    jQuery('.menu ul li.b').removeClass('active');
    jQuery('.menu ul li.c').removeClass('active');
  } else if (pathname == 'karir-&-sukses') {
    console.log('masuk 2');

    jQuery('.menu ul li.a').removeClass('active');
    jQuery('.menu ul li.b').addClass('active');
    jQuery('.menu ul li.c').removeClass('active');
  } else if (pathname == 'gaya-hidup') {
    console.log('masuk 3');

    jQuery('.menu ul li.a').removeClass('active');
    jQuery('.menu ul li.b').removeClass('active');
    jQuery('.menu ul li.c').addClass('active');
  }

});