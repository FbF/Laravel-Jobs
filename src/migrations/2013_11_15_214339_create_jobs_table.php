<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fbf_jobs', function(Blueprint $table)
		{
			$table->engine = 'MyISAM'; // means you can't use foreign key constraints
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->string('reference')->nullable();
			$table->string('location')->nullable();
			$table->enum('type', array('PERMANENT', 'TEMPORARY'))->nullable();
			$table->enum('time', array('FULL_TIME', 'PART_TIME'))->nullable();
			$table->string('salary_text')->nullable();
			$table->float('salary_from',10,2)->nullable();
			$table->float('salary_to',10,2)->nullable();
			$table->date('closing_date')->nullable();
			$table->text('description')->nullable();
			$table->text('search_extra')->nullable();
			$table->text('meta_description')->nullable();
			$table->text('meta_keywords')->nullable();
			$table->enum('status', array('DRAFT', 'APPROVED'))->default('DRAFT');
			$table->dateTime('published_date');
			$table->timestamps();
			$table->softDeletes();
		});
		DB::statement('ALTER TABLE fbf_jobs ADD FULLTEXT search(title,description,reference,location,search_extra,meta_description,meta_keywords)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fbf_jobs', function($table) {
			$table->dropIndex('search');
		});
		Schema::drop('fbf_jobs');
	}

}
