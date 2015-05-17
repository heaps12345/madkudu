var add_listeners = function(refresh_function) {

	var delay = (function(){
	  var timer = 0;
	  return function(callback, ms){
	  clearTimeout (timer);
	  timer = setTimeout(callback, ms);
	 };
	})();

	var elements_to_listen_to = ['#starting_MRR','#revenue_growth','#churn','#upsell'];

	for (var i=0; i<elements_to_listen_to.length; i++) {
		$(elements_to_listen_to[i]).keyup(function() {
		  delay(function(){
		    refresh_function();
		  }, 1000 );
		});
	}

};

module.exports = add_listeners;
