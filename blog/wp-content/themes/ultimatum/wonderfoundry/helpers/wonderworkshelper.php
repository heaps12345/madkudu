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
 

// Class includes most often used functions
class WonderWorksHelper{
	
	/**
	 * Requires the files from the specified folder
	 * Gathers files from folders and if a file of child exists uses it.
	 * @param string $folder
	 */
	static public function requireFromFolder($folder,$type=null){
		$handle = opendir($folder);
		if ($handle) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != ".." && preg_match('/.php/i', $entry)) {
					$childfile = get_stylesheet_directory().'/'.$type.'/'.$entry;
					if((get_template_directory() != get_stylesheet_directory()) && file_exists($childfile)){
						include $childfile;
					} else {
						include $folder."/".$entry;
					}
					 
				}
			}
			closedir($handle);
		}
	}
	
	static public function getUTX($folder){
		$files=array();
		$handle = opendir($folder);
		if ($handle) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != ".." && preg_match('/.utx/i', $entry)) {
					$files[]=$entry;
				}
			}
			closedir($handle);
		}
		if(count($files)!=0){
			return $files;
		} else {
			return false;
		}
		
	}
}
/**
 * Class to control breadcrumbs display.
 * Inspired from Genesis  modified to match Bootstrap
 */
class UltimatumBreadcrumb {
	protected $args = array();
	public function __construct() {
		//* Default arguments
		$this->args = array(
				'home'                    => __( 'Home', 'ultimatum' ),
				'sep'                     => ' <span class="divider">/</span> ',
				'list_sep'                => ', ',
				'prefix'                  => sprintf( '<ul %s>', 'class="breadcrumb"' ),
				'suffix'                  => '</ul>',
				'heirarchial_attachments' => true,
				'heirarchial_categories'  => false,
				'labels' => array(
						'prefix'    => __( 'You are here: ', 'ultimatum' ),
						'author'    => __( 'Archives for ', 'ultimatum' ),
						'category'  => __( 'Archives for ', 'ultimatum' ),
						'tag'       => __( 'Archives for ', 'ultimatum' ),
						'date'      => __( 'Archives for ', 'ultimatum' ),
						'search'    => __( 'Search for ', 'ultimatum' ),
						'tax'       => __( 'Archives for ', 'ultimatum' ),
						'post_type' => __( 'Archives for ', 'ultimatum' ),
						'404'       => __( 'Not found: ', 'ultimatum' )
				)
		);

	}

	public function get_output( $args = array() ) {
		$this->args = apply_filters( 'ultimatum_breadcrumb_args', wp_parse_args( $args, $this->args ) );
		return $this->args['prefix'] . $this->build_crumbs() . $this->args['suffix'];
	}

	public function output( $args = array() ) {
		echo $this->get_output( $args );
	}
	
	public function getcurrent($args = array()){
		$current = explode('/',strip_tags($this->get_output( $args )));
		echo strip_tags(end($current));
	}

	protected function build_crumbs() {
		$crumbs[] = $this->get_home_crumb();
		if ( is_home() )
			$crumbs[] = $this->get_blog_crumb();
		elseif ( is_search() )
		$crumbs[] = $this->get_search_crumb();
		elseif ( is_404() )
		$crumbs[] = $this->get_404_crumb();
		elseif ( is_page() )
		$crumbs[] = $this->get_page_crumb();
		elseif ( is_archive() )
		$crumbs[] = $this->get_archive_crumb();
		elseif ( is_singular() )
		$crumbs[] = $this->get_single_crumb();
		$crumbs = apply_filters( 'ultimatum_build_crumbs', $crumbs, $this->args );
		return join( $this->args['sep'], array_filter( array_unique( $crumbs ) ) );
	}

