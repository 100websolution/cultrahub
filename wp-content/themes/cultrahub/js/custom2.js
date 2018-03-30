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
        autoPlay: false,
        stopOnHover : true,
        pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsCustom: [
            [0, 2],
            [320, 2],
            [480, 2],
            [600, 3],
            [768, 4],
            [992, 4],
        ]
    });
    
    /*-------------------------------------OWL1-------------------------------------*/
    $(".owl1").owlCarousel({
        items: 1,
        autoPlay: false,
        stopOnHover : true,
        pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsCustom: [
            [0, 1],
            [320, 1],
            [480, 1],
            [600, 1],
            [768, 1],
            [992, 1],
        ]
    });
    
    /*-------------------------------------OWL4-------------------------------------*/
    $(".owl4").owlCarousel({
        items: 4,
        autoPlay: false,
        stopOnHover : true,
        pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsCustom: [
            [0, 1],
            [320, 2],
            [480, 2],
            [600, 3],
            [768, 3],
            [992, 4],
        ]
    });
    
    /*-------------------------------------CULTURE_BANNER-------------------------------------*/
    $(".culture_banner").owlCarousel({
        items: 1,
        autoPlay: false,
        stopOnHover : true,
        pagination: true,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsCustom: [
            [0, 1],
            [320, 1],
            [480, 1],
            [600, 1],
            [768, 1],
            [992, 1],
        ]
    });
    
    /*-------------------------------------GENRE_SLIDER-------------------------------------*/
    $("#genre_slider").owlCarousel({
        items: 4,
        autoPlay: false,
        stopOnHover : true,
        pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsCustom: [
            [0, 2],
            [320, 2],
            [480, 2],
            [600, 3],
            [768, 4],
            [992, 4],
        ]
    });
    
    $("#genrebox_slider").owlCarousel({
        items: 3,
        autoPlay: false,
        stopOnHover : true,
        pagination: false,
        navigation: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsCustom: [
            [0, 1],
            [320, 2],
            [480, 2],
            [600, 2],
            [768, 3],
            [992, 3],
        ],
        addClassActive: true,
        afterAction: afterActionFunc
    });
    
    function afterActionFunc() {
        var gBlock = $("#genrebox_slider .genre_block"),
            gBlockCount = gBlock.length,
            li = "";
        if(gBlockCount > 0){
            gBlock.each(function(){
                var gLink = $(this).find('a').attr('href'),
                    gIconColored = $(this).find('.genre_icon').children('img.colored').attr('src'),
                    gIconBnw = $(this).find('.genre_icon').children('img.bnw').attr('src'),
                    gTitle = $(this).find('.subheading2').html(),
                    gActive = "";

                if($(this).parents('.owl-item').hasClass('active'))
                    gActive = 'active';
                else
                    gActive = '';

                li += '<li class="'+gActive+'"><span class="gicon" title="'+gTitle+'"><img src="'+gIconColored+'" alt="'+gTitle+'" class="colored" /><img src="'+gIconBnw+'" alt="'+gTitle+'" class="bnw" /></span></li>';
            });
            $('#genrebox_slider').parents('.genre_wrap').find('.genre_icon_wrap').html('<ul class="ul genre_icon_list">'+li+'</ul>');
        }
    }
    
    var owlGenre = $("#genrebox_slider").data('owlCarousel');
    $(document).on('click', '.gicon', function(){
        var index = $(this).parent().index();
        owlGenre.goTo(index);
    });

    /*-------------------------------------FOLLOW_BTN-------------------------------------*/
    $('.followbtn').click(function(e){
        e.preventDefault();
        $(this).toggleClass('btnGreen');
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