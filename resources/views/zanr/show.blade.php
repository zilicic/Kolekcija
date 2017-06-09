<!-- app/views/nerds/show.blade.php -->

@extends('kolekcija')
@section('title', 'Details')

@section('content')
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div><h1>Organizacijska jedinica: {{ $zanr->naziv }} 

        <a class="btn btn-small btn-info" href="{{ URL::to('zanr/' . $zanr->id . '/edit') }}">Uredi ovaj žanr <span class="glyphicon glyphicon-edit"></span></a></h1></div>

<div class="jumbotron text-center">
    <h2> Žanr: {{ $zanr->naziv }} </h2>
    <p>
        <strong>Šifra:</strong> {{ $zanr->id }}<br>
        <strong>Naziv:</strong> {{$zanr->naziv }}<br>
            </p>

</div>


@endsection

