<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zanr extends Model
{
    protected $table    = 'zanr';
    
     public  $fillable = ['id','naziv'];
    
      public function filmovi(){
        //return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
        return $this->hasMany('App\Filmovi', 'id_zanr', 'id'); 
}
 public function getnazZanrAttribute(){
        // Accessor
        return $this->attributes['naziv'];
    }
     public function setnazZanrAttribute($in){
        // Mutator
        // 
        // BDD
        // - Koristeći http://localhost:8000/zupanija
        // - kada se klikne na uredi županiju
        // - kada se unese MALIM SLOVIMA ime županije
        // - tada pretvori prvo slovo u veliko
        $this->attributes['naziv']=  ucfirst($in);
    }
}