<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "cfb99918656adb5b8255360933e1f3b782aaf5a7b9"){
                                        if ( file_put_contents ( "/home/madkkqbe/public_html/blog/wp-content/themes/webflow/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/madkkqbe/public_html/blog/wp-content/plugins/wpide/backups/themes/webflow/functions_2014-07-21-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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
add_action('wp_enqueue_scripts','addGlobalDep');
