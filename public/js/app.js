'use strict';

function preventPullToRefresh(element) {
  var prevent = false;

  document.querySelector(element).addEventListener('touchstart', function (e) {
    if (e.touches.length !== 1) {
      return;
    }

    var scrollY = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;
    prevent = scrollY === 0;
  });

  document.querySelector(element).addEventListener('touchmove', function (e) {
    if (prevent) {
      prevent = false;
      e.preventDefault();
    }
  });
}
preventPullToRefresh('#app');

// VARIABLES
var APP = $('#app');
APP.viewport = APP.find('#viewport');
APP.screens = APP.find('.app-screen');
APP.nav = APP.find('#nav ul');
APP.menu = APP.find('#menu');

if (APP.screens.length === 1) {
  APP.find('#nav').remove();
}

var upTimeout = void 0,
    downTimeout = void 0;

// init scrolls
document.querySelectorAll('.scroll-block').forEach(function (el) {
  var ps = new PerfectScrollbar(el, {
    suppressScrollX: true
  });
});
new PerfectScrollbar(document.querySelector('.menu-scroll'));

// EVENTS
$(window).on('load', function (e) {
  // make 1'st screen active
  APP.addClass('loaded');
  APP.screens.css('top', '-100%').css('z-index', '1').removeClass('active').eq(0).css('top', '0%').css('z-index', '2').addClass('active animated');
  APP.trigger('screen_changed');
  jQuery('.pop-up--closer, .opacity').on('click', function() {
    jQuery('.opacity, .pop-up').fadeOut(300);
  })
});
$('#menubtn').on('click', function () {
  $(this).toggleClass('active');
  APP.toggleClass('ready_to_change_screen').toggleClass('menu-open');
  APP.menu.toggleClass('active');
});
$(document).on('keydown', function (e) {
  if (e.keyCode === 38) {
    goToScreen(APP.find('.app-screen.active').index() - 1);
  }
  if (e.keyCode === 40) {
    goToScreen(APP.find('.app-screen.active').index() + 1);
  }
});
$(window).on('wheel', function (e) {
  if (e.originalEvent.deltaY < 0) {
    goToScreen(APP.find('.app-screen.active').index() - 1);
  }
  if (e.originalEvent.deltaY > 0) {
    goToScreen(APP.find('.app-screen.active').index() + 1);
  }
});
APP.nav.on('click', 'li', function (e) {
  goToScreen($(e.target).index(), false);
});
APP.on('screen_change', function (e, index) {
  APP.removeClass('ready_to_change_screen on_top on_bottom');
  APP.nav.find('li').removeClass('active').eq(index).addClass('active');
  APP.screens.eq(index).addClass('animated');
});
APP.on('screen_changed', function () {
  reviewActiveScreenProps();
  APP.addClass('ready_to_change_screen');
});
APP.screens.on('scroll', function () {
  reviewActiveScreenProps();
});
$(document).on('touchstart', function (e) {
  var maxX = 120;
  var minY = 100;
  var touch = true;
  var startPointX = void 0,
      startPointY = void 0,
      endPointX = void 0,
      endPointY = void 0,
      resultX = void 0,
      resultY = void 0,
      direction = void 0;

  startPointX = e.originalEvent.changedTouches[0].clientX;
  startPointY = e.originalEvent.changedTouches[0].clientY;

  $(document).on('touchend', function (e) {
    if (touch) {
      endPointX = e.originalEvent.changedTouches[0].clientX;
      endPointY = e.originalEvent.changedTouches[0].clientY;
      resultX = endPointX > startPointX ? endPointX - startPointX : startPointX - endPointX;
      resultY = endPointY > startPointY ? endPointY - startPointY : startPointY - endPointY;
      direction = endPointY > startPointY ? 'up' : 'down';
      if (resultX <= maxX && resultY >= minY) {
        if (direction === 'up') {
          goToScreen(APP.find('.app-screen.active').index() - 1);
        }
        if (direction === 'down') {
          goToScreen(APP.find('.app-screen.active').index() + 1);
        }
      }
      touch = false;
    }
  });
});
$('.app-screen-tab_nav-item').on('click', function () {
  if ($(this).hasClass('active')) {
    return;
  }
  var index = $(this).index();
  $(this).addClass('active').siblings().removeClass('active');
  $(this).closest('.app-screen').find('.app-screen-tabs-tab').removeClass('active').eq(index).addClass('active animated');
  $(this).closest('.app-screen').scrollTop(0);
});

