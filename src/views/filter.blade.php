{{
	Form::open(array(
		'action' => 'Fbf\LaravelJobs\JobsController@index',
		'class' => 'jobs-filter',
		'method' => 'get'
	))
}}

{{ Form::label('type', trans('laravel-jobs::copy.filter.labels.type'), array('class' => 'jobs-type-filter-label')) }}
{{
	Form::select(
		'type',
		array(
			'' => trans('laravel-jobs::copy.types.PERMANENT_OR_TEMPORARY'),
			'PERMANENT' => trans('laravel-jobs::copy.types.PERMANENT'),
			'TEMPORARY' => trans('laravel-jobs::copy.types.TEMPORARY'),
		),
		Input::get('type'),
		array(
			'class' => 'jobs-type-filter'
		)
	)
}}

{{ Form::label('time', trans('laravel-jobs::copy.filter.labels.time'), array('class' => 'jobs-time-filter-label')) }}
{{
	Form::select(
		'time',
		array(
			'' => trans('laravel-jobs::copy.times.FULL_OR_PART_TIME'),
			'FULL_TIME' => trans('laravel-jobs::copy.times.FULL_TIME'),
			'PART_TIME' => trans('laravel-jobs::copy.times.PART_TIME'),
		),
		Input::get('time'),
		array(
			'class' => 'jobs-time-filter'
		)
	)
}}

{{ Form::label('keywords', trans('laravel-jobs::copy.filter.labels.keywords'), array('class' => 'jobs-time-filter-label')) }}
{{
	Form::text(
		'keywords',
		Input::get('keywords'),
		array(
			'class' => 'jobs-filter-keywords'
		)
	)
}}

{{ Form::submit(trans('laravel-jobs::copy.filter.submit')) }}
{{ Form::close() }}