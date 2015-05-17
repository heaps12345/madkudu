

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
