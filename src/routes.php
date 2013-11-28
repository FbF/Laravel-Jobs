<?php

Route::get(
	Config::get('laravel-jobs::uri'),
	'Fbf\LaravelJobs\JobsController@index'
);

Route::get(
	Config::get('laravel-jobs::uri').'/{slug}',
	'Fbf\LaravelJobs\JobsController@view'
);

Route::get(
	Config::get('laravel-jobs::uri').'/{slug?}/apply',
	'Fbf\LaravelJobs\JobsController@applicationForm'
);

Route::post(
	Config::get('laravel-jobs::uri').'/{slug?}/apply',
	array(
		'before' => 'csrf',
		'uses' => 'Fbf\LaravelJobs\JobsController@apply'
	)
);