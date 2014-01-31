<?php namespace Fbf\LaravelJobs;

class JobsTableFakeSeeder extends \Seeder {

	public function run()
	{
		$replace = \Config::get('laravel-jobs::seed.replace');
		if ($replace)
		{
			\DB::table('fbf_jobs')->delete();
		}

		$faker = \Faker\Factory::create();

		$statuses = array(
			Job::DRAFT,
			Job::APPROVED
		);

		$types = array(
			Job::PERMANENT,
			Job::TEMPORARY
		);

		$times = array(
			Job::FULL_TIME,
			Job::PART_TIME
		);

		for ($i = 0; $i < 100; $i++)
		{
			$job = new Job();
			$job->title = $faker->sentence(rand(1, 4));
			if (\Config::get('laravel-jobs::use_reference_field'))
			{
				$job->reference = 'JOB/' . rand(1000, 9999);
			}
			if (\Config::get('laravel-jobs::use_location_field'))
			{
				$job->location = $faker->city();
			}
			if (\Config::get('laravel-jobs::use_type_field'))
			{
				$job->type = $faker->randomElement($types);
			}
			if (\Config::get('laravel-jobs::use_time_field'))
			{
				$job->time = $faker->randomElement($times);
			}
			if (\Config::get('laravel-jobs::use_closing_date_field'))
			{
				$job->closing_date = $faker->dateTimeBetween('-1 week', '+3 months');
			}
			switch (\Config::get('laravel-jobs::salary_field')) {
				case 'text':
					$job->salary_text = $this->salaryText();
					break;
				case 'number':
					$job->salary_from = rand(20000, 200000);
					break;
				case 'range':
					$number1 = rand(20000, 200000);
					$number2 = rand(20000, 200000);
					$job->salary_from = min($number1, $number2);
					$job->salary_to = max($number1, $number2);
					break;
			}
			$job->description = '<p>'.implode('</p><p>', $faker->paragraphs(rand(1, 10))).'</p>';
			$job->meta_description = $faker->paragraph(rand(1, 4));
			$keywords = $faker->words(10, true);
			$job->search_extra = $keywords;
			$job->meta_keywords = $keywords;
			$job->status = $faker->randomElement($statuses);
			$job->published_date = $faker->dateTimeBetween('-6 weeks', '+1 week');
			$job->save();
		}
		echo 'Database seeded' . PHP_EOL;
	}

	protected function salaryText()
	{
		$rand = rand(1,4);
		switch($rand) {
			case 1:
				return 'Negotiable';
				break;

			case 2:
				return 'Competitive';
				break;

			case 3:
				$from = round(rand(20000, 30000), -3);
				$to = round(rand(30000, 200000), -3);
				return '$' . $from . ' - $' . $to;
				break;

			case 4:
				$from = rand(20, 200);
				return 'From $' . $from . 'K';
				break;

		}
	}
}