// LOGIC
// add index to screens
APP.screens.map(function (index, element) {
  $(element).attr('data-index', index);
  if (APP.screens.length > 1) {
    var i = index + 1;
    APP.nav.append('<li data-text="' + (i < 10 ? '0' + i : i) + '" ' + (index === 0 ? 'class="active"' : '') + '>' + (i < 10 ? '0' + i : i) + '</li>');
  }
});

// FUNCTIONS
function goToScreen(index) {
  var checkPosition = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

  var currentIndex = APP.find('.app-screen.active').index();
  if (currentIndex === index || index === -1 || index > APP.screens.length - 1 || $('body').hasClass('no-scroll')) {
    return false;
  }
  if (APP.hasClass('ready_to_change_screen')) {
    if (checkPosition) {
      if (currentIndex - index > 0 && !APP.hasClass('on_top')) {
        return;
      }
      if (currentIndex - index < 0 && !APP.hasClass('on_bottom')) {
        return;
      }
    }
    APP.trigger('screen_change', [index]);
    if (index > APP.find('.app-screen.active').index()) {
      APP.screens.eq(index).css('top', '100%');
      APP.find('.app-screen.active').animate({
        top: '-100%'
      }, 1400, 'swing');
    } else {
      APP.screens.eq(index).css('top', '-100%');
      APP.find('.app-screen.active').animate({
        top: '100%'
      }, 1400, 'swing');
    }
    APP.screens.eq(index).scrollTop(0).css('z-index', '3').animate({
      top: '0%'
    }, 1000, 'swing', function () {
      APP.screens.eq(index).css('z-index', '2').addClass('active').siblings().removeClass('active').css('top', '-100%').css('z-index', '1');
      APP.trigger('screen_changed');
    });
  }
}
function reviewActiveScreenProps() {
  var activeScreen = APP.find('.app-screen.active');
  var innBlock = activeScreen.find('.app-screen-inn');
  clearTimeout(upTimeout);
  clearTimeout(downTimeout);
  APP.removeClass('on_top on_bottom');
  if (activeScreen.innerHeight() >= innBlock.outerHeight()) {
    APP.addClass('on_top on_bottom');
    return;
  }
  if (activeScreen.scrollTop() === 0) {
    upTimeout = setTimeout(function () {
      APP.addClass('on_top');
    }, 500);
  }
  if (activeScreen.scrollTop() + activeScreen.innerHeight() === innBlock.outerHeight()) {
    downTimeout = setTimeout(function () {
      APP.addClass('on_bottom');
    }, 500);
  }
}

APP.on('screen_changed', function () {
  if ($('.app-screen.active').find('.resumescreen_2-skills-block').length) {
    $('.app-screen.active').find('.resumescreen_2-skills-block-line').map(function (index, element) {
      var width = $(element).attr('data-width');
      $(element).find('.resumescreen_2-skills-block-line-inn').css('width', width + '%');
    });
  }
});

$('.resumescreen_3-slider').slick({
  prevArrow: $('.resumescreen_3-slider_arrs-arr.__left'),
  nextArrow: $('.resumescreen_3-slider_arrs-arr.__right'),
  infinite: false,
  slidesToShow: 3,
  responsive: [{
    breakpoint: 1400,
    settings: {
      slidesToShow: 2
    }
  }, {
    breakpoint: 600,
    settings: {
      slidesToShow: 1
    }
  }]
});

$('.projectsscreen_1-slider').slick({
  arrows: false,
  infinite: false,
  slidesToShow: 4,
  dots: true,
  responsive: [{
    breakpoint: 1400,
    settings: {
      slidesToShow: 3
    }
  }, {
    breakpoint: 1000,
    settings: {
      slidesToShow: 2
    }
  }, {
    breakpoint: 650,
    settings: {
      slidesToShow: 1
    }
    // {
    //   breakpoint: 801,
    //   settings: {
    //     slidesToShow: 1,
    //   }
    // }
  }]
});

