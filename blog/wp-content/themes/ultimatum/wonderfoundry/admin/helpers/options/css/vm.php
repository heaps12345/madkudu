<?php
$options= array(
		array(
				"name" => __("Vertical Menu <a name=\"vndm\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors And Margins", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Item Background ", 'ultimatum'),
				"id" => "cssvar82",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Active Item Background ", 'ultimatum'),
				"id" => "cssvar121",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Hover Background ", 'ultimatum'),
				"id" => "cssvar83",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "endnosave"
		),
		array (
				"name"	=> __("Item Text", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar84",
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
				"name"	=> __("Item Active", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar122",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
		),
		array (
				"name"	=> __("Item Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar85",
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