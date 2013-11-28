<?php

return array(
	'attributes' => array(
		'reference' => 'Job ref:',
		'location' => 'Location:',
		'type' => '',
		'time' => '',
		'salary' => 'Salary:',
	),
	'types' => array(
		'PERMANENT_OR_TEMPORARY' => 'Permanent or Temporary',
		'PERMANENT' => 'Permanent',
		'TEMPORARY' => 'Temporary',
	),
	'times' => array(
		'FULL_OR_PART_TIME' => 'Full or part time',
		'FULL_TIME' => 'Full time',
		'PART_TIME' => 'Part time',
	),
	'filter' => array(
		'labels' => array(
			'type' => ' ',
			'time' => ' ',
			'keywords' => 'Keywords',
		),
		'submit' => 'Filter'
	),
	'salary' => array(
		'string' => '&pound;:number',
		'decimals' => '2',
		'dec_point' => '.',
		'thousands_sep' => ',',
	),
	'misc' => array(
		'read_more' => 'Read more &raquo;',
		'no_matching_jobs' => 'Sorry, there are currently no jobs matching your criteria, please try again.',
        'sent_message' => 'Thank you for contacting us, we will get back to you shortly.',
        'apply' => 'Apply now',
	),
	'validation' => array(
        'name.required' => 'Please enter your name',
        'email.required' => 'Please enter your email address',
        'email.email' => 'Please enter a valid email address',
        'covering_letter.required' => 'Please write a covering letter',
        'cv.required' => 'Please upload your CV',
        'cv.mimes' => 'Sorry, that file type is not allowed',
	),
	'application' => array(
        'name' => 'Your name',
        'email' => 'Email address',
        'covering_letter' => 'Covering letter',
        'cv' => 'Upload your CV',
        'submit' => 'Apply',
    ),
);