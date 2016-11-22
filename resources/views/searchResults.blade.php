@extends('layouts.app')

    @section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Gallery Manager </h1>
            </div>
        </div>
            <!-- Iterator here-->
          
            
        @foreach (array_chunk($images,2) as $row)  
        <div class="row"> 
        @foreach($row as $image)

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="{{url('images/thumb_'.$image['filename'])}}" alt="" style="width:293px;height:293px;">
            </a>
               
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
            
            <h4> {{$image['caption']}}</h4>
            <a href="{{url($image['name'])}}">{{$image['name']}}'s profile</a>
        </div>
        @endforeach
        </div>
    
        
        @endforeach                      
   <!-- $images->links() -->

        </div>
        @endsection
