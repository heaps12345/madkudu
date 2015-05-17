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
