(function($) {

	"use strict";

    // ---------------------------------------------------------
	//  Hidden Bar Menu Config
	// ---------------------------------------------------------
	function hiddenBarMenuConfig() {
		var menuWrap = $('.hidden-bar .side-menu,.widget_nav_menu ul');
		// hidding submenu
		menuWrap.find('.menu-item-has-children').children('ul').hide();
		// toggling child ul
		menuWrap.find('li.menu-item-has-children > a,.widget_nav_menu ul li.menu-item-has-children > a').each(function () {
			$(this).on('click', function (e) {
				e.preventDefault();
				$(this).parent('li.menu-item-has-children').children('ul').slideToggle();

				// adding class to item container
				$(this).parent().toggleClass('open');

				return false;

			});
		});
	}

	hiddenBarMenuConfig();

	// ---------------------------------------------------------
	//  Sidemenu Button
	// ---------------------------------------------------------
	$(".sidemenu-btn").on("click", function() {
        $(".sidemenu").toggleClass("slidein");
        $(".wrapper").toggleClass("stop");
    });

    $(".mobile-nav ul").parent().addClass("menu-item-has-children");
    $(".mobile-nav li.menu-item-has-children > a").on("click", function() {
        $(this).next("ul").slideToggle();
        $(this).parent().siblings().find("ul").slideUp();
        return false;
    });

	// ---------------------------------------------------------
	//  Search Popup / Hide Show
	// ---------------------------------------------------------
	$(".search-btn").on("click", function(e) {
        e.preventDefault();
        $(".search-wrapper").toggleClass("search-active");
    });

    $(".search-wrapper, .search-btn").on("click", function(e) {
        if (e.target == this || e.target.className == "search-active") {
            $(".search-wrapper").removeClass("search-active");
        }
    });

    // ---------------------------------------------------------
	//  Gallery Post Format
	// ---------------------------------------------------------
    $(".post-media .gallery-carousel").owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        nav: true,
        navText: ["",""],
        navElement: 'div'
    });

})(window.jQuery);