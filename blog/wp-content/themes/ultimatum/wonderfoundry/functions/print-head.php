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

add_action('ultimatum_before_head_close', 'ultimatun_js_variables');
function ultimatun_js_variables(){
	$pptheme = get_ultimatum_option('scripts', 'pptheme');
	if(!isset($pptheme)){
		$pptheme='facebook';
	}
$html = <<<JS
<script type="text/javascript">
//<![CDATA[
var pptheme = '{$pptheme}';
//]]>
</script>
JS;
echo $html;
}


add_action('wp','ultimatum_layout_gen_start',1);
function ultimatum_layout_gen_start(){
	do_action('ultimatum_find_layout'); // pluggable layout finder to make all plugins work fine with extensions
	
}

require_once (ULTIMATUM_FUNCTIONS.DS."styles.php");
// Register Scripts
require_once (ULTIMATUM_FUNCTIONS.DS."scripts.php");
/* Load jQuery */
add_action('wp_enqueue_scripts','load_ujquery');
function load_ujquery(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('holder');
	wp_enqueue_style('ult-fawesome');
	wp_enqueue_style('ult-sliders');
	wp_enqueue_style('ult-menus');
	wp_enqueue_style('prettyphoto');
	wp_enqueue_style('social-icon-font');
}

/* Load the must have JS */
add_action('wp_enqueue_scripts', 'ultimatum_enqueue_general_scripts');
function ultimatum_enqueue_general_scripts() {
	global $ultimatumlayout;
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('jquery-prettyphoto');
	if($ultimatumlayout->ttype!=0){
		wp_enqueue_script('jquery-fitvids');
	}
	wp_enqueue_script('ultimatum-js');
	// Some Plugins may need to be added here
	do_action('ultimatum_enqueue_more_scripts');
}

add_action('wp_enqueue_scripts','ultimatum_layout_css',1);
function ultimatum_layout_css(){
	global $ultimatumlayout;
	$possible_css_files = array(
			array('handle'	=>	'template_'.$ultimatumlayout->theme,),
			array('handle'	=>	'layout_'.$ultimatumlayout->id,),
	);
	foreach($possible_css_files as $css_file){
		$filename = THEME_CACHE_DIR.DS.$css_file['handle'].'.css';
		$fileurl = THEME_CACHE_URL.'/'.$css_file['handle'].'.css';
		if(file_exists($filename))
			wp_enqueue_style('ult_core_'.$css_file['handle'],$fileurl);
	}
}

add_action('wp_enqueue_scripts','ultimatum_layout_custom_css',20);
function ultimatum_layout_custom_css(){
	global $ultimatumlayout;
	$possible_css_files = array(
			array('handle'	=>	'template_custom_'.$ultimatumlayout->theme,),
			array('handle'	=>	'layout_custom_'.$ultimatumlayout->id,),
	);
	foreach($possible_css_files as $css_file){
		$filename = THEME_CACHE_DIR.DS.$css_file['handle'].'.css';
		$fileurl = THEME_CACHE_URL.'/'.$css_file['handle'].'.css';
		if(file_exists($filename) && !current_user_can('manage_options'))
			wp_enqueue_style($css_file['handle'],$fileurl);
	}
}
/*
 * Re-Order CSS files so structural ULt files comes first
 */

