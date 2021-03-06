@extends('master')
@section('title', 'Svi žanrovi')

@section('content')
<h1>Svi žanrovi</h1>
 <a class="btn btn-small btn-success" href="{{ URL::to('zanr/create') }}">Kreiraj novi žanr</a>

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
<th></th>

        </tr>
    </thead>
    <tbody>
        @foreach($zanr as $key => $value)
        <tr>
            <td>{{ $value->id}}</td>
            <td>{{ $value->naziv }}</td>

            <!-- we will also add new, show, edit, and delete buttons -->
            <td>


                <!-- we will add this later since its a little more complicated than the first two buttons -->
                {{ Form::open(array('url' => 'zanr/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Obrisi ovaj žanr'
                    , array('class' => 'btn btn-warning'
                    ,'id'=>'zanr-del-'.$value->id)) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" id="{{'zanr-' . $value->id}}" href="{{ URL::to('zanr/' . $value->id) }}">Pokaži žanr</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('zanr/' . $value->id . '/edit') }}">Uredi žanr</a>
                
                               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
