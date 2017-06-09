<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('filmovi', function(Blueprint $table) {
            $table->foreign('id_zanr', 'filmovi_ibfk')
                    ->references('id')
                    ->on('zanr')
                    ->onUpdate('RESTRICT')
                    ->onDelete('RESTRICT');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('filmovi', function(Blueprint $table) {
            $table->dropForeign('filmovi_ibfk');
             });
    }
}
