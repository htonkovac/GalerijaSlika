@extends('layouts.app')

    @section('content')

          <!-- Page Content -->
<div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">{{ $username }}'s Gallery </h1>
            </div>

            <!-- Iterator here-->
            
         @foreach ($images as $image)  
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail"  href="{{ url('images/'.$image->filename) }}" data-lightbox="mygallery" data-title="{{ $image->caption }}">
                    <img class="img-responsive" src="{{ url('images/'.$image->filename) }}" alt="" style="width:400px;height:300px;">
                </a>
            </div>     
         @endforeach
        
          
          
        </div>
        {{ $images->links() }}
    </div>
    @endsection
