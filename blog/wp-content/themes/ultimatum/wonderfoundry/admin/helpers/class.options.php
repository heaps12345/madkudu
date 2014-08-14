<?php
class optionGenerator {
	var $name;
	var $options;
	var $saved_options;
	/**
	 * Constructor
	 * 
	 * @param string $name
	 * @param array $options
	 */
	function optionGenerator($name, $options) {
		
		$this->name = $name;
		$this->options = $options;
		
		$this->save_options();
		$this->render();
	}
	
	function save_options() {
		$setter='_';
		if(isset($_GET["layout_id"])){
			$setter='_'.$_GET["layout_id"].'_';	
		}
		if(isset($_GET["template_id"])){
			$setter='_template_'.$_GET["template_id"].'_';
		}
		if(preg_match('/ultimatum_/i', $this->name)){
			$optionmane = $this->name;
		} else {
			$optionmane=THEME_SLUG .$setter. $this->name;
		}
		
		$options = get_option($optionmane);
		if('ultimatum_toolset' == $this->name){
			$options = get_site_option($optionmane);
		}
		if (isset($_POST['save_options'])) {
			
			foreach($this->options as $value) {
				
				if (isset($value['id']) && ! empty($value['id'])) {
					if (isset($_POST[$value['id']])) {
						if($value['type'] == 'toggle'){
							if($_POST[$value['id']] == 'true'){
								$options[$value['id']] = true;
							}else{
								$options[$value['id']] = false;
							}
						} else {
							$options[$value['id']] = $_POST[$value['id']];
						}
					} else {
						$options[$value['id']] = false;
					}
				}
				if (isset($value['process']) && function_exists($value['process'])) {
					$options[$value['id']] = $value['process']($value,$options[$value['id']]);
				}
			}
			if ($options != $this->options) {
				if('ultimatum_toolset' == $this->name){
					update_site_option($optionmane, $options);
				} else {
					update_option($optionmane, $options);
				}
				global $theme_options;
				$theme_options[$this->name] = $options;
				if($this->name=='css'){
					require_once (ULTIMATUM_ADMIN_HELPERS .DS. 'class.css.saver.php');
					if(isset($_GET['layout_id'])){
						WonderWorksCSS::saveCSS($_GET["layout_id"]);
					}
					if(isset($_GET['template_id'])){
						WonderWorksCSS::saveCSS($_GET["template_id"],'template');
					}	
				}
			}
			echo '<div id="message" class="updated fade"><p><strong>Updated Successfully</strong></p></div>';
		}
		$this->saved_options = $options;
	}
	
	
	function render() {
		if(isset($this->options) && is_array($this->options)):
		echo '<div class="wrap">';
		echo '<form method="post" action="" id="ult-setting-form">';
		
		foreach($this->options as $option) {
			if (isset($option['type']) && method_exists($this, $option['type'])) {
				$this->$option['type']($option);
			}
		
		}
		
		echo '<input type="hidden" name="save_options" value="true" /></form>';
		echo '</div>';
		endif;
	}
	
	/**
	 * prints the options page title
	 */
	function title($value) {
		echo '<h2>' . $value['name'] . '</h2>';
		if (isset($value['desc'])) {
			echo '<p>' . $value['desc'] . '</p>';
		}
	}
	
	
	function table_start($value){
		echo '<table width="100%">';
	}
	function table_end($value){
		echo '</table>';
	}
	function table_row_start($value){
		echo '<tr valign="top">';
	}
	function table_col_start($value){
		echo '<td width="'.$value['default'].'">';
	}
	function table_row_end($value){
		echo '</tr>';
	}
	function table_col_end($value){
		echo '</td>';
	}
	function explain($value){
		echo '<p><i>'.$value["name"].'</i></p>';
	}
	
	/**
	 * begins the group section
	 */
	function start($value) {
		echo '<div class="">';
		echo '<table cellspacing="0" class="widefat ult-tables">';
		echo '<thead><tr valign="top" class="alternate">';
		echo '<td scope="row" colspan="3"><h3>' . $value['name'] . '</h3></td>';
		echo '</tr></thead><tbody>';
	}
	
	function txtElementHead($value) {
	}
	
