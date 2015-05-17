module.exports = function() {

	google.load("visualization", "1", {packages:["corechart"], callback: drawVisualization});


	var draw_mrr_chart = function(raw_data, div_target) {
		var data = google.visualization.arrayToDataTable(raw_data);
		var options = {
			// title : 'Monthly Coffee Production by Country',
			height: 250,
			vAxis: {
				format: '$#,###',
				viewWindowMode: 'pretty'
			},
			hAxis: {title: "Month", viewWindowMode: 'pretty'},
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
