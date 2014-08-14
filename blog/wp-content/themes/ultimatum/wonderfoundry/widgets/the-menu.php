<?php
class UltimatumMenu extends WP_Widget {
	function UltimatumMenu() {
        parent::WP_Widget(false, $name = 'Ultimatum Menu');
    }

    function widget($args, $instance) {
       	extract( $args );
       	$nav_menu = wp_get_nav_menu_object( $instance['nav_menu'] );
       	$menu_style= ULTIMATUM_WIDGETS.DS.'menus'.DS.$instance['menustyle'].'.php';
       	if($instance['menustyle']!='tbs' && $instance['responsivepx']!=0){
       		echo '<div class="ultimatum-menu-container" data-menureplacer="'.$instance['responsivepx'].'">';
       		echo '<div class="ultimatum-regular-menu">';
       	}
       	if(file_exists($menu_style)){
       		include ($menu_style);
       	}
       	if($instance['menustyle']!='tbs' && $instance['responsivepx']!=0){
       		echo '</div>';
       	?>
       	<div class="ultimatum-responsive-menu">
 		<form id="responsive-nav-<?php echo $this->id; ?>" action="" method="post" class="responsive-nav-form">
				<div><select class="responsive-nav-menu">
				<option value=""><?php _e('Navigation',THEME_LANG_DOMAIN);?></option>
				<?php 
				
				$menu = wp_nav_menu(array('fallback_cb' => '', 'menu' => $nav_menu, 'echo' => false));
				   if (preg_match_all('#(<a [^<]+</a>)#',$menu,$matches)) {
				      $hrefpat = '/(href *= *([\"\']?)([^\"\' ]+)\2)/';
				      foreach ($matches[0] as $link) {
				         // Do something with the link
				         if (preg_match($hrefpat,$link,$hrefs)) {
				            $href = $hrefs[3];
				         }
				         if (preg_match('#>([^<]+)<#',$link,$names)) {
				            $name = $names[1];
				         }
				         echo "<option value=\"$href\">$name</option>";
				      }
				   }				
				
    			?>
			</select></div>
			</form>
 		</div>
 		</div>
       	<?php 
       	}
       	?><div class="clearfix"></div><?php 
    }

 function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['menustyle'] = strip_tags( stripslashes($new_instance['menustyle']) );
		$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		$instance['rowItems'] = $new_instance['rowItems'];
		$instance['subMenuWidth'] = $new_instance['subMenuWidth'];
		$instance['direction'] =$new_instance['direction'];
		$instance['skin'] = $new_instance['skin'];
		$instance['speed'] = $new_instance['speed'];
		$instance['effect'] = $new_instance['effect'];
		
		$instance['vrowItems'] = $new_instance['vrowItems'];
		$instance['vdirection'] =$new_instance['vdirection'];
		$instance['vspeed'] = $new_instance['vspeed'];
		$instance['veffect'] = $new_instance['veffect'];
		
		$instance['depth'] = (int) $new_instance['depth'];
		$instance['only_related'] = (int) $new_instance['only_related'];
		$instance['float'] = $new_instance['float'];
		$instance['hndfloat'] = $new_instance['hndfloat'];
		
		$instance['tbsstyle'] =  $new_instance['tbsstyle'];
		$instance['tbsposition'] = $new_instance['tbsposition'];
		$instance['tbslogo'] = $new_instance['tbslogo'];
		$instance['tbssearch'] = $new_instance['tbssearch'];
		$instance['tbsresponsive'] = $new_instance['tbsresponsive'];
		$instance['responsivepx'] = $new_instance['responsivepx'];
		return $instance;
	}