	function txtElement($value) {
		$values = isset($this->saved_options[$value['id']])? $this->saved_options[$value['id']]:'';
		
		echo '<table  class="widefat ult-tables" style="width:100%">';
		echo '<thead><tr class="alternate">';
		echo '<td colspan="7"><h3>' .$value["name"].'</h3></td></tr></thead><tbody>';
		if(isset($value['default']['font-family'])){
		echo '<tr>';
		echo '<td>' . __('Font Family', 'ultimatum') . '</td>';
		echo '<td>';
		$dfonts= array(
				'inherit' => 'inherit',
				'Arial,Helvetica,Garuda,sans-serif' => 'Arial,Helvetica,Garuda,sans-serif',
				'"Arial Black",Gadget,sans-serif' => '"Arial Black",Gadget,sans-serif',
				'Verdana,Geneva,Kalimati,sans-serif' => 'Verdana,Geneva,Kalimati,sans-serif',
				'"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif' => '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
				'Georgia,"Nimbus Roman No9 L",serif' => 'Georgia,"Nimbus Roman No9 L",serif',
				'"Palatino Linotype","Book Antiqua",Palatino,FreeSerif,serif' => '"Palatino Linotype","Book Antiqua",Palatino,FreeSerif,serif',
				'Tahoma,Geneva,Kalimati,sans-serif' => 'Tahoma,Geneva,Kalimati,sans-serif',
				'"Trebuchet MS",Helvetica,Jamrul,sans-serif' => '"Trebuchet MS",Helvetica,Jamrul,sans-serif',
				'"Times New Roman",Times,FreeSerif,serif' => '"Times New Roman",Times,FreeSerif,serif',
			);
			// Get the enabled Fonts
			$fonts =get_option(THEME_SLUG . '_fonts');
			$cufon= isset($fonts["cufon"]) ? $fonts["cufon"]: false;
			$fontface=isset($fonts["fontface"])? $fonts["fontface"] : false;
			$google = isset($fonts["google"]) ? $fonts["google"] : false;
		//	print_r($cufon);
			echo '<select name="' . $value['id']. '[font-family]" id="' . $value['id'] . '" style="width:200px;">';
			if (isset($dfonts)) {
				foreach($dfonts as $key => $option) {
					echo "<option value='" . $key . "'";
					if (isset($values['font-family'])) {
						if (stripslashes($values['font-family']) == $key) {
							echo ' selected="selected"';
						}
					} else {
						if($key == $value['default']['font-family']) {
								echo ' selected="selected"';
						}
					}
					echo '>' . $option . '</option>';
				}
			}
			if(is_array($cufon) && count($cufon)!=0 && $value['cufon']){
				echo '<optgroup label="Cufon Fonts">';
				foreach ($cufon as $font=>$js){
					$key = 'cufon-'.$font.'-js-'.$js;
					echo '<option value="'.$key.'"';
					if (isset($values['font-family'])) {
					if (stripslashes($values['font-family']) == $key) {
							echo ' selected="selected"';
					}
					} else {
						if($key == $value['default']['font-family']) {
								echo ' selected="selected"';
						}
					}
					echo '>'.$font.'</option>';
				}
				echo '</optgroup>';
			}
			if(is_array($fontface) && count($fontface)!=0){
				echo '<optgroup label="@font-face">';
				foreach ($fontface as $font=>$js){
					$key = 'fontface-'.$font.'-css-'.$js;
					echo '<option value="'.$key.'"';
					if (isset($values['font-family'])) {
					if (stripslashes($values['font-family']) == $key) {
							echo ' selected="selected"';
					}
					} else {
						if($key == $value['default']['font-family']) {
								echo ' selected="selected"';
						}
					}
					echo '>'.$font.'</option>';
				}
				echo '</optgroup>';
			}
			if(is_array($google) && count($google)!=0){
				echo '<optgroup label="Google Fonts">';
				foreach ($google as $font=>$js){
					$key = 'google-'.$font.'-css-'.$js;
					echo '<option value="'.$key.'"';
					if (isset($values['font-family'])) {
					if (stripslashes($values['font-family']) == $key) {
							echo ' selected="selected"';
					}
					} else {
						if($key == $value['default']['font-family']) {
								echo ' selected="selected"';
						}
					}
					echo '>'.$font.'</option>';
				}
				echo '</optgroup>';
			}
			echo '</select>';
			echo '</td></tr>';
			
		}
		
		if(isset($value['default']['font-size'])){
			echo '<tr>';
			echo '<td>' . __('Font Size', 'ultimatum') . '</td>';
			echo '<td>';
			echo '<input name="' . $value['id'] . '[font-size]" id="' . $value['id'] . '" type="text" size="2" value="';
			if (isset($values['font-size'])) {
				echo stripslashes($values['font-size']);
			} else {
				echo $value['default']['font-size'];
			}
			echo '" /> px';
			echo '</td></tr>';
		}
		if(isset($value['default']['line-height'])){
			echo '<tr>';
			echo '<td>' . __('Line Height', 'ultimatum') . '</td>';
			echo '<td>';
			echo '<input name="' . $value['id'] . '[line-height]" id="' . $value['id'] . '" type="text" size="2" value="';
			if (isset($values['font-size'])) {
				echo stripslashes($values['line-height']);
			} else {
				echo $value['default']['line-height'];
			}
			echo '" /> px';
			echo '</td></tr>';
		}
		echo '<tr>';
		echo '<td>' . __('Color', 'ultimatum') . '</td>';
				if (isset($values["color"])) {
					$the_value = ($values["color"]);
					$the_value = '#'.str_replace('#', '', $the_value);
				} else {
					$the_value = $value['default']["color"];
				}
		echo '<td>';
				echo '<div style="width:255px"><input type="text" name="'.$value['id'].'[color]" value="'.$the_value.'" class="ult-color-field" /></div>';
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>' . __('Font Weight', 'ultimatum') . '</td>';
		echo '<td>';
			echo '<select name="' . $value['id'] . '[font-weight]" id="' . $value['id'] . '">';
				$options = array ('inherit' => 'inherit','normal'=>__('Normal', 'ultimatum'),'bold'=>__("Bold", 'ultimatum'));
				foreach($options as $key => $option) {
					echo "<option value='" . $key . "'";
					if (isset($values['font-weight'])) {
						if (stripslashes($values['font-weight']) == $key) {
							echo ' selected="selected"';
						}
					} else if ($key == $value['default']['font-weight']) {
						echo ' selected="selected"';
					}
						echo '>' . $option . '</option>';
				}
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>' . __('Style', 'ultimatum') . '</td>';
		
		echo '<td>';
			echo '<select name="' . $value['id'] . '[font-style]" id="' . $value['id'] . '">';
				$options = array ('inherit' => 'inherit','normal'=>__('Normal', 'ultimatum'),'italic'=>__("Italic", 'ultimatum'));
				foreach($options as $key => $option) {
					echo "<option value='" . $key . "'";
					if (isset($values['font-style'])) {
						if (stripslashes($values['font-style']) == $key) {
							echo ' selected="selected"';
						}
					} else if ($key == $value['default']['font-style']) {
						echo ' selected="selected"';
					}
						echo '>' . $option . '</option>';
				}
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>' . __('Decoration', 'ultimatum') . '</td>';
		echo '<td>';
			echo '<select name="' . $value['id'] . '[text-decoration]" id="' . $value['id'] . '">';
				$options = array ('inherit' => 'inherit','none'=>'None','underline'=>__("Underline", 'ultimatum'),'overline'=>__("Overline", 'ultimatum'),'line-through'=>__("Line-Through", 'ultimatum'));
				foreach($options as $key => $option) {
					echo "<option value='" . $key . "'";
					if (isset($values['font-style'])) {
						if (stripslashes($values['text-decoration']) == $key) {
							echo ' selected="selected"';
						}
					} else if ($key == $value['default']['text-decoration']) {
						echo ' selected="selected"';
					}
						echo '>' . $option . '</option>';
				}
		echo '</td>';
		echo '</tr></table><br />';
	}
	
