var add_listeners = function(refresh_function) {

	window.mk_simulator = window.mk_simulator || {};

	var delay = (function(){
	  var timer = 0;
	  return function(callback, ms){
	  clearTimeout (timer);
	  timer = setTimeout(callback, ms);
	 };
	})();

	var elements_to_listen_to = ['#starting_MRR','#revenue_growth','#churn','#upsell', '#projection_time', '#simulated_churn', '#acquisition_spend'];

	for (var i=0; i<elements_to_listen_to.length; i++) {
		$(elements_to_listen_to[i]).keyup(function() {
		  delay(function(){
		    refresh_function();
		  }, 1000 );
		});
	}

	$('#acquisition_spend').keyup(function() {
		window.mk_simulator.has_changed_acquisition_spend = true;
	});



};

module.exports = add_listeners;
