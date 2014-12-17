$(document).ready( function(){
	analytics.page('Home');
	$('#mc-early-signup-form').on('submit', function(e){
		var val = $("#mc-EMAIL").val();
		analytics.track('Wait list', {
			location: 'Homepage',
			email: val
		});
		analytics.alias(val);
		analytics.identify(val, {
			email: val
		});
	});
});

