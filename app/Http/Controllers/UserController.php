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
    
    public function uploadImage(Request $request)
    {
        
        $user = Auth::user();
        $filter = ($request->filter!='') ? '\\PhpAcademy\Image\Filters\\' . $request->filter . 'Filter' : '';
        
        
        $ext=$request->fileToUpload->extension();
        
        $image= new Image();
        $image->filename=time().".".$ext;
        $image->user_id = $user->id;
        $image->caption = $request->caption;
        $image->visibility = isset($request->isHidden)?$request->isHidden:'1';
            
        $path = $request->fileToUpload->storeAs('uploads',$image->filename);
        
        //apply filter if necessary
        if($filter){
        $imageman = ImageManager::make(storage_path('app/'.$path));
        $imageman->filter(new $filter());
        $imageman->save();
        }
        
        //if the image is visible update last_uploaded_at column of the users DB
         if($image->visibility) {
         $user->last_uploaded_at=\Carbon\Carbon::now();
         $user->save();
         }
         
         
         $image->save();
         return redirect($user->name);
    }
    
    public function manage()
    {
       
        $images = Image::where('user_id', Auth::user()->id)
                ->get();
        return view('manager')->withImages($images);
    }
    
    public function updateImage(Request $request)
    {
        
        if(isset($request->deleteme))
        {
            Image::destroy($request->imageId);
            return redirect('/manage');
        }
        $image = Image::find($request->imageId);

        $image->visibility=$request->isHidden;
        $image->caption=$request->caption;

        $image->save();
        
            return redirect('/manage');
    }
    
    
}