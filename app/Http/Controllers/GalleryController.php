<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use File;
use Response;

use Auth;
use App\User;
use App\Image;

/**
 * Description of ImageController
 * 
 *
 * @author Hrvoje Tonkovac
 */
class GalleryController {
    //put your code here
    function showImage($filename)
    {
        $path = storage_path('app/uploads') . '/' . $filename;

        if(!File::exists($path)){ abort(404);}

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }



    public function showGallery($username)
    {
         $user = User::where('name',$username)->first();
        
        if(!$user) {
            abort(404);
        }
        
        if(Auth::guest())
        {
            $images = Image::where('user_id',$user->id)->where('visibility','1')
               ->get();
           // dd(Image::where('user_id',$username));
          return view('home')->withImages($images)->withUsername($username);     
        }
       
        
        
        if(Auth::user()== $user)
        {
            $images = Image::where('user_id', $user->id)
               ->paginate(8);
        } else {
            $images = Image::where('user_id',$user->id)->where('visibility','1')
               ->paginate(8);
        }
         return view('gallery')->withImages($images)->withUsername($username);  
        
        
    }
    
}
