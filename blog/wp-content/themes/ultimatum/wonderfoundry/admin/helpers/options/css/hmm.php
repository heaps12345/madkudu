<?php
$options = array(
		array(
				"name" => __("Horizontal Mega Menu ", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors And Margins", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Margin-Top ", 'ultimatum'),
				"id" => "cssvar37",
				"property" =>"margin-top",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Margin-Bottom ", 'ultimatum'),
				"id" => "cssvar37",
				"property" =>"margin-bottom",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Top Level Active background ", 'ultimatum'),
				"id" => "cssvar111",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Top Level Hover and sub items background ", 'ultimatum'),
				"id" => "cssvar38",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Second Level Title Background ", 'ultimatum'),
				"id"	=> "cssvar39",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Second Level and Third Level Hover Background ", 'ultimatum'),
				"id"	=> "cssvar40",
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
				"id"	=> "cssvar41",
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
				"id"	=> "cssvar112",
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
				"id"	=> "cssvar42",
				"default" => array(
						"color" => "",
						"font-weight" => "inherit",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
		
		),
		array (
				"name"	=> __("Second Level Title Links", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar39",
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
				"id"	=> "cssvar43",
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
				"id"	=> "cssvar44",
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
				"id"	=> "cssvar45",
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
				"id"	=> "cssvar46",
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
				"id"	=> "cssvar47",
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