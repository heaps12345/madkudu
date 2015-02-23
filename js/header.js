/* globals $, document */

$(document).ready(function (){

	'use strict';

	$('.navbar-nav--madkudu').show();

	var update_class_nav_bar = function(click_selector) {
		$('#navbar_what').removeClass('active');
		$('#navbar_how').removeClass('active');
		$('#navbar_why').removeClass('active');
		$(click_selector).addClass('active');
	};

	var activate = function(click_selector, goto_selector, dont_format) {
		$(click_selector).click(function() {
			if (!dont_format) {
				update_class_nav_bar(click_selector);
			}
			$('html, body').animate({
				scrollTop: $(goto_selector).offset().top - 20
			}, 1500);
		});
	};

	activate('#navbar_what', '#section-explainer');
	activate('#navbar_how', '#section-benefits');
	activate('#navbar_why', '#section-why-madkudu');
	activate('#navbar_invite', '.section-signup', true);
});
