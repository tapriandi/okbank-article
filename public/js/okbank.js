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

  const classAnimate = ['gallery'];
  classAnimate.forEach(function(e) {
    jQuery(`${'a.' + e}`).click(function() {
      jQuery('body, html').animate({scrollTop: jQuery(`${'#' + e}`).offset().top}, 1000);
    });
  });

  // share to social media
  jQuery('.btn-share-to-facebook').click(function(){
    tmp = {};
    tmp.method = 'share';
    tmp.href = jQuery(this).data('href');
    FB.ui(tmp);
  });
  
  jQuery('.btn-share-to-twitter').click(function(){
    // msg = encodeURI(jQuery('title').text().trim()).replace('#','%23');
    msg = jQuery.trim(jQuery(this).data('title')).substring(0, 140);
    href = jQuery.trim(jQuery(this).data('href'));
    window.open('http://twitter.com/share?' 
    // +'&text=' + jQuery.trim(msg.replace(/["']/g, "")).substring(0, 140).trim(this) + "&hellip;"
    +'&text=' + encodeURIComponent(msg)
    + '&url=' + encodeURIComponent(href)
    + '&', 'twitterwindow', 'height=450, width=550, top='
    + (jQuery(window).height()/2 - 225) +', left=' + jQuery(window).width()/2 
    +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
  });

});