function theme_combine_css($handles){
	if(is_admin()){
		return;
	}
	global $wp_styles;
	if (! is_object($wp_styles)) return;
	$combine_styles = array();
	$queue_unset = array();
	$wp_styles->all_deps($wp_styles->queue);
	foreach ($wp_styles->to_do as $key => $handle) {
		$media = ($wp_styles->registered[$handle]->args ? $wp_styles->registered[$handle]->args : 'screen');
		$src = $wp_styles->registered[$handle]->src;
		if (substr($src, 0, 4) != 'http') {
			$src = site_url($src);
			$external = false;
		} else {
			$home = home_url();
			if (substr($src, 0, strlen($home)) == $home) {
				$external = false;
			} else	{
				$external = true;
			}
		}
		if(!$external){
			$combine_styles[$media][$handle] = $src;
			unset($wp_styles->to_do[$key]);
			$queue_unset[$handle] = true;
		}
	}
	foreach ($wp_styles->queue as $key => $handle) {
		if (isset($queue_unset[$handle])){
			if(!in_array($handle, $wp_styles->done, true)){
				$wp_styles->done[] = $handle;
			}
			unset($wp_styles->queue[$key]);
		}
	}
	foreach ($combine_styles as $media => $styles) {
		$fileId = 0;
		foreach($styles as $handle => $src){
			$path = ABSPATH . str_replace(get_option('siteurl').'/', '', $src);
			$fileId += @filemtime($path);
		}

		$cache_name = md5(serialize($combine_styles).$fileId);
		$cache_file_path = THEME_CACHE_DIR . '/' .$cache_name .'.css';
		$cache_file_url = THEME_CACHE_URL . '/' .$cache_name .'.css';
			
		if(!is_readable($cache_file_path)){
			$content = '';
			foreach($styles as $handle => $src){
				$htppath = str_replace(basename($src),'',$src);
				$content .= "/* $handle: ($src)  $htppath*/\n";
				$file_content =@file_get_contents($src) ;
				//do the url fixes
				$urls = array();
				$urls =  extract_css_urls( $file_content );
				if(count($urls)):
				$uniqueurls =$urls['property'];
				$uniqueurls= array_unique($uniqueurls);
				foreach ($uniqueurls as $url){
					if(!preg_match('/http:/i', $url)){
						$urlnew ='';
						$urlnew = $htppath.$url;
						$file_content = str_replace($url, $urlnew, $file_content);
					}
				}
				endif;
				$content .= $file_content. "\n\n";
			}
			if (is_writable(THEME_CACHE_DIR)) {
				$fhandle = @fopen($cache_file_path, 'w+');
				if ($fhandle) fwrite($fhandle, $content, strlen($content));
			}
		}
		wp_enqueue_style(THEME_SLUG.'-styles-'.$media, $cache_file_url, false, false, $media);
	}
}
if(get_ultimatum_option('scripts', 'combinecss')){
	add_action('wp_print_styles', 'theme_combine_css',100);
}

function extract_css_urls( $text )
{
	$urls = array( );

	$url_pattern     = '(([^\\\\\'", \(\)]*(\\\\.)?)+)';
	$urlfunc_pattern = 'url\(\s*[\'"]?' . $url_pattern . '[\'"]?\s*\)';
	$pattern         = '/(' .
			'(@import\s*[\'"]' . $url_pattern     . '[\'"])' .
			'|(@import\s*'      . $urlfunc_pattern . ')'      .
			'|('                . $urlfunc_pattern . ')'      .  ')/iu';
	if ( !preg_match_all( $pattern, $text, $matches ) )
		return $urls;
	foreach ( $matches[3] as $match )
	if ( !empty($match) )
		$urls['import'][] =
		preg_replace( '/\\\\(.)/u', '\\1', $match );
	foreach ( $matches[7] as $match )
	if ( !empty($match) )
		$urls['import'][] =
		preg_replace( '/\\\\(.)/u', '\\1', $match );
	foreach ( $matches[11] as $match )
	if ( !empty($match) )
		$urls['property'][] =
		preg_replace( '/\\\\(.)/u', '\\1', $match );

	return $urls;
}

function ultimatum_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ultimatum' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'ultimatum_wp_title', 10, 2 );
//cufon include
add_action('ultimatum_before_head_close','ult_cufon_include',20);
function ult_cufon_include(){
	global $ultimatumlayout;
	if(file_exists(THEME_CACHE_DIR.'/cufon_template_'.$ultimatumlayout->theme.'_css.php')){
		include (THEME_CACHE_DIR.'/cufon_template_'.$ultimatumlayout->theme.'_css.php');
	}

}
add_action('ultimatum_after_head_open','ult_favicon_placer');
function ult_favicon_placer(){
	if(get_ultimatum_option('general', 'favicon')){
		echo '<link rel="shortcut" href="'.get_ultimatum_option('general', 'favicon').'" type="image/x-icon" />'."\n";
		echo '<link rel="shortcut icon" href="'.get_ultimatum_option('general', 'favicon').'" type="image/x-icon" />'."\n";
	} else {
		echo '<link rel="shortcut" href="'.ULTIMATUM_URL.'/assets/images/ultimatum-icon.png" type="image/x-icon" />'."\n";
echo '<link rel="shortcut icon" href="'.ULTIMATUM_URL.'/assets/images/ultimatum-icon.png" type="image/x-icon" />'."\n";
	}
}



