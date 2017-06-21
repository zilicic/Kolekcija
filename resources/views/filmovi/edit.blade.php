<!-- app/views/nerds/edit.blade.php -->
@extends('master')
@section('title', 'Uredi film')

@section('content')
<h1>Uredi film: {{ $filmovi->naslov }}</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{!! Form::model($filmovi, array('action' => array('FilmoviController@update', $filmovi->id), 'method' => 'PUT', 'files' => true)) !!}

    <div class="form-group">
		{{ Form::label('id', 'Šifra filma') }}
		{{ Form::number( 'id', Input::old('id'), array('class' => 'form-control','readonly' => 'true')) }}
	</div>
	<div class="form-group">
		{{ Form::label('naslov', 'Naslov filma') }}
		{{ Form::text( 'naslov', Input::old('naslov'), array('class' => 'form-control')) }}
	</div>
        <div class="form-group">
	
                	{{ Form::label('id_zanr', 'Žanr') }}
                        
                      {{ Form::select('id_zanr', $zanr), Input::old('id_zanr'), array('class' => 'form-control') }}
               
              	</div>

        <div class="form-group">
		{{ Form::label('godina', 'Godina filma') }}
		
                {{ Form::selectYear('godina',\Carbon\Carbon::now()->toDateTimeString(), 1900) }}
	</div>

         <div class="form-group">
		{{ Form::label('trajanje', 'Trajanje filma') }}
		{{ Form::number( 'trajanje', Input::old('trajane'), array('class' => 'form-control')) }}
	</div>
        
        <div class="form-group">
                 {!! Form::label('slika', 'Slika') !!}
                 {!! Form::file( 'slika', Input::old('slika'), array('class' => 'form-control')) !!}
        </div>
	
        {!! Form::submit('Uredi film!', array('class' => 'btn btn-primary','name'=>'Uredi film')) !!}

{{ Form::close() }}
        @if ($filmovi->slika==1)     
     
<p>
  
    <img alt="Film {{$filmovi->naslov}}" width="300" src="{{ Storage::url('images/'.$filmovi->id)}}.jpg" title="Slika {{$filmovi->naslov }}"/>
</p>

  @endif

@endsection

                
               