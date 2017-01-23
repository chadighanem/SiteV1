<?php
    $options[] = array( "name" => "Portfolio",
    					"sicon" => "portfolio-32x32.png",
						"type" => "heading");

    $options[] = array( "name" => "Choose the defined Portfolio page",
                        "desc" => "The portfolio item page will use the same title description, if defined, as the selected page.",
                        "id" => $shortname."_portfoliodesc",
                        "type" => "select",
                        "options" => $options_pages);
?>