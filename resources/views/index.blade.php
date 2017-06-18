

@extends('master')
@section('title', 'Details')

@section('content')

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
	<div class="jumbotron text-center progress-bar-striped">
           
		 <p>Broj filmova u bazi:
                     <a><span class="badge">{{ App\Filmovi::all()->count() }}</span></a><br>
                     </p>
                     <p> Broj žanrova u bazi: 
                    <a><span class="badge"> {{ App\Zanr::all()->count() }}</span></a>
		</p>
	</div>

<div class="container center-block">
 <?php
 $alphabet = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
              'K', 'L', 'M', 'N', 'O', 'P','Q','R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z');
         
    foreach ($alphabet as $letter) {
        echo' 
            <ul class="pagination">
		<li><a href=?letter='.$letter.'>'.$letter.'</a></li>
		</ul>
              ';
               }
               ?>
</div>

   
     
@endsection