	function desc($value) {
		echo '<tr valign="top"><td scope="row" colspan="2">' . $value['desc'] . '</td></tr>';
	}
	
	function tabopen($value){
		echo '<div id="'.$value[id].'">';
	}
	function tabclose($value){
		echo '</div>';
	}
	function end($value) {
		echo '</tbody></table></div><br />';
	}
	function justSave(){
		echo '<p class="submit" style="text-align:right"><input type="submit" name="save_options" class="button button-primary" value="'.__('Save Changes', 'ultimatum').'" /></p>';
	}
	function endnosave($value) {
		echo '</tbody></table></div><br />';
	}
	/**
	 * displays a text input
	 */
	function text($value) {
		$size = isset($value['size']) ? $value['size'] : '10';
		
		echo '<tr valign="top"><td scope="row"><strong><label for="'.$value['id'].'">' . $value['name'] . '</label></strong></td><td>';
		
		echo '<input name="' . $value['id'] . '" id="' . $value['id'] . '" type="text" size="' . $size . '" value="';
		if (isset($this->saved_options[$value['id']])) {
			echo stripslashes($this->saved_options[$value['id']]);
		} else {
			echo $value['default'];
		}
		echo '" />';
		echo '</td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '</td></tr>';
	}
	/**
	 * displays a text inputCSS
	 */
	function textCSS($value) {
		$size = isset($value['size']) ? $value['size'] : '10';
		
		echo '<tr valign="top"><td scope="row"><strong><label for="'.$value['id'].'-'.$value['property'].'">' . $value['name'] . '</label></strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<input name="' . $value['id'].'['.$value['property'].']" id="' . $value['id'] . '-'.$value['property'].'" type="text" size="' . $size . '" value="';
		$values=$this->saved_options[$value["id"]];
		if (isset($values[$value['property']])) {
			echo stripslashes($values[$value['property']]);
		
		} else {
			echo $value['default'];
		}
		echo '" />px<br />';
		echo '</td></tr>';
	}
	/**
	 * displays a textarea
	 */
	function textarea($value) {
		$rows = isset($value['rows']) ? $value['rows'] : '5';
		
		echo '<tr valign="top"><td scope="row"><strong><label for="'.$value['id'].'">' . $value['name'] . '</label></strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<textarea id="'.$value['id'].'" rows="' . $rows . '" name="' . $value['id'] . '" type="' . $value['type'] . '" style="width:100%">';
		if (isset($this->saved_options[$value['id']])) {
			echo stripslashes($this->saved_options[$value['id']]);
		} else {
			echo $value['default'];
		}
		echo '</textarea><br />';
		echo '</td></tr>';
	}
	
