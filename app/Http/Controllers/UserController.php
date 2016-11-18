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
        
        $user = Auth::user();
        $filter = isset($request->filter) ? '\\PhpAcademy\Image\Filters\\' . $request->filter . 'Filter' : '';
        
        
        $ext=$request->fileToUpload->extension();
        
        $image= new Image();
        $image->filename=time().".".$ext;
        $image->user_id = $user->id;
        $image->caption = $request->caption;
        $image->visibility = isset($request->isHidden)?$request->isHidden:'1';
            if ($request->hasFile('fileToUpload')) {
                $file = $request->fileToUpload->getPathName();
                
        $path = $request->fileToUpload->storeAs('uploads',$image->filename);

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
         return view('home')->withImages($images);  
        
        
    }
    
    public function manage()
    {
        if(Auth::guest())
        {
            redirect('login');
        }
        
          $images = Image::where('user_id', Auth::user()->id)
               ->get();
        return view('manager')->withImages($images);
    }
}