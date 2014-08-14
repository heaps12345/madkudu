<?php
$options =array(
		array(
				"name" => __("Togglers <a name=\"toggle\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Title ", 'ultimatum'),
				"id" => "cssvar94",
				"property" =>"background-color",
				"default" => "",
				"type" => "color",
		),
		array(
				"name" => __("Active Title", 'ultimatum'),
				"id" => "cssvar95",
				"property" =>"background-color",
				"default" => "0",
				"type" => "color",
		),
		array(
				"name" => __("Content Background ", 'ultimatum'),
				"id" => "cssvar96",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "endnosave"
		),
		array (
				"name"	=> __("Title ", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar97",
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
				"name"	=> __("Content", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar98",
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