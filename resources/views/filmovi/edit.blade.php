<!-- app/views/nerds/edit.blade.php -->
@extends('master')
@section('title', 'Uredi žanr')

@section('content')
<h1>Uredi šifru: {{ $zanr->id }}</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ Form::model($zanr, array('action' => array('ZanrController@update', $zanr->id), 'method' => 'PUT')) }}


    <div class="form-group">
		{{ Form::label('id', 'Šifra žanra') }}
		{{ Form::number( 'id', Input::old('id'), array('class' => 'form-control','readonly' => 'true')) }}
	</div>
	<div class="form-group">
		{{ Form::label('naziv', 'Naziv žanra') }}
		{{ Form::text( 'naziv', Input::old('naziv'), array('class' => 'form-control')) }}
	</div>
    

	{{ Form::submit('Uredi žanr!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection