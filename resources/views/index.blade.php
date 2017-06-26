

@extends('master')
@section('title', 'Details')

@section('content')

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{!! Form::open(['method'=>'GET','url'=>'kolekcija','class'=>'navbar-form navbar-left','role'=>'letter'])  !!}


	<div class="container text-center glyphicon-align-center">
           
		 <p>Broj filmova u bazi:
                     <a><span class="badge">{{ App\Filmovi::all()->count() }}</span></a><br>
                     </p>
                     <p> Broj žanrova u bazi: 
                    <a><span class="badge"> {{ App\Zanr::all()->count() }}</span></a>
		</p>
	</div>



<div class="container flex-center">

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
        /*       
        if(isset($_GET["letter"]))
      $letter = $_GET['letter'];
        {
        // mysqli_set_charset($conn,"utf8");
            $mysqly= new mysqli('localhost','root','','kolekcija');
            mysqli_set_charset($mysqly,"utf8");
         $query="SELECT * FROM filmovi WHERE naslov LIKE '$letter%'or naslov LIKE 'strtolower($letter)%'";
                   $result= mysqli_query($mysqly, $query);
                      while($row= mysqli_fetch_array($result))
                      {
                    //{{ Storage::url('images/'.$filmovi->id)}}
                                                    
                    ?>
                    <div class="container text-center glyphicon-align-center">
                     <img src="{{ Storage::url('images/'.$row["id"])}}.jpg" alt="Fotografija" style="width:20%">
                    <div class="container">
                        <?php
                        echo '
            <p>'.$row["naslov"].' ('.$row["godina"].')<br/>
                 Trajanje: '.$row["trajanje"].' min</p>
               
                        </div>
                        </a>  
                                         
                    </div>
              
                   ';
        }}*/        
         
               ?>
       
                      
        <table class="table table-bordered table-hover" >
            <thead>
             
                <th>Name</th>
            </thead>
            <tbody>
                @foreach( $naslovi  as $naslov)
                <tr>
                    <td>{{ $naslov->naslov }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
   
        
   {{ Form::close() }}
     
@endsection

