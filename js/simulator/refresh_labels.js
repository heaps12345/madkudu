var refresh_labels = function () {

	var numeral = require('numeral');

	$('.label_projection_time').text($('#projection_time').val());
	$('.label_final_mrr').text(numeral(window.mk_simulator.label_final_mrr).format('($ 0 a)'));
	$('.label_current_churn').text(numeral($('#churn').val()/100).format('0.[0]%'));
	$('.label_churn_amount').text(numeral(window.mk_simulator.label_churn_amount).format('($ 0 a)'));

	if (!window.mk_simulator.has_changed_acquisition_spend) {
		var estimated_acquisition_spend = $('#revenue_growth').val()/($('#churn').val()/100)/5;
		console.log(estimated_acquisition_spend);
		$('#acquisition_spend').val(estimated_acquisition_spend);
	}


	$('.label_acquisition_units').text(numeral($('#acquisition_spend').val()/$('#revenue_growth').val()).format('($ 0.[0] a)'));
	$('.label_acquisition_spend_for_churn').text(numeral($('#acquisition_spend').val()/$('#revenue_growth').val()*window.mk_simulator.label_churn_amount).format('($ 0 a)'));

	$('.label_simulated_churn').text(numeral($('#simulated_churn').val()/100).format('0.[0]%'));
	$('.label_mrr_saved').text(numeral(window.mk_simulator.label_final_mrr_simulated - window.mk_simulator.label_final_mrr).format('($ 0 a)'));

};

exports = module.exports = refresh_labels;
