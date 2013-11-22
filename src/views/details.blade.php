<div class="job-details-job">

	<h2 class="job-title">
		{{ $job->title }}
	</h2>

	@include('laravel-jobs::attributes')

	<div class="job-desc">
		{{ $job->description }}
	</div>

</div>