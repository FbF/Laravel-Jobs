@foreach ($jobs as $job)

	<div class="job">

		<h2 class="job-title"><a href="{{ $job->getUrl() }}">{{ $job->title }}</a></h2>

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
					&pound;{{ $job->salary_from }}
				</p>
			@elseif (Config::get('laravel-jobs::salary_field') == 'range')
				<p class="job-attribute job-salary">
					<span>{{ trans('laravel-jobs::copy.attributes.salary') }}</span>
					&pound;{{ $job->salary_from }} to &pound;{{ $job->salary_to }}
				</p>
			@endif

		</div>

		<div class="job-desc-snippet">
			{{ HtmlTruncator\Truncator::truncate($job->description, 30) }}
		</div>

		<div class="job-link">
			<a href="{{ $job->getUrl() }}">{{ trans('laravel-jobs::copy.misc.read_more') }}</a>
		</div>

	</div>
@endforeach