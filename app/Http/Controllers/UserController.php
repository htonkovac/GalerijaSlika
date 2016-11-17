<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Auth;
use App\User;
//Za slike

use Intervention\Image\ImageManagerStatic as ImageManager;
use PhpAcademy\Image\Filters; 

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function uploadForm()
    {
         return view('upload');//, ['user' => User::findOrFail($id)]);
    }
    
    public function upload(Request $request)
    {
        //DB::insert('insert into images (id, name) values (?, ?)', [$_POST['caption'], $_POST['isHidden']]);
        
        $user = Auth::user();
        $filter = isset($request->filter) ? '\\PhpAcademy\Image\Filters\\' . $request->filter . 'Filter' : '';
        
        //var_dump($filter); exit;
        
        $ext=$request->fileToUpload/*->File*/->extension();
        
        $image= new Image();
        $image->filename=time().".".$ext;
        $image->user_id = $user->id;
        $image->visibility = isset($request->isHidden)?$request->isHidden:'1';
            if ($request->hasFile('fileToUpload')) {
                $file = $request->fileToUpload->getPathName();
//var_dump($file->getPathName()); exit;
                
        $path = $request->fileToUpload->storeAs('uploads',$image->filename);

        //var_dump($path); exit;
        if($filter){
        $imageman = ImageManager::make(storage_path('app/'.$path));
        $imageman->filter(new $filter());
        $imageman->save();
        }
        
        }

         $image->save();
         return redirect('/home');
    }
    
    public function show($username)
    {
        $user = User::where('name',$username)->first();
        
        if(!$user) {
            abort(404);
        }
        
        if(Auth::user()== $user)
        {
            $images = Image::where('user_id', $user->id)
               ->get();
        } else {
            $images = Image::where('user_id',$user->id)->where('visibility','1')
               ->get();
        }
       // dd($images);exit;
         return view('home')->withImages($images);  
        
        
    }
}
//http://stackoverflow.com/questions/30191330/laravel-5-how-to-access-image-uploaded-in-storage-within-view