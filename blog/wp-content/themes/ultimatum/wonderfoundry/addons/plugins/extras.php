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
 * @version 2.50
 */

/*
 * Include the core 
 */
WonderWorksHelper::requireFromFolder(ULTIMATUM_PLUGINS.DS.'ultimatum_core');
$ultimatum_forms = ULTIMATUM_PLUGINS .DS. 'frontend-css'.DS.'ult-css.php';
require_once $ultimatum_forms;
	
if(get_ultimatum_option('extras', 'ultimatum_shortcodes')){
	WonderWorksHelper::requireFromFolder(UTIMATUM_SHORTCODES,"shortcodes");
	// insert Tiny Mce button
	$tinymce_button = ULTIMATUM_PLUGINS.DS.'tinymce'.DS.'tinymce.php';
	include $tinymce_button;
}
/*
 *  Enable Posts Type Order
 */
if(get_ultimatum_option('extras', 'ultimatum_pto')){
	$pto = ULTIMATUM_PLUGINS.DS.'post-types-order'.DS.'post-types-order.php';
	include $pto;
}

if(get_ultimatum_option('extras', 'ultimatum_slideshows')){
	$sliders= ULTIMATUM_PLUGINS.DS.'ult-sliders'.DS.'usliders.php';
	include $sliders;
}
/*
 * Enable Multiple Featured Images
 */
if(get_ultimatum_option('extras', 'ultimatum_postgals')) { 
 	require_once (ULTIMATUM_ADMIN_HELPERS.'/metabox.generator.php');
	require_once (ULTIMATUM_ADMIN_HELPERS.'/metaboxes/gallery.php');
}

