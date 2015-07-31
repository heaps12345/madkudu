/* globals $, document */

$(document).ready(function (){
	'use strict';

	var scroll_offset = 20;

	// if (window.location.pathname === '/') {
		$('.navbar-nav--madkudu').show();
	// }

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


	if (window.location.pathname !== '/') {
		$('#navbar_what a').attr('href', '/');
		$('a.button.button-signup--nav').show();
	}
	else {
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
	}

	// <!-- begin SnapEngage code -->
    var se = document.createElement('script');
    se.type = 'text/javascript';
    se.async = true;
    se.src = '//storage.googleapis.com/code.snapengage.com/js/d7cf21ac-82bb-4359-95f5-735d21fe6c0e.js';
    var done = false;
    se.onload = se.onreadystatechange = function() {
      if (!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete')) {
        done = true;
        /* Place your SnapEngage JS API code below */
        /* SnapEngage.allowChatSound(true); Example JS API: Enable sounds for Visitors. */
      }
    };
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(se, s);
	// <!-- end SnapEngage code -->

	// <!-- Hotjar Tracking Code for www.madkudu.com -->
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:57586,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');



});
