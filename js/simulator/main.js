$(document).ready(function(){

	window.mk_simulator = window.mk_simulator || {};

	// turn on the tooltips on the page
	$('[data-toggle="tooltip"]').tooltip();

	var initialize_input_masks = require('./initialize_input_masks.js');
	initialize_input_masks();

	var refresh_charts = require('./refresh_charts.js');
	var initialize_labels = require('./refresh_labels.js');
	refresh_charts()
		.then(function() {
			initialize_labels();
			window.mk_simulator.has_changed_acquisition_spend = false;
		})
		.catch(function(err){
			console.error(err);
		});


	// listen for change of parameters
	require('./listen_for_input_to_refresh.js')(
		function() {
			refresh_charts()
				.then(function() {
					initialize_labels();
				})
				.catch(function(err){
					console.error(err);
				});
		});

});