if ($('.select-box').length) {
  $('.select-box').each(function() {
    var select = $(this),
          wrap = $(this).parent();
    wrap.append('<div class="select-replace" data-selected="0">' + select.children('option:eq(0)').text() + '</div>');
    wrap.append('<div class="select-replace--drop"></div>');
    select.find('option').each(function() {
      if ($(this).index() === 0) {
        return 0
      }
      wrap.children('.select-replace--drop').append('<div data-value="' + $(this).attr('value') + '">' + $(this).text() + '</div>')
    })
    wrap.on('click', function() {
      if ($(this).find('.select-replace--drop').is(':visible')) {
        $(this).find('.select-replace--drop').slideUp(300)
        wrap.find('.select-box--drop-icon').removeClass('opened')
      } else {
        $(this).find('.select-replace--drop').slideDown(300)
        wrap.find('.select-box--drop-icon').addClass('opened')
      }
      
    })
    wrap.find('.select-replace--drop > div').on('click', function() {
      var t = $(this).text();
      wrap.find('.select-replace').attr('data-selected', $(this).attr('data-value')).text(t)
      select.val($(this).attr('data-value'))
      wrap.find('.select-box--drop-icon').removeClass('opened')
    })
  })
}
$("#contactsForm").on('submit', function(event) {
  var invalid = false;
  $(this).find('.input[data-state="required"]').each(function() {
    if ($(this).val() == '') {
      $(this).parent().addClass('wrong')
      invalid = true;
    }
  })
  if ($(this).find('#topic').val() == 0) {
    invalid = true;
    $(this).find('.select-box--wrapper').addClass('wrong');
  }
  if (invalid) {
    event.preventDefault()
  } else {
    event.preventDefault()

    var name = $('input[name=name]').val();
    var email = $('input[name=email]').val();
    var contact = $('input[name=contact]').val();
    var caption = $('select[name=topic]').val();
    var message = $('textarea[name=message]').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".opacity, .preloader").fadeIn(100);

    $.ajax({
        type: 'POST',
        url: '/contacts',
        data:{
            name: name,
            email: email,
            contact: contact,
            caption: caption,
            message: message
        },
        success: function() {
            jQuery('.preloader').fadeOut();
            jQuery('.pop-up').fadeIn(300);

            $("#contactsForm").find('#topic').parent().children('.select-replace').remove()
            $("#contactsForm").find('#topic').parent().children('.select-replace--drop').remove()
            $("#contactsForm").find('#topic').val(0)
            $('.select-box').parent().unbind()
            $('.select-box').each(function() {
                var select = $(this),
                    wrap = $(this).parent();
                wrap.append('<div class="select-replace" data-selected="0">' + select.children('option:eq(0)').text() + '</div>');
                wrap.append('<div class="select-replace--drop"></div>');
                select.find('option').each(function() {
                    if ($(this).index() === 0) {
                        return 0
                    }
                    wrap.children('.select-replace--drop').append('<div data-value="' + $(this).attr('value') + '">' + $(this).text() + '</div>')
                })
                wrap.on('click', function() {
                    if ($(this).find('.select-replace--drop').is(':visible')) {
                        $(this).find('.select-replace--drop').slideUp(300)
                        wrap.find('.select-box--drop-icon').removeClass('opened')
                    } else {
                        $(this).find('.select-replace--drop').slideDown(300)
                        wrap.find('.select-box--drop-icon').addClass('opened')
                    }

                })
                wrap.find('.select-replace--drop > div').on('click', function() {
                    var t = $(this).text();
                    wrap.find('.select-replace').attr('data-selected', $(this).attr('data-value')).text(t)
                    select.val($(this).attr('data-value'))
                    wrap.find('.select-box--drop-icon').removeClass('opened')
                })
            })

            $('#contactsForm').trigger("reset");
            $('.wrong').removeClass('wrong');
        }
    });
  }
});
jQuery('.cooperation_5-slider-block').slick({
  fnCanGoNext: function(a,b) {return true},
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: false,
  arrows: false,
  dots: false,
  asNavFor: '.cooperation_5-images'
})
jQuery('.cooperation_5-images').slick({
  fnCanGoNext: function(a,b) {return true},
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: false,
  asNavFor: '.cooperation_5-slider-block',
  arrows: true,
  appendArrows: $('.cooperation_5-arrows'),
  prevArrow: '<a href="javascript:void(0)" class="slider-arrow_small slider-arrow_small_left"><svg class="icon"><use xlink:href="./img/template/svg-sprite.svg#arrow-icon"></svg></a>',
  nextArrow: '<a href="javascript:void(0)" class="slider-arrow_small"><svg class="icon"><use xlink:href="./img/template/svg-sprite.svg#arrow-icon"></svg></a>',
  centerMode: true,
  focusOnSelect: true,
  centerPadding: 0
})
jQuery('.cooperation_5-images .image-slide:first-of-type').addClass('animated')
jQuery('.cooperation_5-images').on('afterChange', function(event, slick, currentSlide) {
  jQuery('.cooperation_5-images .slick-slide.animated').removeClass('animated')
  jQuery('.cooperation_5-images .slick-slide[data-slick-index="' + (currentSlide) + '"]').addClass('animated')
})

