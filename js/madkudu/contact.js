$(document).ready(function(){

	var contactForm = $('.form-contact');

	if(contactForm.length != 0) {
		contactForm.parsley();
		var parsleyHeights = 23*6;

		if( $(window).height() > (contactForm.height()+parsleyHeights) ) {

			var contact 				= $('.contact'),
				contactOffsetBottom 	= $(document).height() - (contact.height()+contact.offset().top),
				contactFormOffsetTop 	= contactForm.offset().top;

			$(window).on("scroll", function() {
				var scrollTop 	= $(window).scrollTop(),
					diff 		= $(document).height() - contactOffsetBottom - scrollTop - contactForm.height() + 27;

				var docWidth	= $(document).width(),
					fixRightPos = Math.ceil((docWidth - $('.contact-content').outerWidth())/2);

				if (contactFormOffsetTop < scrollTop) {
					contactForm.addClass("fix-form");
					contactForm.css("right", fixRightPos);
				} else {
					contactForm.removeClass("fix-form");
					contactForm.css("right", 0);
			    }

			    if (diff <= 0) {
				    contactForm.addClass("fix-form-bottom");
					contactForm.css("right", 0);
			    } else {
				    contactForm.removeClass("fix-form-bottom");
			    }

			});
		}
	}

});
