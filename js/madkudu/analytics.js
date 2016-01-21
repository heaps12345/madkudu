var segment_keys = {
	dev: 'U2gPGmLgd9q3xq8iSYcwSpCV48glOaMl',
	prod: 'Gr7DJYrd6qzqArwk047D0iKxHuGbfGWI'
};

var segment_key;
if (window.location.hostname === 'localhost') {
	segment_key = segment_keys.dev;
} else {
	segment_key = segment_keys.prod;
}

/* jshint ignore:start */
window.analytics=window.analytics||[],window.analytics.methods=["identify","group","track","page","pageview","alias","ready","on","once","off","trackLink","trackForm","trackClick","trackSubmit"],window.analytics.factory=function(t){return function(){var a=Array.prototype.slice.call(arguments);return a.unshift(t),window.analytics.push(a),window.analytics}};for(var i=0;i<window.analytics.methods.length;i++){var key=window.analytics.methods[i];window.analytics[key]=window.analytics.factory(key)}window.analytics.load=function(t){if(!document.getElementById("analytics-js")){var a=document.createElement("script");a.type="text/javascript",a.id="analytics-js",a.async=!0,a.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.io/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n)}},window.analytics.SNIPPET_VERSION="2.0.9",
window.analytics.load(segment_key);
/* jshint ignore:end */
