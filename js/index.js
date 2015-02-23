/* globals $, document, analytics, _kmq */

$(document).ready( function(){
	analytics.page('Home');

	$('#mc-early-signup-form').on('submit', function(err){
		if (err) {
			console.log(err);
		}
		console.log(this);
		var user_email = $('#mc-EMAIL').val();
		analytics.track('Wait list', {
			location: 'Homepage',
			email: user_email
		});
		analytics.alias(user_email);
		analytics.identify(user_email, {
			email: user_email
		});
		_kmq.push(['identify', user_email ]);
	});
});

// var formSubmit = function(el) {

// };

// Common callback which runs after all Ajax submissions
// function afterSubmit(data) {
//   var form = data.form;
//   var redirect = data.redirect;
//   var success = data.success;

//   // Redirect to a success url if defined
//   if (success && redirect) {
//     Webflow.location(redirect);
//     return;
//   }

//   // Show or hide status divs
//   data.done.toggle(success);
//   data.fail.toggle(!success);

//   // Hide form on success
//   form.toggle(!success);

//   // Reset data and enable submit button
//   reset(data);
// }


