Laravel-Jobs
============

A Laravel 4 package for adding jobs listings to a website

## Features

* Jobs index and detail functionality
* Jobs can be draft or approved
* Jobs can be permanent or temporary and part time or full time
* Flexible configurable way of having salaries associated with a job
* They have a published date that you can set in the future for delayed/scheduled publishing
* Job slugs can be automatically created from the job title
* Control meta description and keywords of job detail pages for SEO purposes
* Uses soft deletes in case you need to retrieve old content
* Configure the rendered views so you can use one in your app rather than the one in the package
* Make use of partials in your own view so you can add extra stuff around the partial

## Comes with a

* Migration for creating the fbf_jobs table
* Model, controller and views (main view and partials)
* Built in configurable routes
* Faker seed to seed your database with loads of good test data

## Installation

Add the following to you composer.json file

    "fbf/laravel-jobs": "dev-master"

Run

    composer update

Add the following to app/config/app.php

    'Fbf\LaravelJobs\LaravelJobsServiceProvider'

Publish the config

    php artisan config:publish fbf/laravel-jobs

Run the migration

    php artisan migrate --package="fbf/laravel-jobs"

Optionally copy the administrator config to your administrators model config directory, if you have one

## Configuration

Coming soon

## Administrator

You can use the excellent Laravel Administrator package by frozennode to administer your jobs.

http://administrator.frozennode.com/docs/installation

A ready-to-use model config file for the Job model (jobs.php) is provided in the src/config/administrator directory of the package, which you can copy into the app/config/administrator directory (or whatever you set as the model_config_path in the administrator config file).

## Faker seed

The package comes with a seed that can populate the table with a whole bunch of sample posts. There are some configuration options for the seed in the config file. To run it:

    php artisan db:seed --class="Fbf\LaravelBlog\PostTableFakeSeeder"