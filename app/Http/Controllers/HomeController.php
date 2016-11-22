<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    
    public function getUsers()
    {
        //take last five users who uploadedd a photo
       $users = User::select('name','last_uploaded_at')->orderBy('last_uploaded_at','desc')->take(5)->get()->toArray();
       
       //change the array of users to a more managable form and make the data human readable
       foreach($users as &$user) { 
           $user['time']= \Carbon\Carbon::createFromTimeStamp(strtotime($user['last_uploaded_at']))->diffForHumans();
           unset($user['last_uploaded_at']);
       }
       
       
       return view('welcome')->withUsers($users);

    }
}
