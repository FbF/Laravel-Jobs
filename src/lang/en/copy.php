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
		'no_matching_jobs' => 'Sorry, there are currently no jobs matching your criteria, please try again.'
	)
);