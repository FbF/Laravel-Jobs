<?php namespace Fbf\LaravelJobs;

class Job extends \Eloquent {

	const DRAFT = 'DRAFT';
	const APPROVED = 'APPROVED';
	const PERMANENT = 'PERMANENT';
	const TEMPORARY = 'TEMPORARY';
	const FULL_TIME = 'FULL_TIME';
	const PART_TIME = 'PART_TIME';

	protected $table = 'fbf_jobs';

	protected $softDelete = true;

	public static $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
        'separator' => '-',
        'unique' => true,
        'include_trashed' => true,
    );

	/**
	 * Returns the url of the job
	 * @return mixed
	 */
	public function getUrl()
	{
		return \URL::action('Fbf\LaravelJobs\JobsController@view', array('slug' => $this->slug));
	}

	/**
	 * Returns a live job by slug
	 * @param  string $slug The slug of the job to find
	 * @return Job Instance of Fbf\LaravelJobs\Job
	 */
	public static function findBySlug($slug)
	{
		return self::where('status','=',Job::APPROVED)
			->where('closing_date','>=',\Carbon\Carbon::now())
			->where('published_date','<=',\Carbon\Carbon::now())
			->where('slug','=',$slug)
			->first();
	}

}