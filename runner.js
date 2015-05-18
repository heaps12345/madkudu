(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){


var calculator = function(starting_mrr, revenue_growth, churn, upsell) {

	var results = [
		['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
		['1',  165,      938,         522,             998,           450,      614.6],
		['2',  135,      1120,        599,             1268,          288,      682],
		['3',  157,      1167,        587,             807,           397,      623],
		['4',  139,      1110,        615,             968,           215,      609.4],
		['5',  136,      691,         629,             1026,          366,      569.6]
	];
	return results;

};

module.exports = calculator;

},{}],2:[function(require,module,exports){
$(document).ready(function(){

	window.mk_simulator = {} || window.mk_simulator;

	var calculator = require('./calculator');

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


	var results =

	google.load("visualization", "1", {packages:["corechart"], callback: drawVisualization});
	// google.setOnLoadCallback(drawVisualization);

	function drawVisualization() {
		// Some raw data (not necessarily accurate)
		var data = google.visualization.arrayToDataTable();

		var options = {
			// title : 'Monthly Coffee Production by Country',
			vAxis: {
				format: '$#,###'
			},
			hAxis: {title: "Month"},
			seriesType: "bars",
			isStacked: true,
			series: {
				1: {color: 'gray'},
				5: {type: "line"}
			}
		};

		var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	};



});

},{"./calculator":1}]},{},[2]);