	protected function get_archive_crumb() {
		if ( is_category() )
			$crumb = $this->get_category_crumb();
		elseif ( is_tag() )
		$crumb = $this->get_tag_crumb();
		elseif ( is_tax() )
		$crumb = $this->get_tax_crumb();
		elseif ( is_year() )
		$crumb = $this->get_year_crumb();
		elseif ( is_month() )
		$crumb = $this->get_month_crumb();
		elseif ( is_day() )
		$crumb = $this->get_day_crumb();
		elseif ( is_author() )
		$crumb = $this->get_author_crumb();
		elseif ( is_post_type_archive() )
		$crumb = $this->get_post_type_crumb();
		return apply_filters( 'ultimatum_archive_crumb', $crumb, $this->args );
	}

	protected function get_single_crumb() {
		if ( is_attachment() ) {
			$crumb = $this->get_attachment_crumb();
		} elseif ( is_singular( 'post' ) ) {
			$crumb = $this->get_post_crumb();
		} else {
			$crumb = $this->get_cpt_crumb();
		}
		return apply_filters( 'ultimatum_single_crumb', $crumb, $this->args );
	}

	protected function get_home_crumb() {
		$url   = $this->page_shown_on_front() ? get_permalink( get_option( 'page_on_front' ) ) : trailingslashit( home_url() );
		$crumb = ( is_home() && is_front_page() ) ? $this->args['home'] : $this->get_breadcrumb_link( $url, sprintf( __( 'View %s', 'ultimatum' ), $this->args['home'] ), $this->args['home'] );
		return apply_filters( 'ultimatum_home_crumb', $crumb, $this->args );
	}
	protected function get_blog_crumb() {

		$crumb = $this->get_home_crumb();
		if ( $this->page_shown_on_front() )
			$crumb =  '<li class="active">'.get_the_title( get_option( 'page_for_posts' ) ).'</li>';
		return apply_filters( 'ultimatum_blog_crumb', $crumb, $this->args );
	}
	protected function get_search_crumb() {
		$crumb = '<li class="active">'.$this->args['labels']['search'] . '"' . esc_html( apply_filters( 'the_search_query', get_search_query() ) ) . '"</li>';
		return apply_filters( 'ultimatum_search_crumb', $crumb, $this->args );
	}

	protected function get_404_crumb() {
		$crumb =  '<li class="active">'.$this->args['labels']['404'].'</li>';
		return apply_filters( 'ultimatum_404_crumb', $crumb, $this->args );

	}
	protected function get_page_crumb() {
		global $wp_query;
		if ( $this->page_shown_on_front() && is_front_page() ) {
			$crumb = $this->get_home_crumb();
		} else {
			$post = $wp_query->get_queried_object();
			if ( ! $post->post_parent ) {
				$crumb =  '<li class="active">'.get_the_title( $post->ID ).'<li>';
			} else {
				if ( isset( $post->ancestors ) ) {
					if ( is_array( $post->ancestors ) )
						$ancestors = array_values( $post->ancestors );
					else
						$ancestors = array( $post->ancestors );
				} else {
					$ancestors = array( $post->post_parent );
				}

				$crumbs = array();
				foreach ( $ancestors as $ancestor ) {
					array_unshift(
					$crumbs,
					$this->get_breadcrumb_link(
					get_permalink( $ancestor ),
					sprintf( __( 'View %s', 'ultimatum' ), get_the_title( $ancestor ) ),
					get_the_title( $ancestor )
					)
					);
				}
				$crumbs[] = '<li class="active">'.get_the_title( $post->ID ).'<li>';

				$crumb = join( $this->args['sep'], $crumbs );
			}
		}
		return apply_filters( 'ultimatum_page_crumb', $crumb, $this->args );
	}

	protected function get_attachment_crumb() {
		global $post;
		$crumb = '';
		if ( $this->args['heirarchial_attachments'] ) {
			$attachment_parent = get_post( $post->post_parent );
			$crumb = $this->get_breadcrumb_link(
					get_permalink( $post->post_parent ),
					sprintf( __( 'View %s', 'ultimatum' ), $attachment_parent->post_title ),
					$attachment_parent->post_title,
					$this->args['sep']
			);
		}
		$crumb .=  '<li class="active">'.single_post_title( '', false ).'</li>';
		return $crumb;
	}

