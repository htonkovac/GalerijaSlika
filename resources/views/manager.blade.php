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
          
            
        @foreach (array_chunk($images->all(),2) as $row)  
        <div class="row">    
        @foreach($row as $image)

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="{{url('images/thumb_'.$image->filename)}}" alt="" style="width:293px;height:293px;">
            </a>

        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
            <form action="{{ url('/manage') }}" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="imageId" value="{{$image->id}}" />

                <div class="form-group">
                    <label>  Caption: </label>
                    <input  class="form-control" type="text" name="caption" value="{{$image->caption}}">
                </div>

                <label>This image :</label>
                <select name="isHidden">
                    <option value="1" @if($image->visibility)selected @endif >Is Visible</option>
                    <option value="0" @if(!$image->visibility)selected @endif>Is Hidden</option>
                </select>
                <br>
                <br>
                <br>
                    <button type="submit" class="btn btn-primary">Update settings</button>
            </form>
        <br>
        <br>
        <br>
            <form action="{{ url('/manage') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="imageId" value="{{$image->id}}" />
            <input type="hidden" name="deleteme" value="deleteme"/>
            <button type="submit" class="btn btn-primary" style="background-color:red">Delete image</button>
            </form> 
        </div>
        @endforeach
        </div>
        
        @endforeach                      
    {{ $images->links() }}

        </div>
        @endsection
