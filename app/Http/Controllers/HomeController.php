<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //var_dump(  \Auth::user()  );  exit;
        
        $images = Image::where('user_id', $user = Auth::user()->id)
               ->get();
     
       // dd($images);exit;
         return view('home')->withImages($images);   
    }
}
