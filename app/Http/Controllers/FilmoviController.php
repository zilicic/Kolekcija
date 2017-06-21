<?php

namespace App\Http\Controllers;
use App\Filmovi;
use App\Zanr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Validator;
use Input;
use Redirect;
use View;
use Storage;


class FilmoviController extends Controller
{
 
    public function alphabet(Request $request) {
      
      $letter = $_GET['letter'];
      $query="SELECT * FROM filmovi WHERE naslov LIKE '$letter%'or naslov LIKE 'strtolower($letter)%'";
      $query = $request->id;
      
                       
                  
    
        }
        
                      
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($broj=5)
    {
       $filmovi =Filmovi::paginate($broj);
       
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
         $zanr = Zanr::pluck('naziv', 'id');
         $filmovi =Filmovi::all()->reverse(); 
        return View::make('filmovi.create')
          ->with(['filmovi'=>$filmovi,'zanr'=>$zanr]);
    }        
        
              
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rules = array(
          // 'id'=> 'required|numeric',
            'naslov' => 'required',
            'id_zanr' => 'required|numeric',
            'godina' => 'required|numeric',
            'trajanje' => 'required|numeric',
            'slika' => 'required'
        );
      
      
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
         
            
            return Redirect::to('filmovi/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else 
            {
                                           
           // store
            //$path=request()->file('slika')->store('public/images');
                 
        $fil = new Filmovi;
         $fil->naslov=Input::get('naslov');
          $fil->id_zanr=Input::get('id_zanr');
          $fil->godina=Input::get('godina');
          $fil->trajanje=Input::get('trajanje');
          $fil->slika = 0;
          $fil->save();
         
          if (Input::hasFile('slika')) {
              
            $imageName = $fil->id;
            //$imageExtension = $request->slika->getClientOriginalExtension();
            $request->slika->move(storage_path('app/public/images'), $imageName . ".jpg" );
          
             
    if (file_exists(storage_path('app/public/images' . DIRECTORY_SEPARATOR . $fil->id .".jpg"))) {
                $fil->slika = 1;
            } else {
                $fil->slika = 0;
            }
          
           }
         $fil->save();  
            
       

           Session::flash('message', 'Uspjesno kreiran film!');      
        return Redirect::to('filmovi');
            
            }
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
       $fil = Filmovi::find($id);
         
          $zanr = Zanr::pluck('naziv', 'id');
           
      
        return View::make('filmovi.edit')
        ->with(['filmovi'=>$fil,'zanr'=>$zanr]);
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
            'id_zanr' => 'required|numeric',
            'godina' => 'required|numeric',
            'trajanje' => 'required|numeric',
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
           //$path=request()->file('slika')->store('public/images');
               
               
            $fil = \App\Filmovi::find($id);
            $fil->id=Input::get('id');
            $fil->naslov=Input::get('naslov');
            $fil->id_zanr=Input::get('id_zanr');
            $fil->godina=Input::get('godina');
            $fil->trajanje=Input::get('trajanje');
            //$fil->slika =$path;
      if (Input::hasFile('slika')) {
              
            $imageName = $fil->id;
           // $imageExtension = $request->slika->getClientOriginalExtension();
            $request->slika->move(storage_path('app/public/images'), $imageName . ".jpg");
       
             
    if (file_exists(storage_path('app/public/images' . DIRECTORY_SEPARATOR . $fil->id .".jpg" ))) {
                $fil->slika = 1;
            } else {
                $fil->slika = 0;
            }
          
           }
           
          
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
        $fil = Filmovi::find($id);
       $fil->delete();
       //Storage::delete('public/images/slika');
       
        $filename       = storage_path('app/public/images') . DIRECTORY_SEPARATOR. $fil->id . ".jpg"; 
       
        if (file_exists($filename)){
            unlink($filename);
        }
        
        
                   // redirect
        Session::flash('message', 'Film je uspješno obrisan!');
        return Redirect::to('filmovi');
    }
        }