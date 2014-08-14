<?php
$options = array(
		array(
				"name" => __("Horizontal Dropdown Menu <a name=\"hm\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array(
				"name" => __("Background Colors And Margins", 'ultimatum'),
				"type" => "start"
		),
		array(
				"name" => __("Margin-Top ", 'ultimatum'),
				"id" => "cssvar48",
				"property" =>"margin-top",
				"default" => "",
				"type" => "textCSS",
		),
		array(
				"name" => __("Margin-Bottom ", 'ultimatum'),
				"id" => "cssvar48",
				"property" =>"margin-bottom",
				"default" => "",
				"type" => "textCSS",
		),
		array(
				"name" => __("Sub Item Width ", 'ultimatum'),
				"id" => "cssvar49",
				"property" =>"width",
				"default" => "200",
				"type" => "textCSS",
		),
		array(
				"name" => __("Top Level Items Background ", 'ultimatum'),
				"id" => "cssvar50",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Top Level Hover and sub items background ", 'ultimatum'),
				"id" => "cssvar51",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Top Level Active Item background ", 'ultimatum'),
				"id" => "cssvar115",
				"property" =>"background-color",
				"default" => "",
				"type" => "color"
		),
		array(
				"name" => __("Sub Levels Hover background ", 'ultimatum'),
				"id" => "cssvar52",
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
				"id"	=> "cssvar53",
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
				"id"	=> "cssvar54",
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
				"id"	=> "cssvar116",
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
				"id"	=> "cssvar55",
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
				"id"	=> "cssvar56",
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