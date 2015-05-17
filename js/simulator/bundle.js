(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){


var calculator = function(starting_mrr, revenue_growth, churn, upsell) {

	console.log(starting_mrr);
	console.log(revenue_growth);
	console.log(churn);
	console.log(upsell);

	var number_of_month = 12;

	var cumulated_existing_customer_revenue = {0: starting_mrr};
	var retained_revenue_from_new_customers = {0: revenue_growth};
	var churn_revenue_by_cohort = { 0: {0: 0}, 1: {0: 0}}
	var cumulated_new_customer_revenue = {0: 0};
	var cumulated_upsell_revenue = {0: 0};
	var cumulated_churn = {0: 0};

	// initialize
	for (var i=1;i<=number_of_month;i++) {
		cumulated_existing_customer_revenue[i] = cumulated_existing_customer_revenue[i-1]*(1-churn);
		churn_revenue_by_cohort[0][i] = cumulated_existing_customer_revenue[i] - cumulated_existing_customer_revenue[i-1];
		retained_revenue_from_new_customers[i] = retained_revenue_from_new_customers[i-1]*(1-churn);
		churn_revenue_by_cohort[1][i] = retained_revenue_from_new_customers[i] - retained_revenue_from_new_customers[i-1];
	}

	// calculate monthly numbers
	for (var i=1;i<=number_of_month;i++) {
		cumulated_new_customer_revenue[i] = cumulated_new_customer_revenue[i-1] + revenue_growth + churn_revenue_by_cohort[1][i-1];
		cumulated_upsell_revenue[i] = cumulated_upsell_revenue[i-1]*(1-churn) + (cumulated_existing_customer_revenue[i-1]+cumulated_new_customer_revenue[i-1] + cumulated_upsell_revenue[i-1])*upsell;
		cumulated_churn[i] = cumulated_churn[i-1] + churn_revenue_by_cohort[0][i] + churn_revenue_by_cohort[1][i-1] - cumulated_upsell_revenue[i-1]*churn;
	}

	console.log(cumulated_new_customer_revenue);
	console.log(cumulated_existing_customer_revenue);
	console.log(cumulated_upsell_revenue);
	console.log(cumulated_churn);

	// console.log(churn_revenue_by_cohort);
	// console.log(cumulated_existing_customer_revenue);
	// console.log(retained_revenue_from_new_customers);

	var results = [[
		'Month',
		'Revenue from new customers',
		'Revenue from upsells',
		'Revenue from existing customers',
		'Lost revenue from churn'
	]];

	for (var i=1;i<=number_of_month;i++) {
		results.push([
			i.toString(),
			cumulated_new_customer_revenue[i],
			cumulated_upsell_revenue[i],
			cumulated_existing_customer_revenue[i],
			-cumulated_churn[i]
		]);
	}

	return results;

};

module.exports = calculator;

},{}],2:[function(require,module,exports){
module.exports = function() {

	console.log('yo');

	google.load("visualization", "1", {packages:["corechart"], callback: drawVisualization});
	// google.setOnLoadCallback(drawVisualization);

	function drawVisualization() {

		var elements_to_listen_to = ['#starting_MRR','#revenue_growth','#churn','#upsell'];

		var calculator = require('./calculator');
		var results = calculator(
			parseFloat($(elements_to_listen_to[0]).val()),
			parseFloat($(elements_to_listen_to[1]).val()),
			$(elements_to_listen_to[2]).val()/100,
			$(elements_to_listen_to[3]).val()/100
			);

		var data = google.visualization.arrayToDataTable(results);

		var options = {
			// title : 'Monthly Coffee Production by Country',
			vAxis: {
				format: '$#,###'
			},
			hAxis: {title: "Month"},
			seriesType: "bars",
			// isStacked: 'relative',
			isStacked: true,
			series: {
				0: {color: '5DA5DA'},
				1: {color: 'FAA43A'},
				2: {color: '60BD68'},
				3: {color: '#D3D3D3'}
				// 5: {type: "line"}
			},
			legend : {position: 'none'},
			chartArea:{left:100,top:20,width:'100%',height:'80%'},
			animation:{
				duration: 1000,
				easing: 'out',
				startup: true
			},
		};

		// var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
		var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	};

};

},{"./calculator":1}],3:[function(require,module,exports){
module.exports = function() {

	var mask_options_currency = {
		// radixPoint:".",
		groupSeparator: ",",
		digits: 0,
		autoGroup: true,
		prefix: '$ ',
		'autoUnmask' : true
	};

	var mask_options_percentage = {
		// radixPoint:".",
		// groupSeparator: ",",
		digits: 1,
		autoGroup: true,
		suffix: ' %',
		'autoUnmask' : true
	};

	$('#starting_MRR').inputmask("decimal",mask_options_currency);
	$('#revenue_growth').inputmask("decimal",mask_options_currency);

	$('#churn').inputmask("decimal", mask_options_percentage);
	$('#upsell').inputmask("decimal", mask_options_percentage);

	$("#starting_MRR").val(100000);
	$("#revenue_growth").val(10000);
	$("#churn").val(5);
	$("#upsell").val(1);

};

},{}],4:[function(require,module,exports){
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

},{}],5:[function(require,module,exports){
$(document).ready(function(){

	window.mk_simulator = {} || window.mk_simulator;

	var initialize_input_masks = require('./initialize_input_masks.js');
	initialize_input_masks();

	var initialize_charts = require('./initialize_charts.js');
	initialize_charts();

	// listen for change of parameters
	require('./listen_for_input_to_refresh.js')(initialize_charts);

});

},{"./initialize_charts.js":2,"./initialize_input_masks.js":3,"./listen_for_input_to_refresh.js":4}]},{},[5]);
