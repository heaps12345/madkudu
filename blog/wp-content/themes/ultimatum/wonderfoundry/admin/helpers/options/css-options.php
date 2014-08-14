<?php
$aitself='';
$tagline='';
$opt = get_option('ultimatum_general');
if(isset($opt['text_logo']) && $opt["text_logo"]==1){
$aitself=array (
		"name"	=> __("Site Logo", 'ultimatum'),
		"type"	=> "txtElement",
		"id"	=> "cssvar108",
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
		);
$tagline= array (
		"name"	=> __("Tag Line", 'ultimatum'),
		"type"	=> "txtElement",
		"id"	=> "cssvar109",
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
		)
		;	
}
$options = array(
	array(
		"name" => __("General", 'ultimatum').'',
		"type" => "title"
	),
	array(
		"name" => __("Background Color and Image", 'ultimatum'),
		"type" => "start"
	),
	array(
			"name" => __("Body Background Color", 'ultimatum'),
			"desc" => "Select your desired backround color for the body delete the text box content for transparent.",
			"id" => "cssvar1",
			"property" =>"background-color",
			"default" => "",
			"type" => "color"
		),
		array(
			"name" => __("Background Image", 'ultimatum'),
			"desc" =>__( "Paste the full URL (include http://) of image here or you can insert the image through the button. To remove image just delete the text in field.", 'ultimatum'),
			"id" => "cssvar1",
			"property" => "background-image",
			"default" => "",
			"type" => "uploadCSS"
		),
		array(
			"name" => __("Image Location", 'ultimatum'),
			"desc" => "",
			"id" => "cssvar1",
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
			"name" => __("Image Repeat", 'ultimatum'),
			"desc" => "",
			"id" => "cssvar1",
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
		"type" => "end"
	),
	array(
		"name" => __("Logo", 'ultimatum'),
		"type" => "title"
	),
	array(
		"name" => __("Margins", 'ultimatum'),
		"type" => "start"
	),
	array(
			"name" => __("Margin-Top ", 'ultimatum'),
			"id" => "cssvar2",
			"property" =>"margin-top",
			"default" => "0",
			"type" => "textCSS",
		),
	array(
			"name" => __("Margin-Bottom ", 'ultimatum'),
			"id" => "cssvar2",
			"property" =>"margin-bottom",
			"default" => "0",
			"type" => "textCSS",
		),
	array(
		"type" => "endnosave"
	),
	array(
		"name" => __("This part is enabled only if you selected Logo as Text in general Settings", 'ultimatum'),
		"type" => "explain"
	),
	array (
		"type" => "txtElementHead",
	),
	$aitself,
	$tagline,
	array(
		"type" => "justSave"
	),
	array(
		"name" => __("Basic Fonts and Colors", 'ultimatum'),
		"type" => "title"
	),
	array(
		"name" => __("The fonts available below (and throughout the system) are standard web fonts and the fonts enabled from Font Library", 'ultimatum'),
		"type" => "explain"
	),
	array (
		"type" => "txtElementHead",
	),
	array (
		"name"	=> "General",
		"type"	=> "txtElement",
		"id"	=> "cssvar1",
		"default" => array(
						"font-family" => 'inherit',
						"font-size" => 'inherit',
						"line-height" => 'inherit',
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				
	),
	array (
		"name"	=> "H1",
		"type"	=> "txtElement",
		"id"	=> "cssvar3",
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
		"name"	=> "H2",
		"type"	=> "txtElement",
		"id"	=> "cssvar4",
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
		"name"	=> "H3",
		"type"	=> "txtElement",
		"id"	=> "cssvar5",
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
		"name"	=> "H4",
		"type"	=> "txtElement",
		"id"	=> "cssvar6",
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
		"name"	=> "H5",
		"type"	=> "txtElement",
		"id"	=> "cssvar7",
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
		"name"	=> "H6",
		"type"	=> "txtElement",
		"id"	=> "cssvar8",
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
		"name"	=> "Quotes",
		"type"	=> "txtElement",
		"id"	=> "cssvar110",
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
		"name"	=> "links",
		"type"	=> "txtElement",
		"id"	=> "cssvar9",
		"default" => array(
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
					),
	),
	array (
		"name"	=> "links hover",
		"type"	=> "txtElement",
		"id"	=> "cssvar10",
		"default" => array(
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
					),
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