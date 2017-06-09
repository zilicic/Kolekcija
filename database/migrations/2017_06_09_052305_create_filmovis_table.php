<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmovisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmovi', function (Blueprint $table) {
            
            $table->increments('id')->unsigned();
            $table->char('naslov', 60);
            $table->integer('id_zanr')->unsigned()->index('id_zanr');
            $table->integer('godina');
            $table->integer('trajanje');
            $table->char('slika');
            $table->timestamps();
      });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmovi');
    }
}
