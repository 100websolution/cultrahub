$(window).load(function () {
    var $window = $(window);

    function resize() {
        $('.hfull').each(function(){
            var heightFull = $(this).outerHeight(),
                heightHalf = (heightFull- 20 ) / 2;
            $(this).parents('.height_div').find('.hhalf').outerHeight(heightHalf);
            $(this).parents('.height_div').find('.hfull').outerHeight(heightFull);
        });
        if($('.modalBox').outerHeight() > $window.height()){
            $('.modalOpen').css('padding-right','17px');
            $('.modalOpen .modal').css('padding-right','17px');
        }
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

    /*-------------------------------------ANIMATION_WAYPOINT-------------------------------------*/
    if ($('.scroll_effect')) {
        var arrayElements = [],
            isMobile = {
                Android: function () {
                    return navigator.userAgent.match(/Android/i);
                },
                BlackBerry: function () {
                    return navigator.userAgent.match(/BlackBerry/i);
                },
                iOS: function () {
                    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                },
                Opera: function () {
                    return navigator.userAgent.match(/Opera Mini/i);
                },
                Windows: function () {
                    return navigator.userAgent.match(/IEMobile/i);
                },
                any: function () {
                    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                }
            },
            effectsOnMobiles = false,
            doAnimations = false;
        if (isMobile.any() && effectsOnMobiles) doAnimations = true;
        if (isMobile.any() && !effectsOnMobiles) doAnimations = false;
        if (!isMobile.any()) doAnimations = true;

        function wayjs(link, effect, delay_e) {

            if (doAnimations) {

                link.css('opacity', '0');

                var Animate_effect = false;

                link.waypoint({
                    handler: function () {
                        animate_effect(link, Animate_effect, effect, delay_e);
                    },
                    offset: '100%',
                    triggerOnce: true
                }, function () {
                    $.waypoints("refresh");
                });
            }
        }

        function animate_effect(link, Animate_effect, effect, delay_e) {
            if (Animate_effect === false) {
                setTimeout(function () {
                    link.addClass('animated ' + effect);
                    link.css('opacity', '1');
                }, delay_e);

            }
            Animate_effect = true;
        }

        $('.scroll_effect').each(function () {
            $(this).show();
            var effect = $(this).attr('data-effect'),
                delay_e = $(this).attr('data-delay');
            if (delay_e == "") delay_e = 0;
            wayjs($(this), effect, delay_e);
        });
    }

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

    /*-------------------------------------RESPONSIVE_MENU-------------------------------------*/
    if($("#topbanner").length){
        if (typeof $.fn.layerSlider == "undefined") {
            lsShowNotice('topbanner', 'jquery');
        } else if (typeof $.transit == "undefined" || typeof $.transit.modifiedForLayerSlider == "undefined") {
            lsShowNotice('topbanner', 'transit');
        } else {
            $("#topbanner").layerSlider({
                width: '100%',
                height: '462px',
                responsive: true,
                responsiveUnder: 1160,
                sublayerContainer: 1160,
                autoStart: true,
                pauseOnHover: false,
                firstLayer: 1,
                animateFirstLayer: true,
                randomSlideshow: false,
                twoWaySlideshow: true,
                loops: 0,
                forceLoopNum: true,
                autoPlayVideos: false,
                autoPauseSlideshow: 'auto',
                youtubePreview: 'maxresdefault.jpg',
                keybNav: true,
                touchNav: true,
                skin: 'fullwidth',
                skinsPath: 'css/',
                globalBGColor: 'transparent',
                globalBGImage: '',
                navPrevNext: false,
                navStartStop: false,
                navButtons: false,
                hoverPrevNext: true,
                hoverBottomNav: false,
                showBarTimer: false,
                showCircleTimer: false,
                //thumbnailNavigation : 'disabled',
                thumbnailNavigation: 'hover',
                tnWidth: 100,
                tnHeight: 60,
                tnContainerWidth: '60%',
                tnActiveOpacity: 35,
                tnInactiveOpacity: 100,
                imgPreload: true,
                yourLogo: false,
                yourLogoStyle: 'left: 10px; top: 10px;',
                yourLogoLink: false,
                yourLogoTarget: '_self',
                cbInit: function (element) {},
                cbStart: function (data) {},
                cbStop: function (data) {},
                cbPause: function (data) {},
                cbAnimStart: function (data) {},
                cbAnimStop: function (data) {},
                cbPrev: function (data) {},
                cbNext: function (data) {}
            });
        }
    }
    
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
        autoplay: true,
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
    
    /*-------------------------------------MAIN_TAB-------------------------------------*/
    $(".maintabslider").owlCarousel({
        items: 1,
    	loop: true,
        autoplay: true,
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
		},
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    });
    
    /*-------------------------------------OWL1-------------------------------------*/
    $(".owl1").owlCarousel({
        items: 1,
    	loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        video: true,
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
        autoplay: true,
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
        autoplay: true,
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

    /*-------------------------------------CULTRA_CATEGORY-------------------------------------*/
    $.fn.slotslider = function (options) {

        var object = $(this);
        var slot_number = object.children().size();
        var slot_slide = Math.ceil(slot_number / 9);
        var index = 0;
        object.wrapInner('<ul class="clearfix">');
        for (var i = 0; i < slot_slide; i++) {
            var innerHtml = '';
            for (var j = 0; j < 9; j++) {
                if (object.children('ul').children('.cultra_cat').eq(index).length) {
                    innerHtml += '<div class="cultra_cat">' + object.children('ul').children('.cultra_cat').eq(index).html() + '</div>';
                    index++;
                } else
                    break;
            }
            object.children('ul').append('<li><div class="cultra_cat_inner_wrap">' + innerHtml + '<div class="clear"></div></div></li>')
        }
        object.children('ul').children('.cultra_cat').each(function () {
            $(this).remove();
        });
    };
    
    $('.cultra_cat_wrap').each(function () {
        $(this).slotslider();
    });

    /*-------------------------------------RESPONSIVE_MENU-------------------------------------*/
    $('[data-toggle="modal"]').on('click', function (e){
        var modalToggle = $(this),
            modalTarget = modalToggle.data('target');
        $('body').addClass('modalOpen');
        $(modalTarget).addClass('opened').slideDown();
        if($('.modalBox').outerHeight() > $(window).height()){
            $('.modalOpen').css('padding-right','17px');
            $('.modalOpen .modal').css('padding-right','17px');
        }
    });
    $('.modalClose').on('click', function (e){
        $('body').removeClass('modalOpen').css('padding-right','0');
        $(this).parents('.modal').slideUp().removeClass('opened').css('padding-right','0');
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