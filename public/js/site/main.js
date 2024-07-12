(function($) {
    "use strict";

    $('.searchbtn').on('click', function() {
        $('.search-area').addClass('open');
    });
    $('.close-searchbox').on('click', function() {
        $('.search-area').removeClass('open');
    });

    /* -------------------------------------
           Hero Slider
    // -------------------------------------- */

    var news_slider = new Swiper(".hero-slider-one", {
        spaceBetween: 10,

    });
    var news_thumb_slider = new Swiper(".hero-slider-two", {
        spaceBetween: 25,
        centeredSlides: true,
        roundLengths: true,
        loop: true,
        speed: 1500,
        loopAdditionalSlides: 30,
        navigation: {
            nextEl: ".hero-two-next",
            prevEl: ".hero-two-prev"
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,

            },
            768: {
                slidesPerView: 1.2

            },
            992: {
                slidesPerView: 1.2

            },
            1200: {
                slidesPerView: 1.1
            },
            1500: {
                slidesPerView: 1.45
            }
        }
    });
    /* -------------------------------------
           Service Slider
     -------------------------------------- */
    var news_thumb_slider = new Swiper(".news-img-slider-thumb", {
        loop: true,
        spaceBetween: 30,
        autoplay: {
            delay: 2000,
            disableOnInteraction: true,
        },
        slidesPerView: 3,
        speed: 1500,
        freeMode: true,
        observer: true,
        observeParents: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: {
                slidesPerView: 1

            },
            768: {
                slidesPerView: 2

            },
            1200: {
                direction: "vertical"

            }
        }
    });
    var swiper2 = new Swiper(".news-img-slider", {
        loop: true,
        spaceBetween: 10,
        speed: 1500,

        thumbs: {
            swiper: news_thumb_slider,
        },
    });
    var news_thumb_slider = new Swiper(".feature-news-slider", {
        loop: true,
        spaceBetween: 30,
        autoplay: {
            delay: 2000,
            disableOnInteraction: true,
        },
        slidesPerView: 3,
        speed: 1500,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".feature-one-next",
            prevEl: ".feature-one-prev"
        },
        calculateHeight: true,
        breakpoints: {
            0: {
                slidesPerView: 1

            },

            992: {
                slidesPerView: 2

            },
            1200: {
                slidesPerView: 2

            }
        }
    });

    var listArray = ["slide1", "slide2", "slide3"];
    var business_slider = new Swiper('.business-slider', {
        loop: true,
        autoplayDisableOnInteraction: false,
        slidesPerView: 1,
        autoHeight: true,
        autoplay: {
            delay: 6000,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 1200,
        pagination: {
            el: '.swiper-pagination',
            clickable: 'true',
            type: 'bullets',
            renderBullet: function(index, className) {
                return '<span class="' + className + '">' + '<i></i>' + '<b></b>' + '</span>';
            },

        },


    })

    /* -------------------------------------
           Top News Slider
    // -------------------------------------- */
    var project_slider_one = new Swiper('.top-news-slider', {
        spaceBetween: 30,
        slidesPerView: 1,
        autoplay: {
            delay: 6000,
            disableOnInteraction: true,
        },
        effect: 'fade',
        observer: true,
        observeParents: true,
        speed: 1500,
        loop: true,
        pagination: {
            el: ".top-news-pagination",
            clickable: true,
        },

    });

    var slider_two = new Swiper('.latest-news-slider', {
        spaceBetween: 20,
        slidesPerView: 3,
        autoplay: {
            delay: 6000,
            disableOnInteraction: true,
        },
        observer: true,
        observeParents: true,
        speed: 1500,
        loop: true,
        navigation: {
            nextEl: ".latest-next",
            prevEl: ".latest-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1

            },
            400: {
                slidesPerView: 1.4

            },
            768: {
                slidesPerView: 2

            },
            1200: {
                slidesPerView: 2,
                spaceBetween: 25,

            },
            1440: {
                slidesPerView: 3,
                spaceBetween: 25,

            }
        }

    });
    var slider_two = new Swiper('.travel-news-slider', {
        spaceBetween: 20,
        slidesPerView: 3,
        autoplay: {
            delay: 6000,
            disableOnInteraction: true,
        },
        observer: true,
        observeParents: true,
        speed: 1500,
        loop: true,
        navigation: {
            nextEl: ".travel-next",
            prevEl: ".travel-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1

            },
            400: {
                slidesPerView: 1.4

            },
            768: {
                slidesPerView: 2

            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 25,

            }
        }

    });
    var slider_two = new Swiper('.travel-news-slider-two', {
        spaceBetween: 20,
        slidesPerView: 3,
        autoplay: {
            delay: 6000,
            disableOnInteraction: true,
        },
        observer: true,
        observeParents: true,
        speed: 1500,
        loop: true,
        navigation: {
            nextEl: ".travel-next-two",
            prevEl: ".travel-prev-two",
        },
        breakpoints: {
            0: {
                slidesPerView: 1

            },
            480: {
                slidesPerView: 2

            },
            992: {
                slidesPerView: 3

            },
            1200: {
                slidesPerView: 2,
                spaceBetween: 25,

            }
        }

    });

    var slider_two = new Swiper('.sports-news-slider', {
        spaceBetween: 20,
        slidesPerView: 1,
        autoplay: {
            delay: 6000,
            disableOnInteraction: true,
        },
        observer: true,
        observeParents: true,
        speed: 1500,
        loop: true,
        pagination: {
            el: ".sports-pagination",
            clickable: true,
        },

    });
    var slider_two = new Swiper('.politics-news-slider', {
        spaceBetween: 20,
        slidesPerView: 1,
        autoplay: {
            delay: 6000,
            disableOnInteraction: true,
        },
        observer: true,
        observeParents: true,
        speed: 1500,
        loop: true,
        pagination: {
            el: ".politics-pagination",
            clickable: true,
        },

    });



    /* -------------------------------------
          Instagram Slider
    -------------------------------------- */
    var instagram_slider_one = new Swiper('.instagram-slider', {
        spaceBetween: 6,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        centeredSlide: true,
        // observer: true,
        // observeParents: true,
        speed: 1500,
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 4,

            },
            768: {
                slidesPerView: 3,

            },
            992: {
                slidesPerView: 4,

            },
            1200: {
                slidesPerView: 5,

            },

            1500: {
                slidesPerView: 6,

            }
        }
    });
    /* ----------------------------------------
           Magnific Popup Video
     ------------------------------------------*/
    $('.video-play').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        preloader: true,
    });


    /* -------------------------------------
          Mobile Topbar
    -------------------------------------- */

    $('.mobile-top-bar').on('click', function() {
        $('.header-top-right').addClass('open')
    });
    $('.close-header-top').on('click', function() {
        $('.header-top-right').removeClass('open')
    });

    /* -------------------------------------
          sticky Header
    -------------------------------------- */
    var wind = $(window);
    var sticky = $('.header-wrap');
    wind.on('scroll', function() {
        var scroll = wind.scrollTop();
        if (scroll < 100) {
            sticky.removeClass('sticky');
        } else {
            sticky.addClass('sticky');
        }
    });

    /*---------------------------------
        Responsive mmenu
    ---------------------------------*/
    $('.mobile-menu a').on('click', function() {
        $('.main-menu-wrap').addClass('open');
        $('.mobile-bar-wrap.style2 .mobile-menu').addClass('open');
    });

    $('.mobile_menu a').on('click', function() {
        $(this).parent().toggleClass('open');
        $('.main-menu-wrap').toggleClass('open');
    });

    $('.menu-close').on('click', function() {
        $('.main-menu-wrap').removeClass('open')
    });
    $('.mobile-top-bar').on('click', function() {
        $('.header-top').addClass('open')
    });
    $('.close-header-top button').on('click', function() {
        $('.header-top').removeClass('open')
    });
    var $offcanvasNav = $('.main-menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="las la-angle-down"></i></span>');

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if (($this.parent().attr('class').match(/\b(has-children|sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if ($this.is('a') || $this.is('span') || $this.attr('class').match(/\b(menu-expand)\b/)) {
            $this.parent().toggleClass('menu-open');
        } else if ($this.is('li') && $this.attr('class').match(/\b('has-children')\b/)) {
            $this.toggleClass('menu-open');
        }
    });

    /*-------------------------------------
         Scroll to top
    ----------------------------------*/

    // Show or hide the  button
    $(window).on('scroll', function(event) {
        if ($(this).scrollTop() > 600) {
            $('.back-to-top').fadeIn(200)
        } else {
            $('.back-to-top').fadeOut(200)
        }
    });


    //Animate the scroll to top
    $('.back-to-top').on('click', function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });


})(jQuery);


// function to set a given theme/color-scheme
// function setTheme(themeName) {
//     localStorage.setItem('zapa_theme', themeName);
//     document.documentElement.className = themeName;
// }

// function to toggle between light and dark theme
// function toggleTheme() {
//     if (localStorage.getItem('zapa_theme') === 'theme-dark') {
//         setTheme('theme-light');
//     } else {
//         setTheme('theme-dark');
//     }
// }
//
// // Immediately invoked function to set the theme on initial load
// (function () {
//     if (localStorage.getItem('zapa_theme') === 'theme-dark') {
//         setTheme('theme-dark');
//         document.getElementById('slider').checked = false;
//     } else {
//         setTheme('theme-light');
//         document.getElementById('slider').checked = true;
//     }
// })();
