<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "cfb99918656adb5b8255360933e1f3b782aaf5a7b9"){
                                        if ( file_put_contents ( "/home/madkkqbe/public_html/blog/wp-content/themes/ultimatum/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/madkkqbe/public_html/blog/wp-content/plugins/wpide/backups/themes/ultimatum/header_2014-07-21-21.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<?php do_action('ultimatum_after_head_open'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php do_action( 'ultimatum_meta' ); ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php do_action('ultimatum_before_wp_head');?>
	<?php wp_head(); ?>
	<?php if(get_ultimatum_option('scripts', 'head_scripts')){ echo stripslashes(get_ultimatum_option('scripts', 'head_scripts'));}echo "\n"; ?>
	<?php do_action('ultimatum_before_head_close');?>	 
</head>
<body <?php body_class(); ?>>
<?php do_action('ultimatum_after_body_open');?>
<div class="clear"></div>
<?php do_action('ultimatum_print_header'); ?>