@extends('layouts.app')

    @section('content')

          <!-- Page Content -->
<div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">{{ $username }}'s Gallery </h1>
            </div>

            <!-- Iterator here-->
            <!-- IMAGE NEEDS TO PASS id to -->
         @foreach ($images as $image)  
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail"  href="{{ url('images/'.$image->filename) }}" data-lightbox="mygallery" data-title="{{ $image->caption }}">
                    <img class="img-responsive" src="{{ url('images/thumb_'.$image->filename) }}" alt="" style="width:293px;height:293px;">
                </a>
                <form action="{{url(like/{{image['id'])}}}}"><button id="like" class="btn btn-primary">LAJKUJ</button></form> <span id="like" style="float: right;">50 lajkova</span>
            </div>     
         @endforeach
        
          
          
        </div>
        {{ $images->links() }}
    </div>
    @endsection
