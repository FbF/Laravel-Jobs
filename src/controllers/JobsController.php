<?php namespace Fbf\LaravelJobs;

class JobsController extends \BaseController {

	public function index()
	{
		$jobs = Job::where('status','=',Job::APPROVED)
			->where('closing_date','>=',\Carbon\Carbon::today())
			->paginate();
		return \View::make(\Config::get('laravel-jobs::index_view'))->with(compact('jobs'));
	}

	public function view($slug)
	{
		$job = Job::where('status','=',Job::APPROVED)
			->where('closing_date','>=',\Carbon\Carbon::today())
			->where('slug','=',$slug)
			->first();
		if (!$job)
		{
			\App::abort(404);
		}
		return \View::make(\Config::get('laravel-jobs::detail_view'))->with(compact('job'));
	}

}