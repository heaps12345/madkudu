module.exports = function() {

	google.load("visualization", "1", {packages:["corechart"], callback: drawVisualization});

	var color_palette = ['#5DA5DA','#FAA43A','#60BD68','#D3D3D3'];

	var draw_mrr_chart = function(raw_data, div_target) {

		console.log(raw_data);

		var min_value = raw_data[1][1];
		var max_value = raw_data[raw_data.length-1][1];

		var data = google.visualization.arrayToDataTable(raw_data);
		var options = {
			// title : 'Monthly Coffee Production by Country',
			height: 250,
			vAxis: {
				format: '$#,###',
				viewWindow: {
					min: min_value - (max_value-min_value)*.1 ,
					max: max_value + (max_value-min_value)*.1
				}
			},
			hAxis: {title: "Month"},
			// seriesType: "bars",
			// isStacked: 'relative',
			isStacked: true,
			series: {
				0: {areaOpacity: 0.10},
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
		// var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
		var chart = new google.visualization.AreaChart(document.getElementById(div_target));
		chart.draw(data, options);
	};


	var draw_mrr_breakdown_chart = function(raw_data, div_target) {
		var data = google.visualization.arrayToDataTable(raw_data);
		var options = {
			// title : 'Monthly Coffee Production by Country',
			height: 250,
			vAxis: {
				format: '$#,###'
			},
			hAxis: {title: "Month"},
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



	function drawVisualization() {

		var elements_to_listen_to = ['#starting_MRR','#revenue_growth','#churn','#upsell', '#projection_time'];

		var calculator = new (require('./calculator'))();
		calculator.compute(
			parseFloat($(elements_to_listen_to[0]).val()),
			parseFloat($(elements_to_listen_to[1]).val()),
			$(elements_to_listen_to[2]).val()/100,
			$(elements_to_listen_to[3]).val()/100,
			parseFloat($(elements_to_listen_to[4]).val())
			);

		draw_mrr_chart(calculator.mrr, 'chart_div_mrr');
		draw_mrr_breakdown_chart(calculator.mrr_breakdown, 'chart_div_mrr_breakdown');

	};

};
