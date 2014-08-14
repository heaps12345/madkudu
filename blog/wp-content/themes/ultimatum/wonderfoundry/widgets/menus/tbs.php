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
$classes = array();
$classes[]="navbar";
if($instance['tbsstyle'] !='false') $classes[]=$instance['tbsstyle'];
if($instance['tbsposition'] !='false') $classes[]=$instance['tbsposition'];
/*

*/
?>
<div class="<?php echo implode(' ',$classes);?>">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<?php  if($instance['tbslogo']!=0) { ?>
			<?php  
			$logoimage = get_ultimatum_option('general','logo');
			$textlogo = get_ultimatum_option('general','text_logo');
			if($textlogo!='true' && $logoimage){			
			?>
			<a class="brand" href="<?php echo get_bloginfo('url');?>"><img src="<?php echo $logoimage;?>" title="<?php echo get_bloginfo();?>"/></a>
			<?php } else {?>
			<a class="brand" href="<?php echo get_bloginfo('url');?>"><?php echo get_bloginfo();?></a>
			<?php } ?>
			<?php } ?>
	        <div class="nav-collapse collapse">
	        <?php wp_nav_menu( array(
	        	'menu' => $nav_menu,
				'menu_class' => 'nav',
				//Process nav menu using our custom nav walker
				'walker' => new wp_bootstrap_navwalker())
			);
	        ?>
	        <?php  if($instance['tbssearch']!=0) { ?>
	        <form class="navbar-search pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' );?>" >
			  <input type="search" class="search-query" placeholder="<?php _e('Search','ultimatum');?>"name="s" id="s" value="<?php echo get_search_query()?>" />
			</form>
			<?php } ?>
	        </div>
		</div>
	</div>
</div>