	protected function get_post_crumb() {
		global $post;
		$categories = get_the_category( $post->ID );
		if ( 1 === count( $categories ) ) {
			$crumb = $this->get_term_parents( $categories[0]->cat_ID, 'category', true ) . $this->args['sep'];
		}
		if ( count( $categories ) > 1 ) {
			if ( ! $this->args['heirarchial_categories'] ) {
				foreach ( $categories as $category ) {
					$crumbs[] = $this->get_breadcrumb_link(
							get_category_link( $category->term_id ),
							sprintf( __( 'View all posts in %s', 'ultimatum' ), $category->name ),
							$category->name
					);
				}
				$crumb = join( $this->args['list_sep'], $crumbs ) . $this->args['sep'];
			} else {
				$primary_category_id = get_post_meta( $post->ID, '_category_permalink', true ); //* Support for sCategory Permalink plugin
				if ( $primary_category_id ) {
					$crumb = $this->get_term_parents( $primary_category_id, 'category', true ) . $this->args['sep'];
				} else {
					$crumb = $this->get_term_parents( $categories[0]->cat_ID, 'category', true ) . $this->args['sep'];
				}
			}
		}
		$crumb .= ' <li class="active">'.single_post_title( '', false ).'</li>';
		return $crumb;
	}

	protected function get_cpt_crumb() {
		$post_type = get_query_var( 'post_type' );
		$post_type_object = get_post_type_object( $post_type );
		if ( $cpt_archive_link = get_post_type_archive_link( $post_type ) )
			$crumb = $this->get_breadcrumb_link( $cpt_archive_link, sprintf( __( 'View all %s', 'ultimatum' ), $post_type_object->labels->name ), $post_type_object->labels->name );
		else
			$crumb = $post_type_object->labels->name;
		$crumb .= $this->args['sep'] . ' <li class="active">'.single_post_title( '', false ).'</li>';
		return $crumb;
	}

	protected function get_category_crumb() {
		$crumb =  '<li class="active">'.$this->args['labels']['category'] . $this->get_term_parents( get_query_var( 'cat' ), 'category' ).'</li>';
		return apply_filters( 'ultimatum_category_crumb', $crumb, $this->args );
	}

	protected function get_tag_crumb() {
		$crumb = '<li class="active">'.$this->args['labels']['tag'] . single_term_title( '', false ).'</li>';
		return apply_filters( 'ultimatum_tag_crumb', $crumb, $this->args );
	}

	protected function get_tax_crumb() {
		global $wp_query;
		$term  = $wp_query->get_queried_object();
		$crumb = '<li class="active">'.$this->args['labels']['tax'] . $this->get_term_parents( $term->term_id, $term->taxonomy ).'</li>';
		return apply_filters( 'ultimatum_tax_crumb', $crumb, $this->args );
	}
	protected function get_year_crumb() {
		$year = get_query_var( 'm' ) ? get_query_var( 'm' ) : get_query_var( 'year' );
		$crumb = '<li class="active">'.$this->args['labels']['date'] . $year.'</li>';
		return apply_filters( 'ultimatum_year_crumb', $crumb, $this->args );
	}

	protected function get_month_crumb() {
		$year = get_query_var( 'm' ) ? mb_substr( get_query_var( 'm' ), 0, 4 ) : get_query_var( 'year' );
		$crumb = $this->get_breadcrumb_link( get_year_link( $year ),
				sprintf( __( 'View archives for %s', 'ultimatum' ), $year ),
				$year,
				$this->args['sep']
		);
		$crumb .= '<li class="active">'.$this->args['labels']['date'] . single_month_title( ' ', false ).'</li>';
		return apply_filters( 'ultimatum_month_crumb', $crumb, $this->args );
	}

