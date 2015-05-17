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
