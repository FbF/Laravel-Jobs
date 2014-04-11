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
			$query->where('time','=',\Input::get('time'));
		}

		if (\Input::get('keywords'))
		{
			$keywords = \Input::get('keywords');
			if (!empty($keywords))
			{
				$query->whereRaw("MATCH(title,description,reference,location,search_extra,meta_description,meta_keywords) AGAINST(? IN BOOLEAN MODE)", array($keywords));
			}
		}

		$query->orderby('published_date', \Config::get('laravel-jobs::index_order'));

		$jobs = $query->paginate(\Config::get('laravel-jobs::results_per_page'));
		return \View::make(\Config::get('laravel-jobs::index_view'))->with(compact('jobs'));
	}

	public function view($slug)
	{
		$job = Job::findBySlug($slug);

		if (!$job)
		{
			\App::abort(404);
		}

		return \View::make(\Config::get('laravel-jobs::view_view'))->with(compact('job'));
	}

	public function applicationForm($slug = null)
	{
		if (\Config::get('laravel-jobs::apply') == false)
		{
			\App::abort(404);
		}

		$job = false;
		if (!is_null($slug))
		{
			$job = Job::findBySlug($slug);

			if (!$job)
			{
				\App::abort(404);
			}
		}

		return \View::make(\Config::get('laravel-jobs::application_view'))->with(compact('job'));
	}

	public function apply()
	{
		if (\Config::get('laravel-jobs::apply') == false)
		{
			\App::abort(404);
		}

		$rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'mimes:' . \Config::get('laravel-jobs::cv_allowed_mimes'),
        );

        $validator = \Validator::make(\Input::all(), $rules, \Lang::get('laravel-jobs::copy.validation'));

        $validator->sometimes('cv', 'required', function($input)
		{
		    return \Config::get('laravel-jobs::is_cv_required');
		});

        $validator->sometimes('letter', 'required', function($input)
		{
		    return \Config::get('laravel-jobs::is_covering_letter_required');
		});

        if ($validator->fails())
        {
            if (\Request::ajax())
            {
                $messages = $validator->messages();
                return \Response::JSON(array('messages' => $messages), 400);
            }
            return \Redirect::to(\Input::get('from'))->withInput()->withErrors($validator);
        }

        \Mail::send(\Config::get('laravel-jobs::mail.views'), \Input::all(), function($message)
        {
            $message->to(\Config::get('laravel-jobs::mail.to.email'), \Config::get('laravel-jobs::mail.to.name'))->subject(\Config::get('laravel-jobs::mail.subject'));
            if (\Input::hasFile('cv'))
			{
	            $message->attach(
	            	\Input::file('cv')->getRealPath(),
	            	array(
	            		'as' => \Input::file('cv')->getClientOriginalName(),
	            		'mime' => \Input::file('cv')->getMimeType()
            		)
        		);
			}
        });

        return \Redirect::to(\Input::get('from'))->with('thanks_message', \Lang::get('laravel-jobs::copy.misc.sent_message'));
	}

}