<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zanr extends Model
{
    protected $table    = 'zanr';
    
     public  $fillable = ['id','naziv'];
    
      public function filmovi(){
      
        return $this->hasMany('App\Filmovi', 'id_zanr', 'id'); 
}
 public function getnazZanrAttribute(){
      
        return $this->attributes['naziv'];
    }
    
}