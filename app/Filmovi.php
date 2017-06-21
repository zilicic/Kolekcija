<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmovi extends Model
{
     protected $table    = 'filmovi';
   
      public  $fillable = [  'naslov',
                             'id_zanr',
                             'godina',
                             'trajanje',
                             'slika'];
    
        

   public function zanr() {
     
   return $this->belongsTo('App\Zanr', 'id_zanr');
   }
    
          
}
