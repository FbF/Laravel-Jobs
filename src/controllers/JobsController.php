<?php namespace Fbf\LaravelJobs;

class JobsController extends \BaseController {

	public function index()
	{
		$query = Job::where('status','=',Job::APPROVED)
			->where('closing_date','>=',\Carbon\Carbon::now())
			->where('published_date','<=',\Carbon\Carbon::now());

		if (\Input::get('type') && in_array(\Input::get('type'), array(Job::PERMANENT, Job::TEMPORARY)))
		{
			$query->where('type','=',\Input::get('type'));
		}

		if (\Input::get('time') && in_array(\Input::get('time'), array(Job::FULL_TIME, Job::PART_TIME)))
		{
			$query->where('type','=',\Input::get('time'));
		}

		if (\Input::get('keywords'))
		{
			$keywords = \Input::get('keywords');
			if (!empty($keywords))
			{
				$query->where('description','like','%'.$keywords.'%');
			}
		}

		$jobs = $query->paginate();
		return \View::make(\Config::get('laravel-jobs::index_view'))->with(compact('jobs'));
	}

	public function view($slug)
	{
		$job = Job::where('status','=',Job::APPROVED)
			->where('closing_date','>=',\Carbon\Carbon::now())
			->where('published_date','<=',\Carbon\Carbon::now())
			->where('slug','=',$slug)
			->first();

		if (!$job)
		{
			\App::abort(404);
		}

		return \View::make(\Config::get('laravel-jobs::view_view'))->with(compact('job'));
	}

}