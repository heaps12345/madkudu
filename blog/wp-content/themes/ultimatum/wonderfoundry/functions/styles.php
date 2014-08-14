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
function ultimatum_base_styles(){ 
$styles = array(
		array(
				'handle'	=>	'ult-reset',
				'filename'	=>	'reset.css',
		),
		array(
				'handle'	=>	'ult-sliders',
				'filename'	=>	'ult-sliders.css'
		),
		array(
				'handle'	=>	'ult-menus',
				'filename'	=>	'ult-menus.css'
		),
		
		array(
				'handle'	=>	'prettyphoto',
				'filename'	=>	'prettyphoto.css'
		),
		
		array(
				'handle'	=>	'ult-fawesome',
				'filename'	=>	'font-awesome.min.css'
		),
		array(
				'handle'	=>	'social-icon-font',
				'filename'	=>	'social-icon-font.css'
		),
		
		
		
);

foreach($styles as $style){
	// Set Script source
	if(isset($script['directory'])){
		$fsrc	=	$style['directory'].DS.$style['filename'];
		$src	=	$style['directory'].'/'.$style['filename'];
	} else {
		$fsrc	=	$style['filename'];
		$src	=	$style['filename'];
	}
	// check if replacement file is on place
	if(CHILD_THEME && file_exists(THEME_DIR.DS.'js'.DS.$fsrc)){
		$src	=	THEME_URL.'/css/'.$src;
	}	else {
		$src	=	ULTIMATUM_URL.'/assets/css/'.$src;
	}
	wp_register_style($style['handle'], $src);
}
}
add_action('init','ultimatum_base_styles');