<?php
$options[] = array( "name" => "Homepage",
						"sicon" => "user-home.png",
                        "type" => "heading");

	$options[] = array( "name" => "Homepage Name",
                        "desc" => "Enter your name for homepage. (ex: Martin Smith)",
                        "id" => $shortname."_home_name",
                        "std" => "Martin Smith",
                        "type" => "text");

 	$options[] = array( "name" => "Homepage Short Bio Info",
                        "desc" => "Enter your short bio info for homepage. (ex: Hello, I'm Martin, Senior Web Designer, working in the field for about 9 years now. I'm 34 years old, married, living in Bucharest, Romania.)",
                        "id" => $shortname."_home_teaser",
                        "std" => "Hi, my name is <strong>Martin Smith</strong> and I am a passionate <span>designer</span> and <span>developer</span>.",
                        "type" => "textarea");

    $options[] = array( "name" => "Homepage Email",
                        "desc" => "Enter your email for homepage. (ex: martin.smith@gmail.com)",
                        "id" => $shortname."_home_email",
                        "std" => "martin.smith@gmail.com",
                        "type" => "text");

 	$options[] = array( "name" => "Homepage Bio Image",
                        "desc" => "Enter your teaser image for homepage. Click to 'Upload' button and upload your teaser image. Recommended size is 300x300px or square proportion.",
                        "id" => $shortname."_home_teaser_image",
                        "std" => "",
                        "type" => "upload");

	$options[] = array( "name" => "Homepage Birthday",
                        "desc" => "Enter your birthday for homepage. (ex: Apr 5th, 1976)",
                        "id" => $shortname."_home_birthday",
                        "std" => "Apr 5th, 1976",
                        "type" => "text");

	$options[] = array( "name" => "Homepage Phone",
                        "desc" => "Enter your phone for homepage. (ex: +1 034 567 789)",
                        "id" => $shortname."_home_phone",
                        "std" => "+1 034 567 789",
                        "type" => "text");

    $options[] = array( "name" => "Homepage Address",
                        "desc" => "Enter your biography address. (ex: 226 Elwyn Street, New York, NY 10005)",
                        "id" => $shortname."_home_address",
                        "std" => "226 Elwyn Street, New York, NY 10005",
                        "type" => "text");

    $options[] = array( "name" => "Homepage Web URL",
                        "desc" => "Enter your web address for homepage. (ex: http://www.martinsmith.com)",
                        "id" => $shortname."_home_web_url",
                        "std" => "http://www.martinsmith.com",
                        "type" => "text");


?>