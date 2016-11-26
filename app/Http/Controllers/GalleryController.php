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
use App\Like;
use Illuminate\Http\Request;

/**
 * Description of ImageController
 * 
 *
 * @author Hrvoje Tonkovac
 */
class GalleryController {

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

        if(Auth::user()== $user)
        {
            $images = Image::where('user_id', $user->id)
               ->paginate(8);
        } else {
            $images = Image::where('user_id',$user->id)->where('visibility','1')
               ->paginate(8);
        }
        //dd($images);
         return view('gallery')->withImages($images)->withUsername($username);  
        
        
    }
    
    public function search(Request $request)
    {
        
        

     $request = $request->input('query');
        
        $images = Image::where('visibility','=','1')->where('caption','like','%'.$request.'%')
                ->select('filename','caption','user_id')->get()->toArray();
 

       foreach($images as &$image)
        {

          $name = User::where('id','=',$image['user_id'])->firstOrFail()->name;
          $image['name']=$name;
          unset($image['user_id']);
        }
              
        return view('searchResults')->withImages($images);
    }
    
    public function likeImage($imgId)
    {
        
        $user = Auth::user(); 
        if(!Auth::user())
        {
            return redirect('login');
        } else {
            $userId = $user->id;
        }
     
        $like =Like::where('user_id','=',$userId)->where('image_id','=',$imgId);
        
        if($like->count()) {
            $like->first()->delete();
            } else {
           Like::create(['user_id'=>$userId,'image_id'=>$imgId]);
        }
        
        return \Redirect::back();
    }
    
}
