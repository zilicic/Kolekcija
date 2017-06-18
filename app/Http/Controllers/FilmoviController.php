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

class FilmoviController extends Controller
{
 
    public function alphabet() {
   $query="SELECT * FROM filmovi WHERE naslov LIKE '$letter%'or naslov LIKE 'strtolower($letter)%'";
   $statstable= \Illuminate\Support\Facades\DB::select($query);
 
     return Redirect::route('/show');
   
        }
        
                      
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
                     
           $path=request()->file('slika')->store('public/images');
            // store
                 
        $fil = new Filmovi;
         $fil->naslov=Input::get('naslov');
          $fil->id_zanr=Input::get('id_zanr');
          $fil->godina=Input::get('godina');
          $fil->trajanje=Input::get('trajanje');
          $fil->slika = $path;
          //$fil->save();
          
         // try {
        /*
          if (Input::hasFile('slika')) {
            
             $picture_tmp = $_FILES['slika']['tmp_name'];
                  $picture_name = $_FILES['slika']['name'];
                  $picture_type = $_FILES['slika']['type'];
                $picture_basename= basename($_FILES['slika']['name']);
 
                  $allowed_type = array('image/png', 'image/gif', 'images/jpg', 'image/jpeg');

                 if(in_array($picture_type, $allowed_type)) {
                 //$path = storage_path().'/app/public/images/'.$picture_basename; 
                 $path=request()->->store('public/images');
                 
                
                 
                  
                  } else {
                  $error[] = 'File type not allowed';
                    }
                  move_uploaded_file($picture_tmp, $path);
                   
            /*
                     $imageName = $fil->id;
                $imageExtension = $request->slika->getClientOriginalExtension();
                $request->slika->move(storage_path('app/public/images'), $imageName . "." . $imageExtension);
                // RESIZE SLIKE I KREIRANJE THUMBNAILA
                // Get new sizes
                $filename = storage_path('app/public/images') . DIRECTORY_SEPARATOR . $imageName . "." . $imageExtension; //'test.jpg';
                list($width, $height) = getimagesize($filename);
// generate thumbnail
                $newwidth = 100;
                $newheight = $height * ($newwidth / $width);
// Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($filename);
// Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagejpeg($thumb, storage_path('app/public/images') . DIRECTORY_SEPARATOR . 'thumb_' . $imageName . "." . $imageExtension, 75);
           
                $newwidth = 400;
                $newheight = $height * ($newwidth / $width);
// Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($filename);
// Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//Sacuvaj resizanu sliku
                imagejpeg($thumb, storage_path('app/public/images') . DIRECTORY_SEPARATOR . $imageName . "." . $imageExtension, 75);
                
            
            }
                if (file_exists(storage_path('app/public/images' . DIRECTORY_SEPARATOR . $fil->id . ".jpg"))) {
                $fil->slika = 1;
            } else {
                $fil->slika = 0;
            }   
           
           */}
                
          //$fil->slika =$path;
            $fil->save();
          
             
          /* 
          // Ukoliko upload ne odradi javi poruku
            Session::flash('message', 'Film je kreiran ali nije uspio upload slike: ');
            return Redirect::to('filmovi');
*/ 
           Session::flash('message', 'Uspjesno kreiran film!');      
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
         
          $zanr = \App\Zanr::pluck('naziv', 'id');
           
      
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
            $fil = \App\Filmovi::find($id);
             
           $fil->id=Input::get('id');
           $fil->naslov=Input::get('naslov');
          $fil->id_zanr=Input::get('id_zanr');
          $fil->godina=Input::get('godina');
          $fil->trajanje=Input::get('trajanje');
        
           
           
         if (Input::hasFile('slika')) {
              
                /*
                 $picture_tmp = $_FILES['slika']['tmp_name'];
                  $picture_name = $_FILES['slika']['name'];
                  $picture_type = $_FILES['slika']['type'];
                $picture_basename= basename($_FILES['slika']['name']);
 
                  $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

                 if(in_array($picture_type, $allowed_type)) {
                 $path = storage_path().'/app/public/images/'.$picture_basename; 
                  } else {
                  $error[] = 'File type not allowed';
                    }
                  move_uploaded_file($picture_tmp, $path);
               */
                      $imageName = $fil->id;
                $imageExtension = $request->slika->getClientOriginalExtension();
                $request->slika->move(storage_path('app/public/images'), $imageName . "." . $imageExtension);
                // RESIZE SLIKE I KREIRANJE THUMBNAILA
                // Get new sizes
                $filename = storage_path('app/public/images') . DIRECTORY_SEPARATOR . $imageName . "." . $imageExtension; //'test.jpg';
                list($width, $height) = getimagesize($filename);
// generate thumbnail
                                $newwidth = 100;
                $newheight = $height * ($newwidth / $width);
// Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($filename);
// Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagejpeg($thumb, storage_path('app/public/images') . DIRECTORY_SEPARATOR . 'thumb_' . $imageName . "." . $imageExtension, 75);
           
                                $newwidth = 400;
                $newheight = $height * ($newwidth / $width);
// Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($filename);
// Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//Sacuvaj resizanu sliku
                imagejpeg($thumb, storage_path('app/public/images') . DIRECTORY_SEPARATOR . $imageName . "." . $imageExtension, 75);
                
            }
            
                if (file_exists(storage_path('app/public/images' . DIRECTORY_SEPARATOR . $fil->id . ".jpg"))) {
                $fil->slika = 1;
            } else {
                $fil->slika = 0;
            }   
           
          //$fil->slika =$path;
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
       
        try{
        $filename       = storage_path('app/public/images') . DIRECTORY_SEPARATOR. $fil->id . ".jpg"; 
        $filename_thumb = storage_path('app/public/images') . DIRECTORY_SEPARATOR. "thumb_" . $fil->id . ".jpg"; 
        if (file_exists($filename)){
            unlink($filename);
        }
        if (file_exists($filename_thumb)){
            unlink($filename_thumb);
        }
        }
 catch (Exception $e){
           }
            // redirect
        Session::flash('message', 'Film je uspješno obrisan!');
        return Redirect::to('filmovi');
    }
        }