function form($instance) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$menustyle = isset( $instance['menustyle'] ) ? $instance['menustyle'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		$subMenuWidth = isset( $instance['subMenuWidth'] ) ? $instance['subMenuWidth'] : '';
		$rowItems = isset( $instance['rowItems'] ) ? $instance['rowItems'] : '';
		$skin = isset( $instance['skin'] ) ? $instance['skin'] : '';
		$speed = isset( $instance['speed'] ) ? $instance['speed'] : 'normal';
		$direction = isset( $instance['direction'] ) ? $instance['direction'] : '';
		$effect = isset( $instance['effect'] ) ? $instance['effect'] : 'slide';
		
		$vrowItems = isset( $instance['vrowItems'] ) ? $instance['vrowItems'] : '';
		$vspeed = isset( $instance['vspeed'] ) ? $instance['vspeed'] : 'normal';
		$vdirection = isset( $instance['vdirection'] ) ? $instance['vdirection'] : '';
		$veffect = isset( $instance['veffect'] ) ? $instance['veffect'] : 'slide';
		
		$only_related = isset( $instance['only_related'] ) ? (int) $instance['only_related'] : 1;
		$depth = isset( $instance['depth'] ) ? (int) $instance['depth'] : 0;
		$float = isset( $instance['float'] ) ?  $instance['float'] : 'left';
		$hndfloat = isset( $instance['hndfloat'] ) ?  $instance['hndfloat'] : 'left';
		$tbsstyle = isset( $instance['tbsstyle'] ) ? $instance['tbsstyle'] : 'false';
		$tbsposition = isset( $instance['tbsposition'] ) ? $instance['tbsposition'] : 'false';
		$tbslogo = isset( $instance['tbslogo'] ) ? $instance['tbslogo'] : 'OFF';
		$tbssearch = isset( $instance['tbssearch'] ) ? $instance['tbssearch'] : 'OFF';
		$tbsresponsive = isset( $instance['tbsresponsive'] ) ? $instance['tbsresponsive'] : 'OFF';
		$responsivepx = isset($instance['responsivepx'])?$instance['responsivepx']:0;
		//$widget_options = wp_parse_args( $instance, $this->defaults );

		// Get menus
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.', 'ultimatum'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
	<p>
		<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:', 'ultimatum'); ?></label>
		<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
		<?php
			foreach ( $menus as $menu ) {
				$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
			}
		?>
		</select>
	</p>
	<div class="menu-select-wrapper">
			<label for="<?php echo $this->get_field_id('menustyle'); ?>"><?php _e('Menu Style:', 'ultimatum') ?></label>
			<select name="<?php echo $this->get_field_name('menustyle'); ?>" id="<?php echo $this->get_field_id('menustyle'); ?>" onchange="menuOpts(this);">
				<option value="hormega" <?php selected( $menustyle, 'hormega'); ?>><?php _e('Horizontal Mega Menu', 'ultimatum') ?></option>
				<option value="h" <?php selected( $menustyle, 'h'); ?>><?php _e('Horizontal DropDown Menu', 'ultimatum') ?></option>
				<option value="hnd" <?php selected( $menustyle, 'hnd'); ?>><?php _e('Horizontal Menu', 'ultimatum') ?></option>
				<option value="vermega" <?php selected( $menustyle, 'vermega'); ?>><?php _e('Vertical Mega Menu', 'ultimatum') ?></option>
				<option value="v" <?php selected( $menustyle, 'v'); ?>><?php _e('Vertical DropDown Menu', 'ultimatum') ?></option>
				<option value="vnd" <?php selected( $menustyle, 'vnd'); ?>><?php _e('Vertical Menu', 'ultimatum') ?></option>
				<option value="tbs" <?php selected( $menustyle, 'tbs'); ?>><?php _e('Bootstrap Menu', 'ultimatum') ?></option>
			</select>
		<div class="menu_options">
			<div class="hormega options" style="<?php if($menustyle!='hormega'){ echo 'display:none'; }?>">
				<p>
				  <label for="<?php echo $this->get_field_id('rowItems'); ?>"><?php _e( 'Number Items Per Row' , 'ultimatum'); ?></label>
					<select name="<?php echo $this->get_field_name('rowItems'); ?>" id="<?php echo $this->get_field_id('rowItems'); ?>" >
						<option value='1' <?php selected( $rowItems, '1'); ?> >1</option>
						<option value='2' <?php selected( $rowItems, '2'); ?> >2</option>
						<option value='3' <?php selected( $rowItems, '3'); ?> >3</option>
						<option value='4' <?php selected( $rowItems, '4'); ?> >4</option>
						<option value='5' <?php selected( $rowItems, '5'); ?> >5</option>
						<option value='6' <?php selected( $rowItems, '6'); ?> >6</option>
						<option value='7' <?php selected( $rowItems, '7'); ?> >7</option>
						<option value='8' <?php selected( $rowItems, '8'); ?> >8</option>
						<option value='9' <?php selected( $rowItems, '9'); ?> >9</option>
						<option value='10' <?php selected( $rowItems, '10'); ?> >10</option>
					</select>
					</p>
				<i><?php _e('To align Horizontal Mega menu to right you need to set a width otherwise leave empty', 'ultimatum');?></i>
				<p>
				<label for="<?php echo $this->get_field_id('subMenuWidth'); ?>"><?php _e( 'Hor. Mega Width' , 'ultimatum'); ?></label>
				<input type="text" value="<?php echo $subMenuWidth; ?>" size="3" id="<?php echo $this->get_field_id('subMenuWidth'); ?>" name="<?php echo $this->get_field_name('subMenuWidth'); ?>" />
				</p>
				<p><label for="<?php echo $this->get_field_id('effect'); ?>"><?php _e('Animation Effect', 'ultimatum'); ?>:</label>
					<select name="<?php echo $this->get_field_name('effect'); ?>" id="<?php echo $this->get_field_id('effect'); ?>" >
						<option value='fade' <?php selected( $effect, 'fade'); ?> ><?php _e('Fade In', 'ultimatum'); ?></option>
						<option value='slide' <?php selected( $effect, 'slide'); ?> ><?php _e('Slide Down', 'ultimatum'); ?></option>
					</select>
					
				</p>
				<p><label for="<?php echo $this->get_field_id('direction'); ?>"><?php _e('Animation Direction', 'ultimatum'); ?>:</label>
					<select name="<?php echo $this->get_field_name('direction'); ?>" id="<?php echo $this->get_field_id('direction'); ?>" >
						<option value='right' <?php selected( $direction, 'right'); ?> ><?php _e('Right', 'ultimatum'); ?></option>
						<option value='left' <?php selected( $direction, 'left'); ?> ><?php _e('Left', 'ultimatum'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('speed'); ?>"><?php _e('Animation Speed', 'ultimatum'); ?>:</label>
					<select name="<?php echo $this->get_field_name('speed'); ?>" id="<?php echo $this->get_field_id('speed'); ?>" >
						<option value='fast' <?php selected( $speed, 'fast'); ?> ><?php _e('Fast', 'ultimatum'); ?></option>
						<option value='normal' <?php selected( $speed, 'normal'); ?> ><?php _e('Normal', 'ultimatum'); ?></option>
						<option value='slow' <?php selected( $speed, 'slow'); ?> ><?php _e('Slow', 'ultimatum'); ?></option>
					</select>
				</p>
			</div>
			<div class="vermega options" style="<?php if($menustyle!='vermega'){ echo 'display:none'; }?>">
				<p>
				  <label for="<?php echo $this->get_field_id('vrowItems'); ?>"><?php _e( 'Number Items Per Row' , 'ultimatum'); ?></label>
					<select name="<?php echo $this->get_field_name('vrowItems'); ?>" id="<?php echo $this->get_field_id('vrowItems'); ?>" >
						<option value='1' <?php selected( $vrowItems, '1'); ?> >1</option>
						<option value='2' <?php selected( $vrowItems, '2'); ?> >2</option>
						<option value='3' <?php selected( $vrowItems, '3'); ?> >3</option>
						<option value='4' <?php selected( $vrowItems, '4'); ?> >4</option>
						<option value='5' <?php selected( $vrowItems, '5'); ?> >5</option>
						<option value='6' <?php selected( $vrowItems, '6'); ?> >6</option>
						<option value='7' <?php selected( $vrowItems, '7'); ?> >7</option>
						<option value='8' <?php selected( $vrowItems, '8'); ?> >8</option>
						<option value='9' <?php selected( $vrowItems, '9'); ?> >9</option>
						<option value='10' <?php selected( $vrowItems, '10'); ?> >10</option>
					</select>
				</p>
				<p><label for="<?php echo $this->get_field_id('veffect'); ?>"><?php _e('Animation Effect', 'ultimatum'); ?>:</label>
					<select name="<?php echo $this->get_field_name('veffect'); ?>" id="<?php echo $this->get_field_id('veffect'); ?>" >
						<option value='fade' <?php selected( $veffect, 'fade'); ?> ><?php _e('Fade In', 'ultimatum'); ?></option>
						<option value='slide' <?php selected( $veffect, 'slide'); ?> ><?php _e('Slide', 'ultimatum'); ?></option>
					</select>
				</p>
				<p><label for="<?php echo $this->get_field_id('vdirection'); ?>"><?php _e('Animation Direction', 'ultimatum'); ?>:</label>
					<select name="<?php echo $this->get_field_name('vdirection'); ?>" id="<?php echo $this->get_field_id('vdirection'); ?>" >
						<option value='right' <?php selected( $vdirection, 'right'); ?> ><?php _e('Right', 'ultimatum'); ?></option>
						<option value='left' <?php selected( $vdirection, 'left'); ?> ><?php _e('Left', 'ultimatum'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('vspeed'); ?>"><?php _e('Animation Speed', 'ultimatum'); ?>:</label>
					<select name="<?php echo $this->get_field_name('vspeed'); ?>" id="<?php echo $this->get_field_id('vspeed'); ?>" >
						<option value='fast' <?php selected( $vspeed, 'fast'); ?> ><?php _e('Fast', 'ultimatum'); ?></option>
						<option value='normal' <?php selected( $vspeed, 'normal'); ?> ><?php _e('Normal', 'ultimatum'); ?></option>
						<option value='slow' <?php selected( $vspeed, 'slow'); ?> ><?php _e('Slow', 'ultimatum'); ?></option>
					</select>
				</p>
			</div>
			<div class="h options" style="<?php if($menustyle!='h'){ echo 'display:none'; }?>">
				<p>
					<label for="<?php echo $this->get_field_id('float'); ?>"><?php _e('Alignment:'); ?></label>
					<select name="<?php echo $this->get_field_name('float'); ?>" id="<?php echo $this->get_field_id('float'); ?>" class="widefat">
						<option value="left" <?php selected( $float, 'left' ); ?>><?php _e('Left'); ?></option>
						<option value="right" <?php selected( $float, 'right' ); ?>><?php _e('Right'); ?></option>
						
					</select>
				</p>
			</div>
			<div class="hnd options" style="<?php if($menustyle!='hnd'){ echo 'display:none'; }?>">
				<p>
					<label for="<?php echo $this->get_field_id('hndfloat'); ?>"><?php _e('Alignment:'); ?></label>
					<select name="<?php echo $this->get_field_name('hndfloat'); ?>" id="<?php echo $this->get_field_id('hndfloat'); ?>" class="widefat">
						<option value="left" <?php selected( $hndfloat, 'left' ); ?>><?php _e('Left'); ?></option>
						<option value="right" <?php selected( $hndfloat, 'right' ); ?>><?php _e('Right'); ?></option>
						
					</select>
				</p>
			</div>
			<div class="v options" style="<?php if($menustyle!='v'){ echo 'display:none'; }?>">
			</div>
			<div class="vnd options" style="<?php if($menustyle!='vnd'){ echo 'display:none'; }?>">
				<h4><?php _e('Vertical Menu Options','ultimatum');?></h4>
				<p>
					<label for="<?php echo $this->get_field_id('only_related'); ?>"><?php _e('Show hierarchy:'); ?></label>
					<select name="<?php echo $this->get_field_name('only_related'); ?>" id="<?php echo $this->get_field_id('only_related'); ?>" class="widefat">
						<option value="1" <?php selected( $only_related, 1 ); ?>><?php _e('Display all'); ?></option>
						<option value="2" <?php selected( $only_related, 2 ); ?>><?php _e('Only related sub-items'); ?></option>
						<option value="3" <?php selected( $only_related, 3 ); ?>><?php _e( 'Only strictly related sub-items' ); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('depth'); ?>"><?php _e('How many levels to display:'); ?></label>
					<select name="<?php echo $this->get_field_name('depth'); ?>" id="<?php echo $this->get_field_id('depth'); ?>" class="widefat">
						<option value="0"<?php selected( $depth, 0 ); ?>><?php _e('Unlimited depth'); ?></option>
						<option value="1"<?php selected( $depth, 1 ); ?>><?php _e( '1 level deep' ); ?></option>
						<option value="2"<?php selected( $depth, 2 ); ?>><?php _e( '2 levels deep' ); ?></option>
						<option value="3"<?php selected( $depth, 3 ); ?>><?php _e( '3 levels deep' ); ?></option>
						<option value="4"<?php selected( $depth, 4 ); ?>><?php _e( '4 levels deep' ); ?></option>
						<option value="5"<?php selected( $depth, 5 ); ?>><?php _e( '5 levels deep' ); ?></option>
						<option value="-1"<?php selected( $depth, -1 ); ?>><?php _e( 'Flat display' ); ?></option>
					</select>
				<p>
			</div>
			<div class="tbs options" style="<?php if($menustyle!='tbs'){ echo 'display:none'; }?>">
				<p>
					<label for="<?php echo $this->get_field_id('tbsstyle'); ?>"><?php _e('Menu Style:'); ?></label>
					<select name="<?php echo $this->get_field_name('tbsstyle'); ?>" id="<?php echo $this->get_field_id('tbsstyle'); ?>" class="widefat">
						<option value="false" <?php selected( $tbsstyle, 'false' ); ?>><?php _e('Default','ultimatum'); ?></option>
						<option value="navbar-inverse" <?php selected( $tbsstyle, 'navbar-inverse' ); ?>><?php _e('Inverse','ultimatum'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('tbsposition'); ?>"><?php _e('Menu Position:'); ?></label>
					<select name="<?php echo $this->get_field_name('tbsposition'); ?>" id="<?php echo $this->get_field_id('tbsposition'); ?>" class="widefat">
						<option value="false" <?php selected( $tbsposition, 'false' ); ?>><?php _e('Default','ultimatum'); ?></option>
						<option value="navbar-fixed-top" <?php selected( $tbsposition, 'navbar-fixed-top' ); ?>><?php _e('Fixed Top','ultimatum'); ?></option>
						<option value="navbar-fixed-bottom" <?php selected( $tbsposition, 'navbar-fixed-bottom' ); ?>><?php _e('Fixed Bottom','ultimatum'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('tbslogo'); ?>"><?php _e('Show Logo:'); ?></label>
					<select name="<?php echo $this->get_field_name('tbslogo'); ?>" id="<?php echo $this->get_field_id('tbslogo'); ?>" class="widefat">
						<option value="0" <?php selected( $tbslogo, 0 ); ?>><?php _e('OFF','ultimatum'); ?></option>
						<option value="1" <?php selected( $tbslogo, 1 ); ?>><?php _e('ON','ultimatum'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('tbssearch'); ?>"><?php _e('Show Search:'); ?></label>
					<select name="<?php echo $this->get_field_name('tbssearch'); ?>" id="<?php echo $this->get_field_id('tbssearch'); ?>" class="widefat">
						<option value="0" <?php selected( $tbssearch, 0 ); ?>><?php _e('OFF','ultimatum'); ?></option>
						<option value="1" <?php selected( $tbssearch, 1 ); ?>><?php _e('ON','ultimatum'); ?></option>
					</select>
				</p>
				
			</div>
		</div>	
	
	</div>
	<p>
        	<label for="<?php echo $this->get_field_id('responsivepx'); ?>"><?php _e('Convert to Dropdown after', 'ultimatum'); ?></label>
			<input id="<?php echo $this->get_field_id('responsivepx'); ?>" name="<?php echo $this->get_field_name('responsivepx'); ?>" type="text" value="<?php echo $responsivepx; ?>"  />px
			<br /><i>Works for non bootstrap menus only</i>
		</p>
	
	

	
	
	<?php 
	}
   
}
add_action('widgets_init', create_function('', 'return register_widget("UltimatumMenu");'));


