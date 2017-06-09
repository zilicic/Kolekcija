<!-- app/views/nerds/edit.blade.php -->
@extends('kolekcija')
@section('title', 'Uredi žanr')

@section('content')
<h1>Edit {{ $zanr->id }}</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ Form::model($zanr, array('action' => array('ZanrController@update', $zanr->id), 'method' => 'PUT')) }}


    <div class="form-group">
		{{ Form::label('id', 'Broj organizacijske jedinice') }}
		{{ Form::number( 'id', Input::old('is'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('naziv', 'Ime organizacijske jedinice') }}
		{{ Form::text( 'naziv', Input::old('nazOrgjed'), array('class' => 'form-control')) }}
	</div>
    

	{{ Form::submit('Uredi žanr!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
