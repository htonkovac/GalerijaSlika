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
        </div>
            <!-- Iterator here-->
            
         @foreach ($images as $image)  
                 <div class="row">

          <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="{{url('images/'.$image->filename)}}" alt="" style="width:400px;height:300px;">
                </a>
            
              </div>
                     <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                         <form>
                             
                               <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    
                   
                               <div class="form-group">
   <label>  Caption: </label>
   <input  class="form-control" type="text" name="caption" value="{{$image->caption}}">
     </div>
                         
        <select name="isHidden">
            <option value="1" @if($image->visibility)selected @endif >Is Visible</option>
        <option value="0" @if(!$image->visibility)selected @endif>Is Hidden</option>
        </select><br><br><br>
                  <button type="submit" class="btn btn-primary">Change settings</button>

                         </form>
                         <br>
                         <br>
                         <br>
                         <form>
                                     <button type="submit" class="btn btn-primary" style="background-color:red">Delete image</button>

                         </form> 
                     </div>
              </div>
         @endforeach
         
        </div>
        @endsection
    </div>
</div>
@endsection
