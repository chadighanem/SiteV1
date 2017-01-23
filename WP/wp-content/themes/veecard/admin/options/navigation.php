<?php
$options[] = array( "name" => "Navigation",
						"sicon" => "interface.png",
                        "type" => "heading");

	$options[] = array( "name" => "Resume Label",
                        "desc" => "Enter a label for resume page. ",
                        "id" => $shortname."_resume_label",
                        "std" => "",
                        "type" => "text");

 	$options[] = array( "name" => "Select Resume Page",
                        "desc" => "Select a page for resume. Leave unselected to hide it from menu.",
                        "id" => $shortname."_resume_page",
                        "std" => "",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $options_custom_posts);

	$options[] = array( "name" => "Portfolio Label",
                        "desc" => "Enter a label for portfolio page.",
                        "id" => $shortname."_portfolio_label",
                        "std" => "",
                        "type" => "text");

 	$options[] = array( "name" => "Select Portfolio Page",
                        "desc" => "Select a page for portfolio. Leave unselected to hide it from menu.",
                        "id" => $shortname."_portfolio_page",
                        "std" => "",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $options_pages);

	$options[] = array( "name" => "Contact Label",
                        "desc" => "Enter a label for contact page.",
                        "id" => $shortname."_contact_label",
                        "std" => "",
                        "type" => "text");

 	$options[] = array( "name" => "Select Contact Page",
                        "desc" => "Select a page for contact. Leave unselected to hide it from menu.",
                        "id" => $shortname."_contact_page",
                        "std" => "",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
                        "options" => $options_pages);

?>