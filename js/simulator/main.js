$(document).ready(function(){

	window.mk_simulator = {} || window.mk_simulator;

	var initialize_input_masks = require('./initialize_input_masks.js');
	initialize_input_masks();

	var initialize_charts = require('./initialize_charts.js');
	initialize_charts();

	// listen for change of parameters
	require('./listen_for_input_to_refresh.js')(initialize_charts);

});
