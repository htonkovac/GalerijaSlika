<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        /*H*/
        $flights = App\Image::where('user_id', $user = Auth::user()->name)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();
        return view('home');
    }
}
