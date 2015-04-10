/* globals window */

var segment = {
	dev: 'U2gPGmLgd9q3xq8iSYcwSpCV48glOaMl',
	prod: 'Gr7DJYrd6qzqArwk047D0iKxHuGbfGWI'
};

var segment_key;
if (window.location.hostname === 'madkudu-website.dev') {
	segment_key = segment.dev;
} else {
	segment_key = segment.prod;
}

/* jshint ignore:start */
// Begin Segment
window.analytics=window.analytics||[],window.analytics.methods=["identify","group","track","page","pageview","alias","ready","on","once","off","trackLink","trackForm","trackClick","trackSubmit"],window.analytics.factory=function(t){return function(){var a=Array.prototype.slice.call(arguments);return a.unshift(t),window.analytics.push(a),window.analytics}};for(var i=0;i<window.analytics.methods.length;i++){var key=window.analytics.methods[i];window.analytics[key]=window.analytics.factory(key)}window.analytics.load=function(t){if(!document.getElementById("analytics-js")){var a=document.createElement("script");a.type="text/javascript",a.id="analytics-js",a.async=!0,a.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.io/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n)}},window.analytics.SNIPPET_VERSION="2.0.9",
window.analytics.load(segment_key);
// End Segment

// Begin Kissmetrics
var _kmq = _kmq || [];
var _kmk = _kmk || '4ca00e3c20b06b3c0f91b2ea2dba1442dd608d99';
function _kms(u){
  setTimeout(function(){
    var d = document, f = d.getElementsByTagName('script')[0],
    s = d.createElement('script');
    s.type = 'text/javascript'; s.async = true; s.src = u;
    f.parentNode.insertBefore(s, f);
  }, 1);
}
_kms('//i.kissmetrics.com/i.js');
_kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');
// End Kissmetrics
/* jshint ignore:end */
