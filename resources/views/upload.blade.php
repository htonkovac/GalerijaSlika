@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
        @section('content')

          <!-- Page Content -->
          <div class="container">
                      <div class="col-md-6 col-md-offset-1">

    <div class="row">
          <div class="form-group">
<form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    
     <div class="form-group">
    <label> Select image to upload: </label>
    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
     </div>
    
    <div class="form-check">
    <label class="form-check-label">     <input class="form-check-input" type="checkbox" name="isHidden" value="0"> 
Hidden?</label>
     </div>
    
    <!--<div class="form-check">
    <label class="form-check-label">     <input class="form-check-input" type="checkbox" name="filter" value="Sepia"> 
Filter?</label>
    lightbox modalbox
     </div>-->
    <select name="filter">
        <option value="" selected>No Filter</option>
        <option value="Antique">Antique</option>
        <option value="Blur">Blur</option>
        <option value="Chrome">Chrome</option>
        <option value="Monopin">Monopin</option>
        <option value="Retro">Retro</option>
        <option value="Velvet">Velvet</option>
        <option value="BlackWhite">BlackWhite</option>
        <option value="Boost">Boost</option>
        <option value="Dreamy">Dreamy</option>
        <option value="Sepia">Sepia</option>
        <option value="SynCity">SynCity</option>
</select>
     <div class="form-group">
   <label>  Caption: </label>
    <input  class="form-control" type="text" name="caption">
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>
          </div>
          </div>
          </div>
          @endsection
    </div>
</div>
@endsection
