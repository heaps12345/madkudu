<?php
$options =array(
		array(
				"name" => __("Tabs <a name=\"tab\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Inactive Tab ", 'ultimatum'),
				"id" => "cssvar86",
				"property" =>"background-color",
				"default" => "0",
				"type" => "color",
		),
		array(
				"name" => __("Hover Tab ", 'ultimatum'),
				"id" => "cssvar87",
				"property" =>"background-color",
				"default" => "0",
				"type" => "color",
		),
		array(
				"name" => __("Active Tab", 'ultimatum'),
				"id" => "cssvar88",
				"property" =>"background-color",
				"default" => "0",
				"type" => "color",
		),
		array(
				"name" => __("Content Background ", 'ultimatum'),
				"id" => "cssvar89",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"type" => "endnosave"
		),
		array (
				"name"	=> __("Default Tab Title", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar86",
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
				"name"	=> __("Active Tab Title", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar88",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
		),
		array (
				"name"	=> __("Tab Title Hover", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar87",
				"default" => array(
						"color" => "",
						"font-style" => "inherit",
						"text-decoration" => "inherit",
				),
		),
		array (
				"name"	=> __("Tab Content", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar89",
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