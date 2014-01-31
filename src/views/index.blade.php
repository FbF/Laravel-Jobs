@extends('layouts.master')

@section('title')
	{{ Config::get('laravel-jobs::index_page_title') }}
@endsection

@section('meta_description')
	{{ Config::get('laravel-jobs::index_page_meta_description') }}
@endsection

@section('meta_keywords')
	{{ Config::get('laravel-jobs::index_page_meta_keywords') }}
@endsection

@section('content')
	@include ('laravel-jobs::filter')
	@include ('laravel-jobs::list')
@stop