@extends('kolekcija.master')
@section('title', 'Kreirajte novi žanr')

@section('content')
<h1>Dodaj novi žanr</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ Form::open(array('url' => 'zanr')) }}


	<div class="form-group">
		{{ Form::label('id', 'Šifra organizacijske jedinice') }}
		{{ Form::number('id', Input::old('id'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('naziv', 'Naziv organizacijske jedinice') }}
		{{ Form::text('naziv', Input::old('nazOrgjed'), array('class' => 'form-control')) }}
	</div>
        

	{{ Form::submit('Dodaj novi žanr!', array('class' => 'btn btn-primary','id'=>'zanr-dodaj')) }}

{{ Form::close() }}

@endsection
 