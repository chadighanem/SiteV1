<?php
$options[] = array( "name" => "General",
						"sicon" => "advancedsettings.png",
                        "type" => "heading");


    $options[] = array( "name" => "Your Logo",
                        "desc" => "You can use your own logo. Click to 'Upload' button and upload your own logo.",
                        "id" => $shortname."_clogo",
                        "std" => "",
                        "type" => "upload");

	$options[] = array( "name" => "Text as Logo",
                        "desc" => "If you don't upload your own company logo, this text will show up in it's place.",
                        "id" => $shortname."_clogo_text",
                        "std" => "Veecard",
                        "type" => "text");

	$options[] = array( "name" => "Custom Favicon",
                        "desc" => "You can use your own custom favicon. Click to 'Upload Image' button and upload your own favicon.",
                        "id" => $shortname."_custom_shortcut_favicon",
                        "std" => "",
                        "type" => "upload");

	$options[] = array( "name" => "Your vCard File",
                        "desc" => "You can upload your vCard file. Click to 'Upload' button and upload your own vcard file.",
                        "id" => $shortname."_bio_vcard",
                        "std" => "",
                        "type" => "upload");

?>