@extends('layouts.app')

    @section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Search results: sorted by number of likes </h1>
            </div>
        </div>
            <!-- Iterator here-->
          
            
        @foreach ($images->chunk(2) as $row)  
        <div class="row"> 
        @foreach($row as $image)

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="{{url('images/thumb_'.$image->filename)}}" alt="" style="width:293px;height:293px;">
            </a>
               <form action="{{url('like/'.$image->id)}}" ><button id="like" class="btn btn-primary">{{$image->didAuthLike()}}LIKE</button></form> <span id="like" style="float: right;">{{$image->numberOfLikes()}} likes</span>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
            
            <h4> {{$image->caption}}</h4>
            <a href="{{url($image->getUsername())}}">{{$image->getUsername()}}'s profile</a>
        </div>
        @endforeach
        </div>
    
        
        @endforeach                     


        </div>
        @endsection