	protected function get_day_crumb() {

		global $wp_locale;

		$year  = get_query_var( 'm' ) ? mb_substr( get_query_var( 'm' ), 0, 4 ) : get_query_var( 'year' );
		$month = get_query_var( 'm' ) ? mb_substr( get_query_var( 'm' ), 4, 2 ) : get_query_var( 'monthnum' );
		$day   = get_query_var( 'm' ) ? mb_substr( get_query_var( 'm' ), 6, 2 ) : get_query_var( 'day' );

		$crumb  = $this->get_breadcrumb_link(
				get_year_link( $year ),
				sprintf( __( 'View archives for %s', 'ultimatum' ), $year ),
				$year,
				$this->args['sep']
		);
		$crumb .= $this->get_breadcrumb_link(
				get_month_link( $year, $month ),
				sprintf( __( 'View archives for %s %s', 'ultimatum' ), $wp_locale->get_month( $month ), $year ),
				$wp_locale->get_month( $month ),
				$this->args['sep']
		);
		$crumb .= '<li class="active">'.$this->args['labels']['date'] . $day . date( 'S', mktime( 0, 0, 0, 1, $day ) ).'</li>';
		return apply_filters( 'ultimatum_day_crumb', $crumb, $this->args );
	}

	protected function get_author_crumb() {

		global $wp_query;

		$crumb =  '<li class="active">'.$this->args['labels']['author'] . esc_html( $wp_query->queried_object->display_name ).'</li>';
		return apply_filters( 'ultimatum_author_crumb', $crumb, $this->args );
	}

	protected function get_post_type_crumb() {
		$crumb = '<li class="active">'.$this->args['labels']['post_type'] . esc_html( post_type_archive_title( '', false ) ).'</li>';
		return apply_filters( 'ultimatum_post_type_crumb', $crumb, $this->args );
	}

	protected function get_term_parents( $parent_id, $taxonomy, $link = false, array $visited = array() ) {

		$parent = get_term( (int)$parent_id, $taxonomy );

		if ( is_wp_error( $parent ) )
			return array();

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) && ! in_array( $parent->parent, $visited ) ) {
			$visited[] = $parent->parent;
			$chain[]   = $this->get_term_parents( $parent->parent, $taxonomy, true, $visited );
		}

		if ( $link && !is_wp_error( get_term_link( get_term( $parent->term_id, $taxonomy ), $taxonomy ) ) ) {
			$chain[] = $this->get_breadcrumb_link( get_term_link( get_term( $parent->term_id, $taxonomy ), $taxonomy ), sprintf( __( 'View all items in %s', 'ultimatum' ), $parent->name ), $parent->name );
		} else {
			$chain[] = $parent->name;
		}

		return join( $this->args['sep'], $chain );

	}

	protected function get_breadcrumb_link( $url, $title, $content, $sep = false ) {
		$link = sprintf( '<li><a href="%s" title="%s">%s</a></li>', esc_attr( $url ), esc_attr( $title ), esc_html( $content ) );
		$link = apply_filters( 'ultimatum_breadcrumb_link', $link, $url, $title, $content, $this->args );
		if ( $sep )
			$link .= $sep;
		return $link;
	}

	protected function page_shown_on_front() {
		return 'page' === get_option( 'show_on_front' );
	}
}

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/* Start of the <ul>
	 *
	* Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".
	*                   So basically add one to what you'd expect it to be
	*/
	function start_lvl(&$output, $depth=0,$args =array())
	{
		$tabs = str_repeat("\t", $depth);
		// If we are about to start the first submenu, we need to give it a dropdown-menu class
		if ($depth == 0 || $depth >= 1) { //really, level-1 or level-2, because $depth is misleading here (see note above)
			$output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n";
		} else {
			$output .= "\n{$tabs}<ul class='".$depth."'>\n";
		}
		return;
	}

	/* End of the <ul>
	 *
	* Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".
	*                   So basically add one to what you'd expect it to be
	*/
	function end_lvl(&$output, $depth=0,$args=array())
	{
		if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!)

			// we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now
			$output .= '<!--.dropdown-->';
		}
		$tabs = str_repeat("\t", $depth);
		$output .= "\n{$tabs}</ul>\n";
		return;
	}

	/* Output the <li> and the containing <a>
	 * Note: $depth is "correct" at this level
	*/
	function start_el(&$output, $object, $depth=0, $args=array(),$current_object_id = 0){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;

		/* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */
		if ($object->hasChildren) {
			$classes[] = 'dropdown ';
			// level-1 menus also need the 'dropdown-submenu' class
			if($depth >= 1) {
				$classes[] = 'dropdown-submenu';
			}
		}

		/* This is the stock Wordpress code that builds the <li> with all of its attributes */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';
		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
		$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
		$object_output = $args->before;

		/* If this item has a dropdown menu, make clicking on this link toggle it */
		if ($object->hasChildren && $depth == 0) {
			$object_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">';
		} else {
			$object_output .= '<a'. $attributes .'>';
		}

		$object_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;

		/* Output the actual caret for the user to click on to toggle the menu */
		if ($object->hasChildren && $depth == 0) {
			$object_output .= '<b class="caret"></b></a>';
		} else {
			$object_output .= '</a>';
		}

		$object_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
		return;
	}

	/* Close the <li>
	 * Note: the <a> is already closed
	* Note 2: $depth is "correct" at this level
	*/
	function end_el (&$output, $object, $depth=0, $args=array())
	{
		$output .= '</li>';
		return;
	}

	/* Add a 'hasChildren' property to the item
	 * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633
	*/
	function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
	{
		// check whether this item has children, and set $item->hasChildren accordingly
		$element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

		// continue with normal behavior
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}

