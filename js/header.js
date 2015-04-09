/* globals $, document */

$(document).ready(function (){
	'use strict';

	var scroll_offset = 20;

	if (window.location.pathname === '/') {
		$('.navbar-nav--madkudu').show();
	}

	$('body').scrollspy({ target:'.navbar--madkudu', offset: scroll_offset});

	// Smooth navigation
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top - scroll_offset
				}, 1500);
				return false;
			}
		}
	});

	$(window).scroll(function() {
		var height = $(window).scrollTop();
		if(height  > 500) {
		// do something
			$('a.button.button-signup--nav').show();
		}
		else {
		// do something
			$('a.button.button-signup--nav').hide();
		}
	});


});
