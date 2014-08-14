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
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
global $wpdb;
$prefix = $wpdb->prefix;
$old_prefix = 'ultimatum';
$new_prefix = 'ult25';
/*
 * 1 - Convert OLD DB to NEW DB
 */

/* Create new tables */
$table_create_sql = array(
		"CREATE TABLE IF NOT EXISTS `".$prefix.$new_prefix."_extra_rows` (
					`template_id` int(11) NOT NULL,
					`name` varchar(255) NOT NULL,
					`slug` varchar(55) NOT NULL,
					`grid` varchar(55) NOT NULL,
					`amount` int(11) NOT NULL,
					UNIQUE KEY `template-row` (`template_id`,`slug`)
					) _collate_;",
		"CREATE TABLE IF NOT EXISTS `".$prefix.$new_prefix."_templates` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`name` varchar(255) NOT NULL,
					`width` int(11) NOT NULL,
					`margin` int(11) NOT NULL,
					`mwidth` int(11) NOT NULL,
					`mmargin` int(11) NOT NULL,
					`swidth` int(11) NOT NULL,
					`smargin` int(11) NOT NULL,
					`gridwork` varchar(255) NOT NULL DEFAULT 'ultimatum',
					`swatch` varchar(255) NOT NULL DEFAULT 'default',
					`type` int(11) NOT NULL,
					`dcss` varchar(3) NOT NULL DEFAULT 'no',
					`default` int(11) NOT NULL,
					`theme` varchar(255) NOT NULL,
					PRIMARY KEY (`id`)
					) _collate_;"
);
$collate = '';
if ( $wpdb->has_cap( 'collation' ) ) {
	if( ! empty($wpdb->charset ) )
		$collate .= "DEFAULT CHARACTER SET $wpdb->charset";
	if( ! empty($wpdb->collate ) )
		$collate .= " COLLATE $wpdb->collate";
}

foreach ($table_create_sql as $table){
	$table = str_replace('_collate_', $collate, $table);
	dbDelta( $table );
}
/*
 * Identical tables in both versions
 */
$identicaltables= array(
		'classes',
		'css',
		'layout',
		'layout_assign',
		'ptypes',
		'rows',
		'sc',
		'mobile',
		'tax',
);
foreach($identicaltables as $identicaltable){
	ultimatum_rename_table($identicaltable);
}
$layoutsexist = array();
// do the layout table conversion
$layouttable = $wpdb->prefix.$new_prefix.'_layout';
$selectlayouts = "SELECT * FROM `".$layouttable."`";
$layouts = $wpdb->get_results($selectlayouts);
foreach ($layouts as $layout){
	if($layout->type!="part"){
		$layoutsexist[]=$layout->id;
	}
	$newbefore = array();
	$newafter = array();
	$newrows = array();
	$newbeforeinsert = $layout->before;
	$newafterinsert = $layout->after;
	$newrowinsert = $layout->rows;
	if(strlen($layout->before)>=1){
		$data = array();
		$data = explode(',',$layout->before);
		foreach ($data as $dat){
			$newbefore[] = 'layout-'.$dat;
		}
		$newbeforeinsert = implode(',',$newbefore);
	}
	if(strlen($layout->after)>=1){
		$data = array();
		$data = explode(',',$layout->after);
		foreach ($data as $dat){
			$newafter[] = 'layout-'.$dat;
		}
		$newafterinsert = implode(',',$newafter);
	}
	if(strlen($layout->rows)>=1){
		$data = array();
		$data = explode(',',$layout->rows);
		foreach ($data as $dat){
			$newrows[] = 'row-'.$dat;
		}
		$newrowinsert = implode(',', $newrows);
	}
	$update = "UPDATE `".$layouttable."` SET `before`='".$newbeforeinsert."', `after`='".$newafterinsert."', `rows`='".$newrowinsert."' WHERE `id`='".$layout->id."'";
	$wpdb->query($update);
}

// do the templates table conversion
$themesexist = array();
$oldtemplatestable =  $wpdb->prefix.$old_prefix.'_themes';
$newtemplatestable =  $wpdb->prefix.$new_prefix.'_templates';
$selecttemplates = "SELECT * FROM `".$oldtemplatestable."`";
$templates = $wpdb->get_results($selecttemplates);
foreach ($templates as $template){
	$id			= $template->id;
	$name		= $template->name;
	$width		= $template->width;
	$margin		= $template->margin;
	$mwidth 	= 1200;
	$mmragin	= 20;
	$swidth 	= 744;
	$smargin	= 20;
	$gridwork	= "ultimatum";
	$swatch		= "default";
	$type		= $template->type;
	$dcss 		= "no";
	$default	= $template->published;
	$theme 		= $template->template;
	$themesexist[] = $template->template;
	$inserttonewtemplates = "INSERT INTO `".$newtemplatestable."` VALUES ('".$id."', '".$name."', '".$width."', '".$margin."', '".$mwidth."', '".$mmragin."', '".$swidth."', '".$smargin."', '".$gridwork."', '".$swatch."', '".$type."', '".$dcss."', '".$default."', '".$theme."')";
	$wpdb->query($inserttonewtemplates);
}
// Go for the custom CSS
/*
 * Ult 2.3 has only css per layout and also custom css per layout so we need to check each layout in each theme
 */
