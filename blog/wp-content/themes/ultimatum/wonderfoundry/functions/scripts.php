<?php
/*
 WARNING: This file is part of the core Ultimatum framework. DO NOT edit
 this file under any circumstances.
 */

/**
 *
 * This file is a core Ultimatum file and should not be edited.
 *
 * @package  Ultimatum
 * @author   Wonder Foundry http://www.wonderfoundry.com
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://ultimatumtheme.com
 * @version 2.38
 */
 
// Register Scripts 
// For replacable scripts define an array
function ultimatum_base_scripts(){
$scripts = array(
		array(
				'handle'	=>	'ultimatum-js',
				'filename'	=>	'theme.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'stellar-js',
				'filename'	=>	'stellar.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-tweets',
				'filename'	=>	'jquery.tweet.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
				
		),
		array(
				'handle'	=>	'jcarousellite',
				'filename'	=>	'jcarousellite_1.0.1.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
				
		),
		array(
				'handle'	=>	'swfobject',
				'filename'	=>	'swfobject.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
				
		),
		array(
				'handle'	=>	'jquery-prettyphoto',
				'filename'	=>	'jquery.prettyPhoto.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-preloader',
				'filename'	=>	'jquery.preloader.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-google-maps',
				'filename'	=>	'jquery.gmap.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-fitvids',
				'filename'	=>	'jquery.fitvids.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'cufon-yui',
				'filename'	=>	'cufon.yui.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'ios-bubble',
				'directory'	=>	'pro',
				'filename'	=>	'bmb.js',
				'version'	=>	'2.38',
				'bottom'	=>	false
		),
		array(
				'handle'	=>	'mobile-js',
				'directory'	=>	'pro',
				'filename'	=>	'ultimatum-mobile.js',
				'version'	=>	'2.38',
				'bottom'	=>	false
		),
		array(
				'handle'	=>	'slider-anything',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.anythingslider.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-anything-fx',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.anthingslider.fx.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-elastic',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.eislideshow.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-anything-video',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.anthingslider.video.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-bxslider',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.bxSlider.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-flex',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.flexslider-min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-nivo',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.nivo.slider.pack.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-s3',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.s3slider.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-zaccordion',
				'directory'	=>	'slideshows',
				'filename'	=>	'jquery.zaccordion.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-slidedeck',
				'directory'	=>	'slideshows',
				'filename'	=>	'slidedeck.jquery.lite.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-supersized',
				'directory'	=>	'slideshows',
				'filename'	=>	'supersized.3.2.7.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'slider-supersized-shutter',
				'directory'	=>	'slideshows',
				'filename'	=>	'supersized.shutter.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'menu-ddsmooth',
				'directory'	=>	'menus',
				'filename'	=>	'ddsmoothmenu.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'menu-hmega',
				'directory'	=>	'menus',
				'filename'	=>	'jquery.dcmegamenu.1.3.3.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'menu-vmega',
				'directory'	=>	'menus',
				'filename'	=>	'jquery.dcverticalmegamenu.1.3.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-easing',
				'directory'	=>	'library',
				'filename'	=>	'jquery.easing.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-mobile',
				'directory'	=>	'library',
				'filename'	=>	'jquery.mobile.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	false
		),
		array(
				'handle'	=>	'jquery-mousewheel',
				'directory'	=>	'library',
				'filename'	=>	'jquery.mousewheel.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'enquire-min',
				'directory'	=>	'library',
				'filename'	=>	'enquire.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-hoverIntent',
				'directory'	=>	'library',
				'filename'	=>	'jquery.hoverIntent.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'bootstrap',
				'directory'	=>	'',
				'filename'	=>	'bootstrap.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'jquery-validate',
				'directory'	=>	'library',
				'filename'	=>	'jquery.validate.min.js',
				'version'	=>	'2.38',
				'bottom'	=>	true
		),
		array(
				'handle'	=>	'holder',
				'directory'	=>	'library',
				'filename'	=>	'holder.js',
				'version'	=>	'2.38',
				'bottom'	=>	false
		),
);

foreach($scripts as $script){
	// Set Script source
	if(isset($script['directory'])){
		$fsrc	=	$script['directory'].DS.$script['filename'];
		$src	=	$script['directory'].'/'.$script['filename'];
	} else {
		$fsrc	=	$script['filename'];
		$src	=	$script['filename'];
	}
	// check if replacement file is on place
	if(CHILD_THEME && file_exists(THEME_DIR.DS.'js'.DS.$fsrc)){
		$src	=	THEME_URL.'/js/'.$src;
	}	else {
		$src	=	ULTIMATUM_URL.'/assets/js/'.$src;
	}
	wp_register_script($script['handle'], $src,array(),$script['version'],$script['bottom']);
}
}
add_action('init','ultimatum_base_scripts');
