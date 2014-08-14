<?php
$options = array(
		array(
				"name" => __("Post Elements", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Backgrounds,Borders and Padding", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Archive Page Title Padding Left", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar11",
				"property" =>"padding-left",
				"default" => "0",
				"type" => "textCSS"
		),
		array(
				"name" => __("Archive Page Title Background Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar11",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Archive Page Title Background Image", 'ultimatum'),
				"desc" =>__( "Paste the full URL (include http://) of image here or you can insert the image through the button. To remove image just delete the text in field.", 'ultimatum'),
				"id" => "cssvar11",
				"property" => "background-image",
				"default" => "",
				"type" => "uploadCSS"
		),
		array(
				"name" => __("Archive Page Title Background Image Location", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar11",
				"property" => "background-position",
				"default" => "top left",
				"options" => array("top left"=>__('Top Left', 'ultimatum'),
						"top right"=>__('Top Right', 'ultimatum'),
						"top center"=>__('Top Center', 'ultimatum'),
						"bottom left"=>__('Bottom Left', 'ultimatum'),
						"bottom right"=>__('Bottom Right', 'ultimatum'),
						"bottom center"=>__('Bottom Center', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Archive Page Title Background Image Repeat", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar11",
				"property" => "background-repeat",
				"default" => "repeat",
				"options" => array("repeat"=>__('Repeat', 'ultimatum'),
						"repeat-x"=>__('Repeat Horizontal', 'ultimatum'),
						"repeat-y"=>__('Repeat Vertical', 'ultimatum'),
						"no-repeat"=>__('Do not Repeat', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Archive Page Title Border ", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar12",
				"property" =>"border-width",
				"default" => "none",
				"options" => array("0"=>__('None', 'ultimatum'),
						"1px 0 1px 0"=>__('Top and Bottom', 'ultimatum'),
						"1px 0 0 0"=>__('Only Top', 'ultimatum'),
						"0 0 1px 0"=>__('Only Bottom', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Archive Page Title Border Style", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar12",
				"property" =>"border-style",
				"default" => "none",
				"options" => array("none"=>__('None', 'ultimatum'),
						"solid"=>__('Solid', 'ultimatum'),
						"dotted"=>__('Dotted', 'ultimatum'),
						"dashed"=>__('Dashed', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Archive Page Title Border Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar12",
				"property" =>"border-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Post Container Padding Top", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" =>"padding-top",
				"default" => "0",
				"type" => "textCSS"
		),
		array(
				"name" => __("Post Container Padding Bottom", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" =>"padding-bottom",
				"default" => "0",
				"type" => "textCSS"
		),
		array(
				"name" => __("Post Container Background Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Post Container Background Image", 'ultimatum'),
				"desc" =>__( "Paste the full URL (include http://) of image here or you can insert the image through the button. To remove image just delete the text in field.", 'ultimatum'),
				"id" => "cssvar13",
				"property" => "background-image",
				"default" => "",
				"type" => "uploadCSS"
		),
		array(
				"name" => __("Post Container Background Image Location", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" => "background-position",
				"default" => "top left",
				"options" => array("top left"=>__('Top Left', 'ultimatum'),
						"top right"=>__('Top Right', 'ultimatum'),
						"top center"=>__('Top Center', 'ultimatum'),
						"bottom left"=>__('Bottom Left', 'ultimatum'),
						"bottom right"=>__('Bottom Right', 'ultimatum'),
						"bottom center"=>__('Bottom Center', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Container Background Image Repeat", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" => "background-repeat",
				"default" => "repeat",
				"options" => array("repeat"=>__('Repeat', 'ultimatum'),
						"repeat-x"=>__('Repeat Horizontal', 'ultimatum'),
						"repeat-y"=>__('Repeat Vertical', 'ultimatum'),
						"no-repeat"=>__('Do not Repeat', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Container Border ", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" =>"border-width",
				"default" => "none",
				"options" => array("0"=>__('None', 'ultimatum'),
						"1px 0 1px 0"=>__('Top and Bottom', 'ultimatum'),
						"1px 0 0 0"=>__('Only Top', 'ultimatum'),
						"0 0 1px 0"=>__('Only Bottom', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Container Border Style", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar13",
				"property" =>"border-style",
				"default" => "none",
				"options" => array("none"=>__('None', 'ultimatum'),
						"solid"=>__('Solid', 'ultimatum'),
						"dotted"=>__('Dotted', 'ultimatum'),
						"dashed"=>__('Dashed', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Container Border Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar14",
				"property" =>"border-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Post Title Padding Left", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" =>"padding-left",
				"default" => "0",
				"type" => "textCSS"
		),
		array(
				"name" => __("Post Title Background Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Post Title Background Image", 'ultimatum'),
				"desc" =>__( "Paste the full URL (include http://) of image here or you can insert the image through the button. To remove image just delete the text in field.", 'ultimatum'),
				"id" => "cssvar15",
				"property" => "background-image",
				"default" => "",
				"type" => "uploadCSS"
		),
		array(
				"name" => __("Post Title Background Image Location", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" => "background-position",
				"default" => "top left",
				"options" => array("top left"=>__('Top Left', 'ultimatum'),
						"top right"=>__('Top Right', 'ultimatum'),
						"top center"=>__('Top Center', 'ultimatum'),
						"bottom left"=>__('Bottom Left', 'ultimatum'),
						"bottom right"=>__('Bottom Right', 'ultimatum'),
						"bottom center"=>__('Bottom Center', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Title Background Image Repeat", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" => "background-repeat",
				"default" => "repeat",
				"options" => array("repeat"=>__('Repeat', 'ultimatum'),
						"repeat-x"=>__('Repeat Horizontal', 'ultimatum'),
						"repeat-y"=>__('Repeat Vertical', 'ultimatum'),
						"no-repeat"=>__('Do not Repeat', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Title Border ", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" =>"border-width",
				"default" => "none",
				"options" => array("0"=>__('None', 'ultimatum'),
						"1px 0 1px 0"=>__('Top and Bottom', 'ultimatum'),
						"1px 0 0 0"=>__('Only Top', 'ultimatum'),
						"0 0 1px 0"=>__('Only Bottom', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Title Border Style", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" =>"border-style",
				"default" => "none",
				"options" => array("none"=>__('None', 'ultimatum'),
						"solid"=>__('Solid', 'ultimatum'),
						"dotted"=>__('Dotted', 'ultimatum'),
						"dashed"=>__('Dashed', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Post Title Border Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar15",
				"property" =>"border-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Meta Background Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar16",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Meta Background Image", 'ultimatum'),
				"desc" =>__( "Paste the full URL (include http://) of image here or you can insert the image through the button. To remove image just delete the text in field.", 'ultimatum'),
				"id" => "cssvar16",
				"property" => "background-image",
				"default" => "",
				"type" => "uploadCSS"
		),
		array(
				"name" => __("Meta Background Image Location", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar16",
				"property" => "background-position",
				"default" => "top left",
				"options" => array("top left"=>__('Top Left', 'ultimatum'),
						"top right"=>__('Top Right', 'ultimatum'),
						"top center"=>__('Top Center', 'ultimatum'),
						"bottom left"=>__('Bottom Left', 'ultimatum'),
						"bottom right"=>__('Bottom Right', 'ultimatum'),
						"bottom center"=>__('Bottom Center', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Meta Background Image Repeat", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar16",
				"property" => "background-repeat",
				"default" => "repeat",
				"options" => array("repeat"=>__('Repeat', 'ultimatum'),
						"repeat-x"=>__('Repeat Horizontal', 'ultimatum'),
						"repeat-y"=>__('Repeat Vertical', 'ultimatum'),
						"no-repeat"=>__('Do not Repeat', 'ultimatum'),
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Meta Border ", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar17",
				"property" =>"border-width",
				"default" => "none",
				"options" => array("0"=>__('None', 'ultimatum'),
						"1px 0 1px 0"=>__('Top and Bottom', 'ultimatum'),
						"1px 0 0 0"=>__('Only Top', 'ultimatum'),
						"0 0 1px 0"=>__('Only Bottom', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Meta Border Style", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar17",
				"property" =>"border-style",
				"default" => "none",
				"options" => array("none"=>__('None', 'ultimatum'),
						"solid"=>__('Solid', 'ultimatum'),
						"dotted"=>__('Dotted', 'ultimatum'),
						"dashed"=>__('Dashed', 'ultimatum'),
		
				),
				"type" => "selectCSS"
		),
		array(
				"name" => __("Meta Border Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar17",
				"property" =>"border-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Meta Padding Top", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar17",
				"property" =>"padding-top",
				"default" => "0",
				"type" => "textCSS"
		),
		array(
				"name" => __("Meta Padding Bottom", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar17",
				"property" =>"padding-bottom",
				"default" => "0",
				"type" => "textCSS"
		),
		array(
				"type" => "endnosave",
		),
		array (
				"type" => "txtElementHead",
		),
		array (
				"name"	=> __("Archive Title", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar11",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Entry Title", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar18",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Post Meta", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar19",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Post Taxonomy Titles", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar20",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Post Taxonomy Links", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar21",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Read More Link", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar22",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		
		
		array(
				"type" => "justSave"
		),
		
		);

return array(
		'auto' => true,
		'name' => 'css',
		'options' => $options
);

