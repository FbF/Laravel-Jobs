@if (!$jobs->isEmpty())

	@foreach ($jobs as $job)

		<div class="jobs-list-job">

			<h2 class="job-title">
				<a href="{{ $job->getUrl() }}">
					{{ $job->title }}
				</a>
			</h2>

			@include('laravel-jobs::attributes')

			<div class="job-desc-snippet">
				{{ HtmlTruncator\Truncator::truncate($job->description, 30) }}
			</div>

			<div class="job-link">
				<a href="{{ $job->getUrl() }}">{{ trans('laravel-jobs::copy.misc.read_more') }}</a>
			</div>

		</div>

	@endforeach

	{{ $jobs->links() }}

@else

	<p class="no-matching-jobs">{{ trans('laravel-jobs::copy.misc.no_matching_jobs') }}</p>

@endif