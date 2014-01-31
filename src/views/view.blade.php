@extends('layouts.master')

@section('title')
	{{ $job->title }}
@endsection

@section('meta_description')
	{{ $job->meta_description }}
@endsection

@section('meta_keywords')
	{{ $job->meta_keywords }}
@endsection

@section('content')
	@include('laravel-jobs::filter')
	@include('laravel-jobs::details')
@stop