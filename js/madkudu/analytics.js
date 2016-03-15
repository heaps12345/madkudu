var segment_keys = {
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

/* jshint ignore:start */
window.analytics=window.analytics||[],window.analytics.methods=["identify","group","track","page","pageview","alias","ready","on","once","off","trackLink","trackForm","trackClick","trackSubmit"],window.analytics.factory=function(t){return function(){var a=Array.prototype.slice.call(arguments);return a.unshift(t),window.analytics.push(a),window.analytics}};for(var i=0;i<window.analytics.methods.length;i++){var key=window.analytics.methods[i];window.analytics[key]=window.analytics.factory(key)}window.analytics.load=function(t){if(!document.getElementById("analytics-js")){var a=document.createElement("script");a.type="text/javascript",a.id="analytics-js",a.async=!0,a.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.io/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n)}},window.analytics.SNIPPET_VERSION="2.0.9",
window.analytics.load(segment_key);
/* jshint ignore:end */


// Hotjar

/* jshint ignore:start */
(function(h,o,t,j,a,r){h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};h._hjSettings={hjid:hotjar_id,hjsv:5};a=o.getElementsByTagName('head')[0];r=o.createElement('script');r.async=1;r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;a.appendChild(r);})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
/* jshint ignore:end */


