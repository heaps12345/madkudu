<?php
$options = array(
		array(
				"name" => __("Horizontal Menu", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors And Margins", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Margin-Top ", 'ultimatum'),
				"id" => "cssvar57",
				"property" =>"margin-top",
				"default" => "0",
				"type" => "textCSS",
		),
		array(
				"name" => __("Margin-Bottom ", 'ultimatum'),
				"id" => "cssvar57",
				"property" =>"margin-bottom",
				"default" => "0",
				"type" => "textCSS",
		),
		
		array(
				"name" => __("Item Background ", 'ultimatum'),
				"id" => "cssvar58",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Active Item Background ", 'ultimatum'),
				"id" => "cssvar119",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Hover Background ", 'ultimatum'),
				"id" => "cssvar59",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Seperator Color", 'ultimatum'),
				"id" => "cssvar60",
				"property" =>"border-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "endnosave"
		),
	
		array (
				"name"	=> __("Item Text", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar61",
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
				"name"	=> __("Active Item", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar120",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
		),
		array (
				"name"	=> __("Item Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar62",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
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