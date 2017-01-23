<?php
    $options[] = array( "name" => "Color Settings",
    					"sicon" => "colors.png",
						"type" => "heading");

	$options[] = array( "name" => "PREDEFINED SKINS",
						"desc" => "You can set main skin below. Leave the field blank to restore the defaults",
						"type" => "info");

	$options[] = array( "name" => "Predefined Theme Skin",
						"desc" => "You can select alternative color scheme for the veecard theme.",
						"id" => $shortname."_blog_skin",
						"std" => "default.css",
						"class" => "sectionlast",
						"type" => "select",
						"options" => $skins_array);

	$options[] = array( "name" => "PREDEFINED PATTERNS",
						"desc" => "You can set  main content background pattern below. Leave the fields blank to restore the defaults",
						"type" => "info");

	$options[] = array( "name" => "Predefined Patterns",
						"desc" => "You can select alternative patterns for the main content background.",
						"id" => $shortname."_blog_pattern",
						"std" => "default",
						"class" => "sectionlast",
						"type" => "select",
						"options" => $patterns_array);

	$options[] = array( "name" => "CUSTOMIZE MAIN COLORS",
						"desc" => "You can set main colors below. Leave the fields blank to restore the defaults",
						"type" => "info");

	$options[] = array( "name" => "Main Headings Color (H2,H3...)",
						"id" => $shortname."_main_h_color",
						"std" => "#D90D5B",
						"type" => "color");
	$options[] = array( "name" => "Accent Color",
						"id" => $shortname."_main_accent_color",
						"std" => "#0092C4",
						"type" => "color");
?>