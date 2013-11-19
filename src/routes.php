<?php

Route::get(
	Config::get('laravel-jobs::uri'),
	'Fbf\LaravelJobs\JobsController@index'
);

Route::get(
	Config::get('laravel-jobs::uri/{slug}'),
	'Fbf\LaravelJobs\JobsController@view'
);