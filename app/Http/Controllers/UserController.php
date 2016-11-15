<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Auth;
class UserController extends Controller
{
    //
    public function uploadForm()
    {
         return view('upload');//, ['user' => User::findOrFail($id)]);
    }
    
    public function upload(Request $request)
    {
        //DB::insert('insert into images (id, name) values (?, ?)', [$_POST['caption'], $_POST['isHidden']]);
        
        $user = Auth::user();
        
        $ext=$request->fileToUpload/*->File*/->extension();
        $image= new Image();
        $image->filename=time().".".$ext;
        $image->user_id = $user->id;
       
            if ($request->hasFile('fileToUpload')) {
            
            $path = $request->fileToUpload->storeAs('uploads',$image->filename);
            //var_dump($path);
        }

         $image->save();
         return redirect('/home');
    }
}
//http://stackoverflow.com/questions/30191330/laravel-5-how-to-access-image-uploaded-in-storage-within-view