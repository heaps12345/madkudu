<?php
$options = array (
		
		array(
				"name" => __("Slide Show Elements <a name=\"slider\"></a>", 'ultimatum').'',
				"type" => "title"
		),
		array (
				"name"	=> __("Titles -Anything - SlideDeck", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar105",
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
				"name"	=> __("Content -Anything - SlideDeck", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar100",
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
				"name"	=> __("Caption Titles -Anything - S3", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar106",
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
				"name"	=> __("Caption Content -Anything - S3", 'ultimatum'),
				"type"	=> "txtElement",
				"id"	=> "cssvar107",
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
		//anyCaption
		array(
				"type" => "justsave"
		),
		
		);
		return array(
				'auto' => true,
				'name' => 'css',
				'options' => $options
		);