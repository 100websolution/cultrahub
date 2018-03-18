$(window).load(function () {
    var $window = $(window);

    function resize() {
        $('.hfull').each(function(){
            var heightFull = $(this).outerHeight(),
                heightHalf = (heightFull- 20 ) / 2;
            $(this).parents('.height_div').find('.hhalf').outerHeight(heightHalf);
            $(this).parents('.height_div').find('.hfull').outerHeight(heightFull);
        });
    }
    $window.resize(resize).trigger('resize');
    
    $('.isotop_wrap').isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false,
        }
    });
    
});


$(function () {

    /*-------------------------------------GO_TO_TOP-------------------------------------*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 300);
        return false;
    });
    
    /*-------------------------------------HASH_ANCHOR-------------------------------------*/
    $('[href="#"]').on('click', function (e) {
        e.preventDefault();
    });

    /*-------------------------------------ACCOUNT_DROPDOWN-------------------------------------*/
    $('.dropnav').click(function (e) {
        e.stopPropagation();
        $(this).next('.droplist').stop(true).slideToggle();
    });
    
    $('.droplist li').bind("click", function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        var dropText = $(this).text();
        $(this).parents('.dropwrap').find('.droptext').text(dropText);
    });
    
    /*-------------------------------------BUSINESS_CULTURE-------------------------------------*/
    $('.business_culture').click(function (e) {
        $(this).children("ul").slideToggle();
        e.stopPropagation();
    });
    
    $('.business_culture ul li').bind("click", function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        var cultureIcon = $('img', this).attr('src'),
            cultureCountry = $(this).text();
        $('.business_culture span img').attr('src', cultureIcon).attr("alt", cultureCountry);
        $('.business_culture em').text(cultureCountry);
        //$('.business_culture ul').hide();
    });

    /*-------------------------------------SCROLL_TO_MAIN_CONTAINER-------------------------------------*/
    $(document).on('click','.scroll_down', function(event) {
        event.preventDefault();
        var target = "#" + this.getAttribute('data-target');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 1000);
    });
    
    /*-------------------------------------CULTURE_SLIDER-------------------------------------*/
    $("#culture_slider").owlCarousel({
        items: 4,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 30,
		dots: false,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 2
			},
			480: {
				items: 2
			},
			600: {
				items: 3
			},
			768: {
				items: 4
			},
			992: {
				items: 4
			},
			1600: {
				items: 4
			}
		}
    });
    
    /*-------------------------------------OWL1-------------------------------------*/
    $(".owl1").owlCarousel({
        items: 1,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 0,
		dots: false,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 1
			},
			480: {
				items: 1
			},
			600: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			},
			1600: {
				items: 1
			}
		}
    });
    
    /*-------------------------------------OWL4-------------------------------------*/
    $(".owl4").owlCarousel({
        items: 4,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 30,
		dots: false,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 2
			},
			480: {
				items: 2
			},
			600: {
				items: 3
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			},
			1600: {
				items: 4
			}
		}
    });
    
    /*-------------------------------------CULTURE_BANNER-------------------------------------*/
    $(".culture_banner").owlCarousel({
        items: 1,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 1,
		dots: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 1
			},
			480: {
				items: 1
			},
			600: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			},
			1600: {
				items: 1
			}
		}
    });
    
    /*-------------------------------------GENRE_SLIDER-------------------------------------*/
    $("#genre_slider").owlCarousel({
        items: 4,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 30,
		dots: false,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 2
			},
			480: {
				items: 2
			},
			600: {
				items: 3
			},
			768: {
				items: 4
			},
			992: {
				items: 4
			},
			1600: {
				items: 4
			}
		}
    });
    
    var $carousel = $('#genrebox_slider');
    var $carouselNav = $('.genre_icon_list');

    $carousel.owlCarousel({
        items: 3,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 30,
		dots: false,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 2
			},
			480: {
				items: 2
			},
			600: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 3
			},
			1600: {
				items: 3
			}
		},
        URLhashListener: true,
        startPosition: 'URLHash'
    });

    $(window).on('hashchange', function() {
        var newHash = window.location.hash;
        var newTab = $carouselNav.find('a[href="'+newHash+'"]');
        var newIndex = $carouselNav.find('a[href="'+newHash+'"]').index();
        if (newTab.length) {
            var parent = newTab.parent();
            parent.siblings().removeClass('active');
            parent.addClass('active');
            parent.next().addClass('active');
            parent.next().next().addClass('active');
        }
    });

    /*-------------------------------------FOLLOW_BTN-------------------------------------*/
    $('.followbtn').click(function(e){
        e.preventDefault();
        $(this).toggleClass('btnGreen');
    });

    /*-------------------------------------SHOW_PASSWORD-------------------------------------*/
    $('.showPassIcon').each(function(){
        $(this).click(function () {
            if ($(this).hasClass('showed')) {
                $(this).siblings('input').attr('type', 'password');
                $(this).removeClass('showed');
            } else {
                $(this).siblings('input').attr('type', 'text');
                $(this).addClass('showed');
            }
        });
    });
    
    /*-------------------------------------CULTURE_BANNER-------------------------------------*/
    $(".padding_banner").owlCarousel({
        stagePadding: 160,
        items: 1,
    	loop: true,
        autoplay: false,
        autoplayHoverPause: true,
		margin: 5,
		dots: false,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			320: {
				items: 1
			},
			480: {
				items: 1
			},
			600: {
				items: 1
			},
			768: {
				items: 1
			},
			992: {
				items: 1
			},
			1600: {
				items: 1
			}
		}
    });

    /*-------------------------------------RESPONSIVE_MENU-------------------------------------*/
    /*var ht = $(".nav_menu > ul").html();
    $(".sidebar-menu").append(ht);

    $(document).on('click', '.subarrow', function () {
    	$(this).siblings('ul').slideToggle();
    	$(this).parent().toggleClass('active');
    });*/

    /*-------------------------------------HTML_CLICK-------------------------------------*/
    $('html').click(function () {
        if ($('.droplist').is(':visible')) {
            $('.droplist').slideUp();
        }
        $('.business_culture').children('ul').slideUp();
    });
});