<?php

namespace App\Http\Controllers;
use App\Filmovi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Validator;
use Input;
use Redirect;
use View;

class FilmoviController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmovi =Filmovi::all()->reverse();
        return View::make('filmovi.index')
                        ->with('filmovi', $filmovi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return View::make('filmovi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $fil = new \App\Filmovi;
          $fil->id=Input::get('id');
          $fil->naslov=Input::get('naslov');
          $fil->id_zanr=Input::get('id_zanr');
          $fil->godina=Input::get('godina');
          $fil->trajanje=Input::get('trajanje');
          $fil->slika=Input::get('slika');
       
        $fil->save();
        
        return Redirect::to('filmovi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $fil = \App\Filmovi::find($id);
        return View::make('filmovi.show')
                        ->with('filmovi', $fil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $fil = \App\Filmovi::find($id);
          return View::make('filmovi.edit')
                        ->with('filmovi', $fil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'id'=> 'required|numeric',
            'naslov' => 'required',
            'id_zanr' => 'required',
            'godina' => 'required',
            'trajanje' => 'required',
            'slika' => 'required',
                 );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('filmovi/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            // store
            $fil = \App\Filmovi::find($id);
                     //----------------
           $fil->id=Input::get('id');
           $fil->naslov=Input::get('naslov');
          $fil->id_zanr=Input::get('id_zanr');
          $fil->godina=Input::get('godina');
          $fil->trajanje=Input::get('trajanje');
          $fil->slika=Input::get('slika');
           
            //---------
           
           $fil->save();
            // redirect
            Session::flash('message', 'Film je uspješno uređen!');
            return Redirect::to('filmovi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fil = \App\Filmovi::find($id);
       $fil->delete();
        // redirect
        Session::flash('message', 'Film je uspješno obrisan!');
        return Redirect::to('filmovi');
    }
}
