<div class="job-details-job">

	<h2 class="job-title">
		{{ $job->title }}
	</h2>

	@include('laravel-jobs::attributes')

	<a href="{{ action('Fbf\LaravelJobs\JobsController@applicationForm', array('slug' => $job->slug)) }}" class="jobs--apply">
		{{ trans('laravel-jobs::copy.misc.apply') }}
	</a>

	<div class="job-desc">
		{{ $job->description }}
	</div>

</div>