	/**
	 * displays a select
	 */
	function select($value) {
		if (isset($value['target'])) {
			if (isset($value['options'])) {
				$value['options'] = $value['options'] + $this->get_select_target_options($value['target']);
			} else {
				$value['options'] = $this->get_select_target_options($value['target']);
			}
		}
		echo '<tr valign="top"><td scope="row"><strong><label for="'.$value['id'].'">' . $value['name'] . '</label></strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<select name="' . $value['id'] . '" id="' . $value['id'] . '">';
		
		if(isset($value['prompt'])){
			echo '<option value="">'.$value['prompt'].'</option>';
		}
		if (isset($value['options'])) {
			foreach($value['options'] as $key => $option) {
				echo "<option value='" . $key . "'";
				if (isset($this->saved_options[$value['id']])) {
					if (stripslashes($this->saved_options[$value['id']]) == $key) {
						echo ' selected="selected"';
					}
				} else if ($key == $value['default']) {
					echo ' selected="selected"';
				}
			
				echo '>' . $option . '</option>';
			}
		}
		echo '</select></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '</td></tr>';
	}	
	function selectCSS($value) {
		
		if (isset($value['target'])) {
			if (isset($value['options'])) {
				$value['options'] = $value['options'] + $this->get_select_target_options($value['target']);
			} else {
				$value['options'] = $this->get_select_target_options($value['target']);
			}
		}
		echo '<tr valign="top"><td scope="row"><strong><label for="'.$value['id'].'">' . $value['name'] . '</label></strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<select name="' . $value['id'] . '['.$value['property'].']" id="' . $value['id'] . '">';
		
		if(isset($value['prompt'])){
			echo '<option value="">'.$value['prompt'].'</option>';
		}
		$values=$this->saved_options[$value["id"]];
		if (isset($values[$value['property']])) {
			$the_value = stripslashes($values[$value['property']]);
		}
		if (isset($value['options'])) {
			foreach($value['options'] as $key => $option) {
				echo "<option value='" . $key . "'";
				if (isset($the_value)) {
					if ($the_value == $key) {
						echo ' selected="selected"';
					}
				} else if ($key == $value['default']) {
					echo ' selected="selected"';
				}
			
				echo '>' . $option . '</option>';
			}
		}
		echo '</select><br />';
		echo '</td></tr>';
	}
	
