@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @section('content')

          <!-- Page Content -->
          <div class="form-group">
<form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    
    <label> Select image to upload: </label>
    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
    <label> Hidden?</label>
    <input class="form-control" type="checkbox" name="isHidden" value="0"> 
   <label>  Caption: </label>
    <input  class="form-control" type="text" name="caption">
    <input class="form-control" type="submit" value="Upload Image" name="submit">
    
</form>
          </div>
          @endsection
    </div>
</div>
@endsection
