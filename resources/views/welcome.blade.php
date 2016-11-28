@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7 col-md-offset-0">
        <img src={{url('/galos-final.png')}}>
    </div>
        <br>

    <div class="row">

       <div class ="col-md-5 col-md-offset-2">
            <div class="panel panel-info">
            <div class="panel-heading">User who recently uploaded a photo:</div>
            <div class="panel-body">
        @foreach($users as $user)
            <a href="{{url($user['name'])}}">{{$user['name']}}</a> <span style="float: right;">{{$user['time']}}</span><br>

        @endforeach
            </div>
            </div>
       </div>
        
   </div>

</div>

        @endsection