	/**
	 * displays a multiselect
	 */
	function multiselect($value) {
		$size = isset($value['size']) ? $value['size'] : '5';
		if (isset($value['target'])) {
			if (isset($value['options'])) {
				$value['options'] = $value['options'] + $this->get_select_target_options($value['target']);
			} else {
				$value['options'] = $this->get_select_target_options($value['target']);
			}
		}
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<select name="' . $value['id'] . '[]" id="' . $value['id'] . '" multiple="multiple" size="' . $size . '" style="height:auto">';
		
		if(!empty($value['options']) && is_array($value['options'])){
			foreach($value['options'] as $key => $option) {
				echo '<option value="' . $key . '"';
				if (isset($this->saved_options[$value['id']])) {
					if (is_array($this->saved_options[$value['id']])) {
						if (in_array($key, $this->saved_options[$value['id']])) {
							echo ' selected="selected"';
						}
					}
				} else if (in_array($key, $value['default'])) {
					echo ' selected="selected"';
				}
				echo '>' . $option . '</option>';
			}
		}
		
		echo '</select><br />';
		echo '</td></tr>';
	}
	/**
	 * displays a site select in MS
	 */
	function siteselect($value) {
		$size = isset($value['size']) ? $value['size'] : '10';
		if (isset($value['target'])) {
			if (isset($value['options'])) {
				$value['options'] = $value['options'] + $this->get_select_target_options($value['target']);
			} else {
				$value['options'] = $this->get_select_target_options($value['target']);
			}
		}
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		
		echo '<select name="' . $value['id'] . '[]" id="' . $value['id'] . '" multiple="multiple" size="' . $size . '" style="height:auto">';
	
		$blog_list = get_blog_list( 0, 'all' );
		foreach ($blog_list AS $blog) {
				echo '<option value="' . $blog['blog_id'] . '"';
				if (isset($this->saved_options[$value['id']])) {
					if (is_array($this->saved_options[$value['id']])) {
						if (in_array($blog['blog_id'], $this->saved_options[$value['id']])) {
							echo ' selected="selected"';
						}
					}
				} 
				echo '>' . $blog['domain'].$blog['path'] . '</option>';
			}
	
		echo '</select><br /></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '</td></tr>';
	}
	/**
	 * displays a user selection
	 */
	function userselect($value) {
		$size = isset($value['size']) ? $value['size'] : '5';
		if (isset($value['target'])) {
			if (isset($value['options'])) {
				$value['options'] = $value['options'] + $this->get_select_target_options($value['target']);
			} else {
				$value['options'] = $this->get_select_target_options($value['target']);
			}
		}
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<select name="' . $value['id'] . '[]" id="' . $value['id'] . '" multiple="multiple" size="' . $size . '" style="height:auto">';
		$roles = array('administrator', 'editor', 'author', 'contributor');
		
		/* Loop through users to search for the admin and editor users. */
		foreach( $roles as $role )
		{
			global $wpdb;
				$this_role = "'[[:<:]]".$role."[[:>:]]'";
				$query = "SELECT * FROM $wpdb->users WHERE ID = ANY (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value RLIKE $this_role) ORDER BY user_nicename ASC LIMIT 10000";
				$users_of_this_role = $wpdb->get_results($query);
				if ($users_of_this_role)
				{
					foreach($users_of_this_role as $user)
					{
						$curuser = get_userdata($user->ID);
						echo '<option value="' . $curuser->ID . '"';
						if (isset($this->saved_options[$value['id']])) {
							if (is_array($this->saved_options[$value['id']])) {
								if (in_array($curuser->ID, $this->saved_options[$value['id']])) {
									echo ' selected="selected"';
								}
							}
						}
						echo '>' . $curuser->user_nicename . '</option>';
					}
					}
			}
		
		echo '</select><br />';
		
		echo '</td></tr>';
	}

