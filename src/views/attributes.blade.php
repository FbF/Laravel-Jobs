<div class=""job-attributes">

	@if (Config::get('laravel-jobs::use_reference_field'))
		<p class="job-attribute job-reference">
			<span>{{ trans('laravel-jobs::copy.attributes.reference') }}</span>
			{{ $job->reference }}
		</p>
	@endif

	@if (Config::get('laravel-jobs::use_location_field'))
		<p class="job-attribute job-location">
			<span>{{ trans('laravel-jobs::copy.attributes.location') }}</span>
			{{ $job->location }}
		</p>
	@endif

	@if (Config::get('laravel-jobs::use_type_field'))
		<p class="job-attribute job-type">
			<span>{{ trans('laravel-jobs::copy.attributes.type') }}</span>
			{{ trans('laravel-jobs::copy.types.'.$job->type) }}
		</p>
	@endif

	@if (Config::get('laravel-jobs::use_time_field'))
		<p class="job-attribute job-time">
			<span>{{ trans('laravel-jobs::copy.attributes.time') }}</span>
			{{ trans('laravel-jobs::copy.times.'.$job->time) }}
		</p>
	@endif

	@if (Config::get('laravel-jobs::salary_field') == 'text')
		<p class="job-attribute job-salary">
			<span>{{ trans('laravel-jobs::copy.attributes.salary') }}</span>
			{{ $job->salary_text }}
		</p>
	@elseif (Config::get('laravel-jobs::salary_field') == 'number')
		<p class="job-attribute job-salary">
			<span>{{ trans('laravel-jobs::copy.attributes.salary') }}</span>
			{{ trans('laravel-jobs::copy.salary.string', array('number' => number_format($job->salary_from, trans('laravel-jobs::copy.salary.decimals'), trans('laravel-jobs::copy.salary.dec_point'), trans('laravel-jobs::copy.salary.thousands_sep')))) }}
		</p>
	@elseif (Config::get('laravel-jobs::salary_field') == 'range')
		<p class="job-attribute job-salary">
			<span>{{ trans('laravel-jobs::copy.attributes.salary') }}</span>
			{{ trans('laravel-jobs::copy.salary.string', array('number' => number_format($job->salary_from, trans('laravel-jobs::copy.salary.decimals'), trans('laravel-jobs::copy.salary.dec_point'), trans('laravel-jobs::copy.salary.thousands_sep')))) }}
			to
			{{ trans('laravel-jobs::copy.salary.string', array('number' => number_format($job->salary_to, trans('laravel-jobs::copy.salary.decimals'), trans('laravel-jobs::copy.salary.dec_point'), trans('laravel-jobs::copy.salary.thousands_sep')))) }}
		</p>
	@endif

</div>