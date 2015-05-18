module.exports = function() {

	var mask_options_currency = {
		// radixPoint:".",
		groupSeparator: ",",
		digits: 0,
		autoGroup: true,
		prefix: '$ ',
		'autoUnmask' : true,
		rightAlign: false
	};

	var mask_options_percentage = {
		// radixPoint:".",
		// groupSeparator: ",",
		digits: 1,
		autoGroup: true,
		suffix: ' %',
		'autoUnmask' : true,
		rightAlign: false
	};


	// define the masking configuration
	$('#starting_MRR').inputmask("decimal",mask_options_currency);
	$('#revenue_growth').inputmask("decimal",mask_options_currency);

	$('#churn').inputmask("decimal", mask_options_percentage);
	$('#upsell').inputmask("decimal", mask_options_percentage);

	$('#projection_time').inputmask("decimal", {digits: 0, suffix: ' month(s)', autoUnmask: true});

	$('#acquisition_spend').inputmask("decimal",mask_options_currency);
	$('#simulated_churn').inputmask("decimal", mask_options_percentage);

	// set up the default values
	$("#starting_MRR").val(100000);
	$("#revenue_growth").val(10000);
	$("#churn").val(5);
	$("#upsell").val(1);
	$("#projection_time").val(12);

	$("#acquisition_spend").val(10000/(5/100)/5);
	$('#simulated_churn').val(2.5);

};
