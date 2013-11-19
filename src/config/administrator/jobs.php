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
			'visible' => function ($model)
			{
				return Config::get('laravel-jobs::use_type_field');
			}
		),
		'time' => array(
			'title' => 'Part/full time',
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
		'status' => array(
			'title' => 'Status',
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
			'title' => 'Salary',
			'type' => 'text',
			'visible' => function ($model)
			{
				return Config::get('laravel-jobs::salary') == 'text';
			}
		),
		'salary_from' => array(
			'title' => 'Salary (from)',
			'type' => 'number',
			'visible' => function ($model)
			{
				return Config::get('laravel-jobs::salary') == 'number' || Config::get('laravel-jobs::salary') == 'range';
			}
		),
		'salary_to' => array(
			'title' => 'Salary (to)',
			'type' => 'number',
			'visible' => function ($model)
			{
				return Config::get('laravel-jobs::salary') == 'range';
			}
		),
		'description' => array(
			'title' => 'Job description',
			'type' => 'wysiwyg',
		),
		'meta_description' => array(
			'title' => 'Meta Description',
			'type' => 'textarea',
		),
		'meta_keywords' => array(
			'title' => 'Meta Keywords',
			'type' => 'textarea',
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
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelJobs\Job::DRAFT => 'Draft',
				Fbf\LaravelJobs\Job::APPROVED => 'Approved',
			),
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
		'description' => array(
			'type' => 'text',
			'title' => 'Description',
		),
		'closing_date' => array(
			'type' => 'date',
			'title' => 'Closing date',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelJobs\Job::DRAFT => 'Draft',
				Fbf\LaravelJobs\Job::APPROVED => 'Approved',
			),
		),
	),

	'rules' => array(
		'title' => 'required|max:250',
		'slug' => 'max:250|alpha_dash|unique:fbf_jobs',
		'reference' => 'max:250',
		'location' => 'max:250',
		'type' => 'in:' . Fbf\LaravelJobs\Job::PERMANENT . ',' . Fbf\LaravelJobs\Job::TEMPORARY,
		'time' => 'in:' . Fbf\LaravelJobs\Job::FULL_TIME . ',' . Fbf\LaravelJobs\Job::PART_TIME,
		// 'salary_text' => '',
		'salary_from' => 'number',
		'salary_to' => 'number',
		'description' => 'required',
		// 'meta_description' => '',
		// 'meta_keywords' => '',,
		'closing_date' => 'date|date_format:Y-m-d',
		'status' => 'required',
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
		return URL::action('Fbf\LaravelJobs\JobsController@view', array('slug' => $model->slug));
	},

);