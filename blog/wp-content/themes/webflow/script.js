// Begin Segment
window.analytics=window.analytics||[],window.analytics.methods=["identify","group","track","page","pageview","alias","ready","on","once","off","trackLink","trackForm","trackClick","trackSubmit"],window.analytics.factory=function(t){return function(){var a=Array.prototype.slice.call(arguments);return a.unshift(t),window.analytics.push(a),window.analytics}};for(var i=0;i<window.analytics.methods.length;i++){var key=window.analytics.methods[i];window.analytics[key]=window.analytics.factory(key)}window.analytics.load=function(t){if(!document.getElementById("analytics-js")){var a=document.createElement("script");a.type="text/javascript",a.id="analytics-js",a.async=!0,a.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.io/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n)}},window.analytics.SNIPPET_VERSION="2.0.9",
window.analytics.load("tcuowrwxhc");
window.analytics.page('Blog');
// End Segment

$(function() {
	$('#mc-embedded-subscribe-form').on('submit', function(e){
		//e.preventDefault();
		var val = $("#mce-EMAIL").val();
		
		analytics.track('Newsletter sign-up', {
  		email: val
		});

		analytics.alias(val);

		analytics.identify(val, {
		  email: val
		});

	});

	/*
	$('#mc-embedded-subscribe-popup').on('submit', function(e){
		//e.preventDefault();
		console.log("Submit")
		var val = $("#mce-EMAIL-popup").val();
		dataLayer.push({
			'event': 'Newsletter sign-up',
			'user_email': val
		});
	});
	*/
});