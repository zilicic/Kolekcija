@extends('master')
@section('title', 'Svi filmovi')

@section('content')
<h1>Svi filmovi</h1>
<a class="btn btn-small btn-success"href="{{ URL::to('filmovi/create') }}">Kreiraj novi film</a>

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naslov</th>
             <th>Žanr</th>
              <th>Godina</th>
               <th>Trajanje</th>
                <th>Fotografija</th>
                      
        <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach($filmovi as $key => $value)
        <tr>
            <td>{{ $value->id}}</td>
            <td>{{ $value->naslov }}</td>

            <!-- we will also add new, show, edit, and delete buttons -->
            <td>


                <!-- we will add this later since its a little more complicated than the first two buttons -->
                {{ Form::open(array('url' => 'filmovi/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Obrisi ovaj film'
                    , array('class' => 'btn btn-warning'
                    ,'id'=>'filmovi-del-'.$value->id)) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" id="{{'filmovi-' . $value->id}}" href="{{ URL::to('filmovi/' . $value->id) }}">Pokaži film</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('filmovi/' . $value->id . '/edit') }}">Uredi film</a>
                
                 <!-- new  (uses the create method) -->
                <a class="btn btn-small btn-success" href="{{ URL::to('filmovi/create') }}">Kreiraj novi film</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
