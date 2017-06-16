@extends('master')
@section('title', 'Kreirajte novi film')

@section('content')
<h1>Dodaj novi film</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ Form::open(array('url' => 'filmovi', 'files' => true)) }}
	
      
	<div class="form-group">
            {{ Form::label('naslov', 'Naslov filma') }}
		{{ Form::text( 'naslov', Input::old('naslov'), array('class' => 'form-control')) }}
	</div>
        <div class="form-group">
	
                	{{ Form::label('id_zanr', 'Žanr') }}
                       {{ Form::select('id_zanr',$zanr), Input::old('id_zanr'),array('class' => 'form-control') }}
         </div>

        <div class="form-group">
		{{ Form::label('godina', 'Godina filma') }}
		{{ Form::number( 'godina', Input::old('godina'), array('class' => 'form-control')) }}
	</div>

         <div class="form-group">
		{{ Form::label('trajanje', 'Trajanje filma') }}
		{{ Form::number( 'trajanje', Input::old('trajanje'), array('class' => 'form-control')) }}
	</div>
               
        <div class="form-group">
                
                {!! Form::label('slika', 'Slika') !!}
             {!! Form::file( 'slika', array('class' => 'form-control')) !!}
        </div>
        

	{{ Form::submit('Dodaj novi film!', array('class' => 'btn btn-primary','id'=>'film-dodaj')) }}

{{ Form::close() }}

@endsection
 