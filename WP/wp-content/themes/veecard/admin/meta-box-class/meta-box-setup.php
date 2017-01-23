<?php

require_once("meta-box-class.php");

if (is_admin()){

	//All meta boxes prefix
	$prefix = 'resume_';


	//Bio info meta box config
	$config1 = array(
	'id' => 'bio_info',          			// meta box id, unique per meta box
	'title' => 'Bio Info',          		// meta box title
	'pages' => array('resume'),      		// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',            		// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',            		// order of meta box: high (default), low; optional
	'fields' => array(),            		// list of meta fields (can be added by field arrays)
	'local_images' => true,          		// Use local or hosted images (meta box images for add/remove)
	'use_with_theme' => true          		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);


	//Initiate bio info meta box
	$my_meta1 =  new AT_Meta_Box($config1);


	//Bio info fields
	$my_meta1->addText($prefix.'bio_name',array('name'=> 'Full Name '));
	$my_meta1->addText($prefix.'bio_address',array('name'=> 'Address '));
	$my_meta1->addText($prefix.'bio_location',array('name'=> 'Location '));
	$my_meta1->addText($prefix.'bio_email',array('name'=> 'Email '));
	$my_meta1->addText($prefix.'bio_phone',array('name'=> 'Phone Number '));
	$my_meta1->addText($prefix.'bio_url',array('name'=> 'Website ', 'desc'=>'Make sure to include http:// in the URL'));

    //Finish bio info meta mox decleration
	$my_meta1->Finish();




  //Employment info meta box config
  $config2 = array(
    'id' => 'employment',          			// meta box id, unique per meta box
    'title' => 'Employment',          		// meta box title
	  'pages' => array('resume'),      		// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',					// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',            		// order of meta box: high (default), low; optional
    'fields' => array(),            		// list of meta fields (can be added by field arrays)
    'local_images' => true,          		// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );


  //Initiate employment info meta box
  $my_meta2 =  new AT_Meta_Box($config2);


  //Employment info fields
  $repeater_fields[] = $my_meta2->addText($prefix.'job_title',array('name'=> 'Job Title '),true);
  $repeater_fields[] = $my_meta2->addTextarea($prefix.'job_description',array('name'=> 'Job Description '),true);
  $repeater_fields[] = $my_meta2->addDate($prefix.'job_fromdate',array('name'=> 'Start Date '),true);
  $repeater_fields[] = $my_meta2->addDate($prefix.'job_todate',array('name'=> 'End Date ', 'desc' =>'Use "PRESENT", if you are still employed'),true);
  $repeater_fields[] = $my_meta2->addText($prefix.'job_employer',array('name'=> 'Employer Name '),true);
  $repeater_fields[] = $my_meta2->addText($prefix.'job_url',array('name'=> 'Employer Url ', 'desc'=>'Make sure to include http:// in the URL'),true);

  //Employment repeater block
  $my_meta2->addRepeaterBlock($prefix.'job_',array('inline' => true, 'name' => 'Enter your job info','fields' => $repeater_fields, 'sortable'=> true));


  //Finish employment info meta mox decleration
  $my_meta2->Finish();


 //Education info meta box config
  $config3 = array(
    'id' => 'education_info',          // meta box id, unique per meta box
    'title' => 'Education',          // meta box title
	  'pages' => array('resume'),      		// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',            // order of meta box: high (default), low; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => true,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );


  //Initiate education info meta box
  $my_meta3 =  new AT_Meta_Box($config3);

  //Education info fields
  $repeater_fields1[] = $my_meta3->addText($prefix.'edu_degree',array('name'=> 'School/Degree '),true);
  $repeater_fields1[] = $my_meta3->addDate($prefix.'edu_year',array('name'=> 'Greduation Year '),true);

  //Education repeater block
  $my_meta3->addRepeaterBlock($prefix.'edu_',array('inline' => true, 'name' => 'Enter your education info','fields' => $repeater_fields1, 'sortable'=> true));

  //Finish education info meta mox decleration
  $my_meta3->Finish();



  //Skills info meta box config
	$config4 = array(
    'id' => 'skills_info',          		// meta box id, unique per meta box
    'title' => 'Skills',          			// meta box title
	  'pages' => array('resume'),      		// post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',            		// where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',            		// order of meta box: high (default), low; optional
    'fields' => array(),            		// list of meta fields (can be added by field arrays)
    'local_images' => true,          		// Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );


  //Initiate skills info meta box
  $my_meta4 =  new AT_Meta_Box($config4);

  //Skills info fields
  $repeater_fields4[] = $my_meta4->addText($prefix.'skill_name',array('name'=> 'Skill Name '),true);
  $repeater_fields4[] = $my_meta4->addSelect($prefix.'skill_level',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),array('name'=> 'Skill Level ', 'std'=> array('2')),true);

  //Skills repeater block
  $my_meta4->addRepeaterBlock($prefix.'skill_',array('inline' => true, 'name' => 'Enter your skill info','fields' => $repeater_fields4, 'sortable'=> true));


  //Finish skills info meta mox decleration
  $my_meta4->Finish();

}