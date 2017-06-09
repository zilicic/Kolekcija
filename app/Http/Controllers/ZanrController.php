<?php

namespace App\Http\Controllers;
use App\Zanr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Validator;
use Input;
use Redirect;
use View;


class ZanrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $zanr =Zanr::all()->reverse();
        return View::make('zanr.index')
                        ->with('zanr', $zanr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('zanr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $za = new Zanr;
       $za->id=Input::get('id');
        $za->naziv=Input::get('naziv');
            
       
        $za->save();
        
        return Redirect::to('zanr');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $za = Zanr::find($id);
        return View::make('zanr.show')
                        ->with('zanr', $za);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $za = Zanr::find($id);
          return View::make('zanr.edit')
                        ->with('zanr', $za);
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
            'naziv' => 'required',
                 );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('zanr/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            // store
            $za = Zanr::find($id);
                     //----------------
           $za->id=Input::get('id');
            $za->naziv=Input::get('naziv');
           
            //---------
           
           $za->save();
            // redirect
            Session::flash('message', 'Uspjesno uređen žanr!');
            return Redirect::to('zanr');
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
        $za = Zanr::find($id);
       $za->delete();
        // redirect
        Session::flash('message', 'Žanr  uspješno obrisan!');
        return Redirect::to('zanr');
    }
}
