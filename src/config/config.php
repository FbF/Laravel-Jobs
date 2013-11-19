<?php

return array(

	/**
	 * The base URI for jobs
	 */
	'uri' => 'jobs',

	/**
	 * Determines whether to use a reference field in case your app's jobs have a job
	 * reference that applicant's should mention when applying, or maybe it's useful to
	 * tie in with your business' HR department
	 */
	'use_reference_field' => true,

	/**
	 * Determines whether to use a location field in case your app has quite a few jobs
	 * spread across many locations
	 */
	'use_location_field' => true,

	/**
	 * Determines whether to use a type field in case your app has jobs that are
	 * both permanent and temporary contracts
	 */
	'use_type_field' => true,

	/**
	 * Determines whether to use a time field in case your app has jobs that are
	 * both part time and full time
	 */
	'use_time_field' => true,

	/**
	 * What kind of salary fields are available?
	 *
	 * Options are:
	 * - none 		No salary fields are shown on the site
	 * - text 		A text based salary field is shown. You can enter any kind of format
	 * 				in here. For example "From $30k", "Negotiable", "$35k - $45k"
	 * - number 	A single salary field is shown and only numbers can be enterred, e.g.
	 * 				"45000"
	 * - range 		Two salary fields are shown ('from' and 'to') and only numbers can be
	 * 				enterred into each of them, e.g. "45000" and "55000"
	 */
	'salary_fields' => 'range',

	/**
	 * Determines whether to use a closing date field in your app
	 */
	'use_closing_date_field' => true,

	/**
	 * The view to use for the jobs index page. You can change this to a view in your
	 * app, and inside your own view you can @include the various elements in the package
	 * or you can use this one provided, but there's no layout or anything.
	 */
	'index_view' => 'laravel-jobs::index',

	/**
	 * The view to use for the jobs detail page. You can change this to a view in your
	 * app, and inside your own view you can @include the various elements in the package
	 * or you can use this one provided, but there's no layout or anything.
	 */
	'view_view' => 'laravel-jobs::view',


);