	/**
	 * displays a checkbox
	 */
	function checkbox($value) {
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		$i = 0;
		foreach($value['options'] as $key => $option) {
			$i++;
			$checked = '';
			if (isset($this->saved_options[$value['id']])) {
				if (is_array($this->saved_options[$value['id']])) {
					if (in_array($key, $this->saved_options[$value['id']])) {
						$checked = ' checked="checked"';
					}
				}
			} else if (in_array($key, $value['default'])) {
				$checked = ' checked="checked"';
			}
			
			echo '<input type="checkbox" id="' . $value['id'] . '_' . $i . '" name="' . $value['id'] . '[]" value="' . $key . '" ' . $checked . ' />';
			echo '<label for="' . $value['id'] . '_' . $i . '">' . $option . '</label><br />';
		}
		echo '</td></tr>';
	}
	
	/**
	 * displays checkboxs
	 */
	function checkboxs($value) {
		$size = isset($value['size']) ? $value['size'] : '5';
		if (isset($value['target'])) {
			if (isset($value['options'])) {
				$value['options'] = $value['options'] + $this->get_select_target_options($value['target']);
			} else {
				$value['options'] = $this->get_select_target_options($value['target']);
			}
		}
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		
		if(!empty($value['options']) && is_array($value['options'])){
			foreach($value['options'] as $key => $option) {
				echo '<label><input type="checkbox" value="' . $key . '" name="' . $value['id'] . '[]"';
				if (isset($this->saved_options[$value['id']])) {
					if (is_array($this->saved_options[$value['id']])) {
						if (in_array($key, $this->saved_options[$value['id']])) {
							echo ' checked="checked"';
						}
					}
				} else if (in_array($key, $value['default'])) {
					echo ' checked="checked"';
				}
				echo '>' . $option . '</label><br/>';
			}
		}
		
		echo '</td></tr>';
	}
	
	/**
	 * displays a radio
	 */
	function radio($value) {
		
		if (isset($this->saved_options[$value['id']])) {
			$checked_key = $this->saved_options[$value['id']];
		} else {
			$checked_key = $value['default'];
		}
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		$i = 0;
		foreach($value['options'] as $key => $option) {
			$i++;
			$checked = '';
			if ($key == $checked_key) {
				$checked = ' checked="checked"';
			}
			
			echo '<input type="radio" id="' . $value['id'] . '_' . $i . '" name="' . $value['id'] . '" value="' . $key . '" ' . $checked . ' />';
			echo '<label for="' . $value['id'] . '_' . $i . '">' . $option . '</label><br />';
		}
		
		echo '</td></tr>';
	}
	
