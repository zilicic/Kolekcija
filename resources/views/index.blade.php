<!-- app/views/fakultet.blade.php -->

@extends('master')
@section('title', 'Details')

@section('content')
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Kolekcija Filmova!</h1>

	<div class="jumbotron text-center">
           
		 <p>
                    <a href="{{ URL::to('filmovi') }}">Filmovi<span class="badge"> {{ App\Filmovi::all()->count() }}</span></a><br>
                    <a href="{{ URL::to('zanr') }}">Žanrovi<span class="badge"> {{ App\Zanr::all()->count() }}</span></a>
		</p>
	</div>

@endsection

