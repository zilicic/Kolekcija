<!-- app/views/fakultet.blade.php -->

@extends('kolekcija')
@section('title', 'Details')

@section('content')
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Kolekcija Filmova!</h1>

	<div class="jumbotron text-center">
		<h2>{{$_ENV['APP_URL']}}</h2>
		<p>
			
		</p>
	</div>

@endsection

