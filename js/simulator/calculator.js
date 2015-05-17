// var _ = require('../underscore-min.js');

var Calculator = function() {};

Calculator.prototype.compute_mrr_breakdown = function() {
	var cumulated_existing_customer_revenue = {0: this.starting_mrr};
	var cumulated_new_customer_revenue = {0: 0};
	var cumulated_upsell_revenue = {0: 0};
	var cumulated_churn = {0: 0};

	// calculate monthly numbers
	for (var i=1;i<=this.number_of_month;i++) {
		cumulated_existing_customer_revenue[i] = cumulated_existing_customer_revenue[i-1]*(1-this.churn);
		cumulated_new_customer_revenue[i] = cumulated_new_customer_revenue[i-1]*(1-this.churn) + this.revenue_growth;
		cumulated_upsell_revenue[i] = cumulated_upsell_revenue[i-1]*(1-this.churn) + (cumulated_existing_customer_revenue[i-1]+cumulated_new_customer_revenue[i-1] + cumulated_upsell_revenue[i-1])*this.upsell;
		cumulated_churn[i] = cumulated_churn[i-1] - (cumulated_existing_customer_revenue[i-1] + cumulated_upsell_revenue[i-1] + cumulated_upsell_revenue[i-1])*this.churn;
	}

	// console.log(cumulated_new_customer_revenue);
	// console.log(cumulated_existing_customer_revenue);
	// console.log(cumulated_upsell_revenue);
	// console.log(cumulated_churn);

	this.mrr_breakdown = [[
		'Months',
		'Revenue from new customers',
		'Revenue from upsells',
		'Revenue from existing customers',
		'Lost revenue from churn'
	]];

	for (var i=1;i<=this.number_of_month;i++) {
		this.mrr_breakdown.push([
			i.toString(),
			cumulated_new_customer_revenue[i],
			cumulated_upsell_revenue[i],
			cumulated_existing_customer_revenue[i],
			-cumulated_churn[i]
		]);
	}

	// return this.mrr_breakdown;
};

Calculator.prototype.compute_mrr = function() {
	this.mrr = [['Months', 'MRR']];
	for (var i=1; i<this.mrr_breakdown.length; i++) {
		var month_mrr_breakdown = this.mrr_breakdown[i];
		this.mrr.push(
			[month_mrr_breakdown[0],month_mrr_breakdown[1]+month_mrr_breakdown[2]+month_mrr_breakdown[3]]
		);
	}
};

Calculator.prototype.compute = function(starting_mrr, revenue_growth, churn, upsell, number_of_month) {
	this.starting_mrr = starting_mrr;
	this.revenue_growth = revenue_growth;
	this.churn = churn;
	this.upsell = upsell;
	this.number_of_month = number_of_month;
	this.compute_mrr_breakdown();
	this.compute_mrr();
};


module.exports = Calculator;
