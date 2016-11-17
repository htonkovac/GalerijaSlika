@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @section('content')

          <!-- Page Content -->
          <div class="container">
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
    
     <div class="form-group">
   <label>  Caption: </label>
    <input  class="form-control" type="text" name="caption">
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>
    </div>
          </div>
          @endsection
    </div>
</div>
@endsection
