var Q = require('../q.js');

var refresh_charts = function() {
	var deferred = Q.defer()

	window.mk_simulator = window.mk_simulator || {};

	google.load("visualization", "1", {packages:["corechart"], callback: drawVisualization});

	var color_palette = ['#5DA5DA','#FAA43A','#60BD68','#D3D3D3'];
	// 4D4D4D (gray)
	// 5DA5DA (blue)
	// FAA43A (orange)
	// 60BD68 (green)
	// F17CB0 (pink)
	// B2912F (brown)
	// B276B2 (purple)
	// DECF3F (yellow)
	// F15854 (red)

	var currency_formatter;

	var draw_mrr_chart = function(raw_data, div_target) {
		var min_value = raw_data[1][1];
		var max_value = raw_data[raw_data.length-1][1];
		window.mk_simulator.label_final_mrr = max_value;

		var data = google.visualization.arrayToDataTable(raw_data);
		currency_formatter.format(data,1);

		var options = {
			height: 250,
			vAxis: {
				format: '$#,###',
				viewWindow: {
					min: min_value - (max_value-min_value)*.1 ,
					max: max_value + (max_value-min_value)*.1
				}
			},
			hAxis: {title: "Months"},
			isStacked: true,
			series: {
				0: {
					areaOpacity: 0.10,
					color: color_palette[0]
				},
			},
			pointSize: 8,
			legend : {position: 'none'},
			chartArea:{left:100,top:20,width:'100%',height:'80%'},
			animation:{
				duration: 1000,
				easing: 'out',
				startup: true
			},
		};
		var chart = new google.visualization.AreaChart(document.getElementById(div_target));
		chart.draw(data, options);
	};


	var draw_mrr_breakdown_chart = function(raw_data, div_target) {
		window.mk_simulator.label_churn_amount = raw_data[raw_data.length-1][4];

		var data = google.visualization.arrayToDataTable(raw_data);
		currency_formatter.format(data,1);
		currency_formatter.format(data,2);
		currency_formatter.format(data,3);
		currency_formatter.format(data,4);

		var options = {
			// title : 'Monthly Coffee Production by Country',
			height: 250,
			vAxis: {
				format: '$#,###'
			},
			hAxis: {title: "Months"},
			seriesType: "bars",
			// isStacked: 'relative',
			isStacked: true,
			series: {
				0: {color: color_palette[0]},
				1: {color: color_palette[1]},
				2: {color: color_palette[2]},
				3: {color: color_palette[3]}
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
		var chart = new google.visualization.ComboChart(document.getElementById(div_target));
		chart.draw(data, options);
	};


	var draw_mrr_with_goal = function(raw_data, raw_data_goal, div_target) {
		var min_value = raw_data[1][1] < raw_data_goal[1][1] ? raw_data[1][1] : raw_data_goal[1][1];
		var max_value = raw_data[raw_data.length-1][1] > raw_data_goal[raw_data_goal.length-1][1] ? raw_data[raw_data.length-1][1]: raw_data_goal[raw_data_goal.length-1][1];

		window.mk_simulator.label_final_mrr_simulated = raw_data_goal[raw_data_goal.length-1][1];

		var combined_raw_data = raw_data;
		combined_raw_data[0] = ['Months', 'MRR with current churn', 'MRR with desired churn'];

		for (var i=1; i<raw_data.length; i++) {
			combined_raw_data[i].push(raw_data_goal[i][1]);
		}

		var data = google.visualization.arrayToDataTable(combined_raw_data);
		currency_formatter.format(data,1);
		currency_formatter.format(data,2);

		var options = {
			height: 250,
			vAxis: {
				format: '$#,###',
				viewWindow: {
					min: min_value - (max_value-min_value)*.1 ,
					max: max_value + (max_value-min_value)*.1
				}
			},
			hAxis: {title: "Months"},
			isStacked: false,
			series: {
				0: {
					areaOpacity: 0.05,
					color: color_palette[0]
				},
				1: {
					areaOpacity: 0.05,
					color: color_palette[2],
					lineDashStyle: [4,4]
				},
			},
			pointSize: 8,
			legend : {position: 'none'},
			chartArea:{left:100,top:20,width:'100%',height:'80%'},
			animation:{
				duration: 1000,
				easing: 'out',
				startup: true
			},
		};
		var chart = new google.visualization.AreaChart(document.getElementById(div_target));
		chart.draw(data, options);

	};


	function drawVisualization() {
		var elements_to_listen_to = ['#starting_MRR','#revenue_growth','#churn','#upsell', '#projection_time', '#simulated_churn'];

		currency_formatter = new google.visualization.NumberFormat({
			pattern: '$#,###'
		});

		var calculator = new (require('./calculator'))();
		calculator.compute(
			parseFloat($(elements_to_listen_to[0]).val()),
			parseFloat($(elements_to_listen_to[1]).val()),
			$(elements_to_listen_to[2]).val()/100,
			$(elements_to_listen_to[3]).val()/100,
			parseFloat($(elements_to_listen_to[4]).val())
			);

		var calculator_goal = new (require('./calculator'))();
		calculator_goal.compute(
			parseFloat($(elements_to_listen_to[0]).val()),
			parseFloat($(elements_to_listen_to[1]).val()),
			$(elements_to_listen_to[5]).val()/100,
			$(elements_to_listen_to[3]).val()/100,
			parseFloat($(elements_to_listen_to[4]).val())
			);


		draw_mrr_chart(calculator.mrr, 'chart_div_mrr');
		draw_mrr_breakdown_chart(calculator.mrr_breakdown, 'chart_div_mrr_breakdown');
		draw_mrr_with_goal(calculator.mrr, calculator_goal.mrr, 'chart_div_mrr_goal');

		deferred.resolve();
	};

	return deferred.promise;
};

module.exports = refresh_charts;