// $cssfile = THEME_CACHE_DIR.'/custom_'.$prel.$layout_id.'.css';
$upload_dir = wp_upload_dir();
$uploaddir = $upload_dir["basedir"];
foreach ($themesexist as $theme){
	$dir = $uploaddir.'/'.$theme;
	if(is_multisite()){
		global $blog_id;
		$prel = $blog_id.'_';
	}else{
	
	}
	foreach ($layoutsexist as $layoex){
		$file = $dir.'/custom_'.$prel.$layoex.'.css';
		if(file_exists($file)){
			$option = $theme.'_custom_css_'.$layoex;
			$css= stripslashes_deep(file_get_contents($file));
			update_option($option, $css,false);
		}
	}
	// ultimatum_css_generator_fromimport($theme,false);
}
/*
 * 2- Convert OLD Options to New Options
 */
$old_options = get_option('ultimatum_general');
/*
 * ultimatum_scripts
 * ultimatum_tags 
 * ultimatum_sidebars
 */
$opitonconverter = array(
		'scripts' => array("head_scripts","footer_scripts","pptheme", "google_charset","tw_consumer_key","tw_consumer_secret","tw_access_token","tw_access_secret"),
		'tags' => array("multi_logo","multi_slogan","multi_article", "multi_widget","single_logo", "single_slogan","single_article","single_widget"),
		'sidebars' => array('sidebars'),

);
foreach($opitonconverter as $option => $values){
	$newoption = 'ultimatum_'.$option;
	$newoptionvalue = array();
	foreach ($values as $value){
		$newoptionvalue["$value"] = $old_options["$value"];
	}
	update_option($newoption, $newoptionvalue,false);
}

/*
 * 4 - Convert Sliders To posts and add Images
 */
$slidesdir = $uploaddir.'/slideShow';
$sliderstable = $wpdb->prefix.$old_prefix.'_slides';
$sliderselect = "SELECT * FROM `".$sliderstable."`";
$slidesres = $wpdb->get_results($sliderselect);
$sliderconverter = array();
foreach($slidesres as $slider){
	$imgids = array();
	$images = unserialize($slider->images);
	foreach($images as $image){
		$imgfile = $slidesdir.'/'.$slider->id.'/'.$image['image'];
		$img_name = basename( $imgfile );
		$title = explode( '.', $img_name );
		array_pop( $title );
		$title = implode( '.', $title );
		$file = array( 'file' => $imgfile, 'tmp_name' => $imgfile, 'name' => $img_name );
		$img_id = media_handle_sideload( $file, 0, $title );
		add_post_meta($img_id, '_ult_slide_title', $image['title']);
		add_post_meta($img_id, '_ult_slide_text', $image['text']);
		add_post_meta($img_id, '_ult_slide_link', $image['link']);
		add_post_meta($img_id, '_ult_slide_video', $image['video']);
		$imgids[]=$img_id;
	}
	$slider_post = array(
			'post_title' => $slider->name,
			'post_type' => 'ult_slideshow',
			'post_status'   => 'publish',
	);
	$slider_ID = wp_insert_post( $slider_post );
	add_post_meta($slider_ID, '_image_ids', implode(',',$imgids));
	$sliderconverter["$slider->id"] = $slider_ID;
}
/*
 * 5 - DO Widget Updates 
 */
$widgetslider = (get_option('widget_ultimatumslide'));
foreach($widgetslider as $key=>$values){
	if(is_int($key)){
		if(is_numeric($values['slide'])){
			$old_id = $values['slide'];
			$new_id = $sliderconverter["$old_id"];
			$widgetslider["$key"]["slide"]=$new_id;
		}
	}
} 
update_option('widget_ultimatumslide', $widgetslider);


function ultimatum_rename_table($tablename){
	global $wpdb;
	$old_prefix = 'ultimatum';
	$new_prefix = 'ult25';
	$old = $wpdb->prefix.$old_prefix.'_'.$tablename;
	$new = $wpdb->prefix.$new_prefix.'_'.$tablename;
	$sql = "RENAME TABLE `" . $old . "` TO `" . $new . "`";
	$wpdb->query($sql);
}