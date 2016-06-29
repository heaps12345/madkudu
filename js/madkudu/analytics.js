var segment_keys = {
	// dev: 'LLqFrriuh56FxHp8IK2z4tllrjxqF40X',
	// prod: 'LLqFrriuh56FxHp8IK2z4tllrjxqF40X'
	dev: 'U2gPGmLgd9q3xq8iSYcwSpCV48glOaMl',
	prod: 'Gr7DJYrd6qzqArwk047D0iKxHuGbfGWI'
};

var hotjar_ids = {
	dev: 172027,
	prod: 57586
};

var segment_key, hotjar_id;

if (window.location.hostname === 'localhost') {
	segment_key = segment_keys.dev;
	hotjar_id = hotjar_ids.dev;
} else {
	segment_key = segment_keys.prod;
	hotjar_id = hotjar_ids.prod;
}

// Segment

!function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","reset","group","track","ready","alias","page","once","off","on"];analytics.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);analytics.push(e);return analytics}};for(var t=0;t<analytics.methods.length;t++){var e=analytics.methods[t];analytics[e]=analytics.factory(e)}analytics.load=function(t){var e=document.createElement("script");e.type="text/javascript";e.async=!0;e.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.com/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};analytics.SNIPPET_VERSION="3.1.0";
analytics.load(segment_key);
}}();

// Hotjar

/* jshint ignore:start */
//(function(h,o,t,j,a,r){h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};h._hjSettings={hjid:hotjar_id,hjsv:5};a=o.getElementsByTagName('head')[0];r=o.createElement('script');r.async=1;r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;a.appendChild(r);})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
/* jshint ignore:end */
