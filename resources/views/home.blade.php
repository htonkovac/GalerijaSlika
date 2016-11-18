@extends('layouts.app')

@section('content')
<div class="container">
  <!--  <div class="row">
        <div class="col-md-8 col-md-offset-2">-->
        @section('content')

          <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Moja Galerija </h1>
            </div>

            <!-- Iterator here-->
            
         @foreach ($images as $image)  
          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="{{url('images/'.$image->filename)}}" alt="" style="width:400px;height:300px;">
                </a>
            </div>     
         @endforeach
         
        </div>
        @endsection
    </div>
</div>
@endsection
