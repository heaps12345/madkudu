<?php
$options = array(
		array(
				"name" => __("Widget Specific <a name=\"widget\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array (
				"name"	=> __("Super Title", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar102",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => "on",
		),
		array (
				"name"	=> __("Widget Titles(color won't work)", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar103",
				"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => "on",
		),
		array(
				"type" => "justsave",
		),
		array(
				"name" => __("Widget Titles Decoration", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Title Background Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar104",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Title Background Image", 'ultimatum'),
				"desc" =>__( "Paste the full URL (include http://) of image here or you can insert the image through the button. To remove image just delete the text in field.", 'ultimatum'),
				"id" => "cssvar104",
				"property" => "background-image",
				"default" => "",
				"type" => "uploadCSS"
		),
		array(
				"name" => __("Title Background Image Location", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar104",
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
				"name" => __("Title Background Image Repeat", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar104",
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
				"name" => __("Title Border ", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar104",
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
				"name" => __("Title Border Style", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar104",
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
				"name" => __("Title Border Color", 'ultimatum'),
				"desc" => "",
				"id" => "cssvar104",
				"property" =>"border-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "end"
		),
		);
		return array(
				'auto' => true,
				'name' => 'css',
				'options' => $options
		);