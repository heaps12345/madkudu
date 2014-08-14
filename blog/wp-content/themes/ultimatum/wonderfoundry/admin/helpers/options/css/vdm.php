<?php
$options= array(
		array(
				"name" => __("Vertical Dropdown Menu <a name=\"vm\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors And Margins", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Margin-Top ", 'ultimatum'),
				"id" => "cssvar74",
				"property" =>"margin-top",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Margin-Bottom ", 'ultimatum'),
				"id" => "cssvar74",
				"property" =>"margin-bottom",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Top Level Items Background ", 'ultimatum'),
				"id" => "cssvar75",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Top Level Hover and sub items background ", 'ultimatum'),
				"id" => "cssvar76",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Top Level Active items background ", 'ultimatum'),
				"id" => "cssvar117",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Sub Levels Hover background ", 'ultimatum'),
				"id" => "cssvar77",
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
				"id"	=> "cssvar78",
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
				"name"	=> __("Top Level Links Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar79",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
				"cufon" => 'on',
		),
		array (
				"name"	=> __("Top Level Links Active", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar118",
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
				"id"	=> "cssvar80",
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
				"id"	=> "cssvar81",
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