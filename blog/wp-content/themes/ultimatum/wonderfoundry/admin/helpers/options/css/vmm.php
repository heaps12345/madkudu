<?php
$options = array(
		array(
				"name" => __("Vertical Mega Menu <a name=\"vmm\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors And Margins", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Margin-Top ", 'ultimatum'),
				"id" => "cssvar63",
				"property" =>"margin-top",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Margin-Bottom ", 'ultimatum'),
				"id" => "cssvar63",
				"property" =>"margin-bottom",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Top Level Active background ", 'ultimatum'),
				"id" => "cssvar113",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Top Level Hover and sub items background ", 'ultimatum'),
				"id" => "cssvar64",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Second Level Title Background ", 'ultimatum'),
				"id"	=> "cssvar65",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Second Level and Third Level Hover Background ", 'ultimatum'),
				"id"	=> "cssvar66",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "endnosave"
		),
		array (
				"name"	=> __("Top Level Links", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar67",
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
				"name"	=> __("Top Level Links Active", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar114",
				"default" => array(
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
		
		),
		array (
				"name"	=> __("Top Level Links Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar68",
				"default" => array(
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Second Level Title Links", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar65",
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
				"name"	=> __("Second Level Title Links Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar69",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Third Level Links", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar70",
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
				"name"	=> __("Third Level Links Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar71",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Second Level Links", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar72",
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
				"name"	=> __("Second Level Links Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar73",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		
		array(
				"type" => "justsave"
		),
		);
return array(
		'auto' => true,
		'name' => 'css',
		'options' => $options
);
