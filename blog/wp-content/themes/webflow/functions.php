<?php
/*
 * Simple Child Theme genearted by Ultimatum Framework
*/
$theme = array(		
		'theme_name' => 'Webflow',
		'theme_slug' =>'webflow',
);
require_once( get_template_directory() . '/wonderfoundry/wonderworks.php' );



// Include Webflow CSS

function addGlobalDep() {
    
 $abspath = get_stylesheet_directory();
 $relpath = get_stylesheet_directory_uri();
 
 //add normalize.css
 $normalize = '/css/normalize.css';
 
 if(file_exists($abspath.$normalize)){
     wp_enqueue_style('child-normalize-style',$relpath.$normalize);
 }
 
 //add webflow.css
 $webflow = '/css/webflow.css';
 
 if(file_exists($abspath.$webflow)){
     wp_enqueue_style('child-webflow-style',$relpath.$webflow);
 }
 
 //add madkudu.webflow.css
 $madkudu = '/css/madkudu.webflow.css';
 
 if(file_exists($abspath.$madkudu)){
     wp_enqueue_style('child-madkudu-webflow-style',$relpath.$madkudu);
 }
 
}
add_action('wp_enqueue_scripts','addGlobalDep',99);



// Include Master CSS

function addMasterDep() {
    
 $abspath = get_stylesheet_directory();
 $relpath = get_stylesheet_directory_uri();
 
 //add master.css
 $master = '/css/master.css';
 
 if(file_exists($abspath.$master)){
     wp_enqueue_style('child-master-style',$relpath.$master);
 }
 
}
add_action('wp_enqueue_scripts','addMasterDep',99);
