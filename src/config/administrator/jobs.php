<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Jobs',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'job',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelJobs\Job',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'title' => array(
			'title' => 'Title',
		),
		'reference' => array(
			'title' => 'Ref',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_reference_field');
				}
		),
		'location' => array(
			'title' => 'Location',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_location_field');
				}
		),
		'type' => array(
			'title' => 'Perm/temp',
			'select' => "CASE (:table).type WHEN '".Fbf\LaravelJobs\Job::PERMANENT."' THEN 'Permanent' WHEN '".Fbf\LaravelJobs\Job::TEMPORARY."' THEN 'Temporary' END",
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_type_field');
				}
		),
		'time' => array(
			'title' => 'Part/full time',
			'select' => "CASE (:table).time WHEN '".Fbf\LaravelJobs\Job::FULL_TIME."' THEN 'Full time' WHEN '".Fbf\LaravelJobs\Job::PART_TIME."' THEN 'Part time' END",
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_time_field');
				}
		),
		'closing_date' => array(
			'title' => 'Closing date',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_closing_date_field');
				}
		),
		'published_date' => array(
			'title' => 'Published',
		),
		'status' => array(
			'title' => 'Status',
			'select' => "CASE (:table).status WHEN '".Fbf\LaravelJobs\Job::APPROVED."' THEN 'Approved' WHEN '".Fbf\LaravelJobs\Job::DRAFT."' THEN 'Draft' END",
		),
		'updated_at' => array(
			'title' => 'Last Updated'
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'text',
		),
		'slug' => array(
			'title' => 'Slug',
			'type' => 'text',
			'visible' => function($model)
				{
					return $model->exists;
				},
		),
		'reference' => array(
			'title' => 'Reference',
			'type' => 'text',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_reference_field');
				}
		),
		'location' => array(
			'title' => 'Location',
			'type' => 'text',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_location_field');
				}
		),
		'type' => array(
			'title' => 'Type',
			'type' => 'enum',
			'options' => array(
				Fbf\LaravelJobs\Job::PERMANENT => 'Permanent',
				Fbf\LaravelJobs\Job::TEMPORARY => 'Temporary',
			),
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_type_field');
				}
		),
		'time' => array(
			'title' => 'Time',
			'type' => 'enum',
			'options' => array(
				Fbf\LaravelJobs\Job::PART_TIME => 'Part time',
				Fbf\LaravelJobs\Job::FULL_TIME => 'Full time',
			),
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_time_field');
				}
		),
		'salary_text' => array(
			'title' => 'Salary (free text)',
			'type' => 'text',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::salary_field') == 'text';
				}
		),
		'salary_from' => array(
			'title' => Config::get('laravel-jobs::salary_field') == 'range' ? 'Salary from (number)' : 'Salary (number)',
			'type' => 'number',
			'symbol' => '£', //optional, defaults to ''
			'decimals' => 2, //optional, defaults to 0
			'thousands_separator' => ',', //optional, defaults to ','
			'decimal_separator' => '.', //optional, defaults to '.'
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::salary_field') == 'number' || Config::get('laravel-jobs::salary_field') == 'range';
				}
		),
		'salary_to' => array(
			'title' => 'Salary to (number)',
			'type' => 'number',
			'symbol' => '£', //optional, defaults to ''
			'decimals' => 2, //optional, defaults to 0
			'thousands_separator' => ',', //optional, defaults to ','
			'decimal_separator' => '.', //optional, defaults to '.'
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::salary_field') == 'range';
				}
		),
		'closing_date' => array(
			'title' => 'Closing date',
			'type' => 'date',
			'date_format' => 'yy-mm-dd', //optional, will default to this value
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_closing_date_field');
				}
		),
		'description' => array(
			'title' => 'Job description',
			'type' => 'wysiwyg',
		),
		'search_extra' => array(
			'title' => 'Add any keywords in here that you want to be searchable',
			'type' => 'textarea',
		),
		'meta_description' => array(
			'title' => 'Meta Description',
			'type' => 'textarea',
		),
		'meta_keywords' => array(
			'title' => 'Meta Keywords',
			'type' => 'textarea',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelJobs\Job::DRAFT => 'Draft',
				Fbf\LaravelJobs\Job::APPROVED => 'Approved',
			),
		),
		'published_date' => array(
			'title' => 'Published Date',
			'type' => 'datetime',
			'date_format' => 'yy-mm-dd', //optional, will default to this value
			'time_format' => 'HH:mm',    //optional, will default to this value
		),
		'created_at' => array(
			'title' => 'Created',
			'type' => 'datetime',
			'editable' => false,
		),
		'updated_at' => array(
			'title' => 'Updated',
			'type' => 'datetime',
			'editable' => false,
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'title' => array(
			'title' => 'Title',
		),
		'reference' => array(
			'title' => 'Reference',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_reference_field');
				}
		),
		'location' => array(
			'title' => 'Location',
			'type' => 'text',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_location_field');
				}
		),
		'type' => array(
			'title' => 'Type',
			'type' => 'enum',
			'options' => array(
				Fbf\LaravelJobs\Job::PERMANENT => 'Permanent',
				Fbf\LaravelJobs\Job::TEMPORARY => 'Temporary',
			),
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_type_field');
				}
		),
		'time' => array(
			'title' => 'Time',
			'type' => 'enum',
			'options' => array(
				Fbf\LaravelJobs\Job::PART_TIME => 'Part time',
				Fbf\LaravelJobs\Job::FULL_TIME => 'Full time',
			),
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_time_field');
				}
		),
		'closing_date' => array(
			'type' => 'date',
			'title' => 'Closing date',
			'visible' => function ($model)
				{
					return Config::get('laravel-jobs::use_closing_date_field');
				}
		),
		'description' => array(
			'type' => 'text',
			'title' => 'Description',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelJobs\Job::DRAFT => 'Draft',
				Fbf\LaravelJobs\Job::APPROVED => 'Approved',
			),
		),
		'published_date' => array(
			'title' => 'Published',
			'type' => 'date',
		),
	),

	'rules' => array(
		'title' => 'required|max:250',
		'slug' => 'max:250|alpha_dash|unique:fbf_jobs',
		'reference' => 'max:250',
		'location' => 'max:250',
		'type' => 'in:' . Fbf\LaravelJobs\Job::PERMANENT . ',' . Fbf\LaravelJobs\Job::TEMPORARY,
		'time' => 'in:' . Fbf\LaravelJobs\Job::FULL_TIME . ',' . Fbf\LaravelJobs\Job::PART_TIME,
		'salary_text' => 'max:250',
		'salary_from' => 'numeric',
		'salary_to' => 'numeric',
		'closing_date' => 'date|date_format:Y-m-d',
		'description' => 'required',
		'search_extra' => '',
		'meta_description' => '',
		'meta_keyword' => '',
		'status' => 'required|in:' . Fbf\LaravelJobs\Job::DRAFT . ',' . Fbf\LaravelJobs\Job::APPROVED,
		'published_date' => 'date|date_format:Y-m-d H:i:s',
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'updated_at',
		'direction' => 'desc',
	),



	/**
	 * If provided, this is run to construct the front-end link for your model
	 *
	 * @type function
	 */
	'link' => function($model)
		{
			return $model->getUrl();
		},

);