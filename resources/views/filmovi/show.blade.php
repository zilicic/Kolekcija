<!-- app/views/nerds/show.blade.php -->

@extends('master')
@section('title', 'Details')

@section('content')
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div><h1>Filmovi: {{ $filmovi->naslov }} 

        <a class="btn btn-small btn-info" href="{{ URL::to('filmovi/' . $filmovi->id . '/edit') }}">
            Uredi ovaj film <span class="glyphicon glyphicon-edit"></span></a></h1></div>

<div class="jumbotron text-center">
        <p>
        <strong>Šifra:</strong> {{ $filmovi->id }}<br>
        <strong>Naslov:</strong> {{$filmovi->naslov }}<br>
          <strong>Žanr:</strong> {{$filmovi->zanr->naziv }}<br>
            <strong>Godina:</strong> {{$filmovi->godina }}<br>
              <strong>Trajanje:</strong> {{$filmovi->trajanje}}<br>
                <strong>Fotografija:</strong> <br>
                
      @if ($filmovi->slika==1)     
     
<p>
  
    <img alt="Film {{$filmovi->naslov}}" width="300" src="{{ Storage::url('images/'.$filmovi->id)}}.jpg" title="Slika {{$filmovi->naslov }}"/>
</p>

  @endif




</div>
</form>
@endsection

