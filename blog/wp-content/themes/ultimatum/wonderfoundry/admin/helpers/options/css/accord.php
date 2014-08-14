<?php
$options =array(
		array(
				"name" => __("Accordions <a name=\"accord\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Inactive Title ", 'ultimatum'),
				"id" => "cssvar90",
				"property" =>"background-color",
				"default" => "",
				"type" => "color",
		),
		array(
				"name" => __("Active Title", 'ultimatum'),
				"id" => "cssvar91",
				"property" =>"background-color",
				"default" => "",
				"type" => "color",
		),
		array(
				"name" => __("Content Background ", 'ultimatum'),
				"id" => "cssvar92",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "endnosave"
		),
		array (
				"name"	=> __("Accordion Title ", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar93",
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
				"name"	=> __("Accordion Content", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar92",
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
		array(
				"type" => "justsave"
		),
		);
return array(
		'auto' => true,
		'name' => 'css',
		'options' => $options
);