	/**
	 * displays a upload field
	 */
	function upload($value) {
		
		$size = isset($value['size']) ? $value['size'] : '50';
		$button = isset($value['button']) ? $value['button'] : 'Insert Image';
		if (isset($this->saved_options[$value['id']])) {
			$value['default'] = stripslashes($this->saved_options[$value['id']]);
		}
		echo '<tr valign="top"><td width="200"><strong>' . $value['name'] . '</strong></td><td><table><tr valign="top"><td style="border:none">';
		
		
		echo '<input type="text" id="' . $value['id'] . '-bgi" name="' . $value['id'] .'" size="' . $size . '"  value="';
		echo $value['default'];
		echo '" /><br /><div class="option-upload-buttons"><a class="button option-upload-button" data-id="' . $value['id'] . '-bgi" href="#">'.$button.'</a></div>';
		echo '</td><td style="border:none">';
		echo '<div id="' . $value['id'] . '_preview">';
		if (! empty($value['default'])) {
			echo '<a class="thickbox" href="' . $value['default'] . '" target="_blank"><img src="' . $value['default'] . '" width="150" /></a>';
		}
		echo '</div>';
		echo '</td></tr></table>';
		echo '</td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '</td></tr>';
	}
	
	
	function uploadCSS($value) {
		$size = isset($value['size']) ? $value['size'] : '50';
		$button = isset($value['button']) ? $value['button'] : 'Insert Image';
		$values=$this->saved_options[$value["id"]];
		if (isset($values[$value['property']])) {
			$value['default'] = stripslashes($values[$value['property']]);
			$value['color'] = stripslashes($values['background-color']);
		}
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td><table><tr valign="top"><td style="border:none">';
		
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<input type="text" id="' . $value['id'] . '-bgi" name="' . $value['id'] . '['.$value["property"].']" size="' . $size . '"  value="';
		echo $value['default'];
		echo '" /><br /><div class="option-upload-buttons"><a class="button option-upload-button" data-id="' . $value['id'] . '-bgi" href="#">'.$button.'</a></div><br />';
		
		echo '</td><td style="border:none">';
		echo '<div id="' . $value['id'] . '_preview"'; 
		if(! empty($value['color'])){
			
			echo ' style="background-color:#'.$value['color'].'" ';
		}
		echo '>';
		if (! empty($value['default'])) {
			echo '<div style="width:150px;height:150px;background-image:url(' . $value['default'] . ');"></div>';
		}
		echo '</div>';
		echo '</td></tr></table>';
		echo '</td></tr>';
	}
	/**
	 * displays a range input
	 */
	function range($value) {
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<div class="range-input-wrap"><input name="' . $value['id'] . '" id="' . $value['id'] . '" type="range" value="';
		if (isset($this->saved_options[$value['id']])) {
			echo stripslashes($this->saved_options[$value['id']]);
		} else {
			echo $value['default'];
		}
		if (isset($value['min'])) {
			echo '" min="' . $value['min'];
		}
		if (isset($value['max'])) {
			echo '" max="' . $value['max'];
		}
		if (isset($value['step'])) {
			echo '" step="' . $value['step'];
		}
		echo '" />';
		if (isset($value['unit'])) {
			echo '<span>' . $value['unit'] . '</span>';
		}
		echo '</div></td></tr>';
	}
	
	/**
	 * displays a color input
	 */
	function color($value) {
		echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		$values=$this->saved_options[$value["id"]];
		if (isset($values[$value['property']])) {
			$the_value = stripslashes($values[$value['property']]);
		}
		if (isset($the_value)) {
			$the_value = $the_value;
		} else {
			$the_value = $value['default'];
		}
		
		echo '<input type="text" name="'.$value['id'].'['.$value['property'].']" value="'.$the_value.'" class="ult-color-field" />';
		echo '</td></tr>';
	}
	
	/**
	 * displays a toggle checkbox
	 */
	function toggle($value) {
		$checked = '';
		if (isset($this->saved_options[$value['id']])) {
			if ($this->saved_options[$value['id']] == true) {
				$checked = 'checked="checked"';
			}
		} elseif ($value['default'] == true) {
			$checked = 'checked="checked"';
		}
		
		echo '<tr><td width="230"><strong>' . $value['name'] . '</strong></td>';
		echo '<td width="82"><div class="make-switch switch-small" data-on="success" data-off="warning"><input type="checkbox"  name="' . $value['id'] . '" id="' . $value['id'] . '" value="true" ' . $checked . ' /></div></td>';
		echo '<td>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '</td></tr>';
	}
	

	
	
	
	/**
	 * displays a custom field
	 */
	function custom($value) {
		if (isset($this->saved_options[$value['id']])) {
			$default = $this->saved_options[$value['id']];
		} else {
			$default = $value['default'];
		}
		if(isset($value['layout']) && $value['layout']==false){
			if (isset($value['function']) && function_exists($value['function'])) {
				$value['function']($value, $default);
			} else {
				echo $value['html'];
			}
		}else{
			echo '<tr valign="top"><td scope="row"><strong>' . $value['name'] . '</strong></td><td>';
			if(isset($value['desc'])){
				echo '<p class="description">' . $value['desc'] . '</p>';
			}
			if (isset($value['function']) && function_exists($value['function'])) {
				$value['function']($value, $default);
			} else {
				echo $value['html'];
			}
			echo '</td></tr>';
		}
	}
	


}
