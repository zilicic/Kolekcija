<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ZanrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('zanr')->delete();
        DB::table('zanr')->insert(array(
             Array
        (
            'naziv' => 'Biografski',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        ),
               Array
        (
            'naziv' => 'Animirani',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Povijesni',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Komedija',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Kriminalistički',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Vestern',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Ljubavni',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Mjuzikl',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Drama',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Avanturistički',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Triler',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Znanstvenofantastični',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Horor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
            ,
               Array
        (
            'naziv' => 'Dokumentarni',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
        )
             ));


        Schema::enableForeignKeyConstraints();
    }
}