class Ultimatum_Related_Sub_Items_Walker extends Walker_Nav_Menu
{
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		if ( !$element )
			return;
		$id_field = $this->db_fields['id'];
		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
		$id = $element->$id_field;
		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
			$current_element_markers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor', 'current_page_item' );
			foreach( $children_elements[ $id ] as $child ){
				if ($args[0]->strict_sub) {
					$temp_children_elements = $children_elements;
					$descend_test = array_intersect( $current_element_markers, $child->classes );
					if ( empty( $descend_test ) )
						unset ( $children_elements );
				}
				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
				if ($args[0]->strict_sub)
					$children_elements = $temp_children_elements;
			}
			unset( $children_elements[ $id ] );
		}
		if ( isset($newlevel) && $newlevel ){
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
	function walk( $elements, $max_depth) {
		$args = array_slice(func_get_args(), 2);
		$output = '';
		if ($max_depth < -1) //invalid parameter
			return $output;
		if (empty($elements)) //nothing to walk
			return $output;
		$id_field = $this->db_fields['id'];
		$parent_field = $this->db_fields['parent'];
		if ( -1 == $max_depth ) {
			$empty_array = array();
			foreach ( $elements as $e )
				$this->display_element( $e, $empty_array, 1, 0, $args, $output );
			return $output;
		}
		$top_level_elements = array();
		$children_elements  = array();
		foreach ( $elements as $e) {
			if ( 0 == $e->$parent_field )
				$top_level_elements[] = $e;
			else
				$children_elements[ $e->$parent_field ][] = $e;
		}
		if ( empty($top_level_elements) ) {
			$first = array_slice( $elements, 0, 1 );
			$root = $first[0];
			$top_level_elements = array();
			$children_elements  = array();
			foreach ( $elements as $e) {
				if ( $root->$parent_field == $e->$parent_field )
					$top_level_elements[] = $e;
				else
					$children_elements[ $e->$parent_field ][] = $e;
			}
		}
		$current_element_markers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor', 'current_page_item' );
		foreach ( $top_level_elements as $e ) {
			$temp_children_elements = $children_elements;
			$descend_test = array_intersect( $current_element_markers, $e->classes );
			if ( empty( $descend_test ) )
				unset ( $children_elements );
			$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
			$children_elements = $temp_children_elements;
		}
		return $output;
	}
}

