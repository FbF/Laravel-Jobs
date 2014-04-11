<?php

return array(

	/**
	 * The base URI for jobs
	 */
	'uri' => 'jobs',

	/**
	 * Page title of the jobs index page
	 *
	 * @type string
	 */
	'index_page_title' => 'Careers',

	/**
	 * Order jobs on index page
	 *
	 * @type string
	 */
	'index_order' => 'desc',

	/**
	 * Meta description of the jobs index page
	 *
	 * @type string
	 */
	'index_page_meta_description' => 'This is the description for the jobs index page',

	/**
	 * Meta keywords of the jobs index page
	 *
	 * @type string
	 */
	'index_page_meta_keywords' => 'These are the keywords for the jobs index page',

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
	 * 				"45000". It is stored in the salary_from field in the database
	 * - range 		Two salary fields are shown ('from' and 'to') and only numbers can be
	 * 				enterred into each of them, e.g. "45000" and "55000"
	 */
	'salary_field' => 'text',

	/**
	 * Determines whether to use a closing date field in your app
	 */
	'use_closing_date_field' => true,

	/**
	 * Defines the number of jobs shown per page the index page
	 */
	'results_per_page' => 10,

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

	/**
	 * Determines whether users can apply for jobs through the website.
	 */
	'apply' => true,

	/**
	 * Determines whether the CV upload field is required
	 */
	'is_cv_required' => true,

	/**
	 * Determines whether the covering letter field is required
	 */
	'is_covering_letter_required' => true,

	/**
	 * Comma separated list of the allowed mime types for the CV upload field as per the
	 * Laravel mimes validation rule
	 */
	'cv_allowed_mimes' => 'doc,docx,rtf,pdf',

	/**
	 * The view to use for the job application page. You can change this to a view in your
	 * app, and inside your own view you can @include the form partial in the package
	 * or you can use this one provided, but there's no layout or anything.
	 */
	'application_view' => 'laravel-jobs::application',

	/**
	 * The settings for the email that is sent from the jobs application form
	 */
    'mail' => array(
        'views' => array(
            'laravel-jobs::emails.html.application',
            'laravel-jobs::emails.text.application',
        ),
        'to' => array(
            'name' => 'Human Resources',
            'email' => 'hr@example.com',
        ),
        'subject' => 'Website Job Application',
	),

    'seed' => array(

	    /**
	     * Should the seeder append (replace = false) or replace (replace = true) existing data
	     */
	    'replace' => false,

    ),


);