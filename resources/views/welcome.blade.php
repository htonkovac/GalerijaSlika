@extends('layouts.app')

@section('content')
<div class="container">
  <!--  <div class="row">
        <div class="col-md-8 col-md-offset-2">-->
        @section('content')
        
        <div class="container">
                      <div class="col-md-7 col-md-offset-0">
                <img src={{url('/galos-final.png')}}>
                      </div>
                     
                          <div class="row">

           <div class ="col-md-5 col-md-offset-1">
      <div class="panel panel-info">
      <div class="panel-heading">User who recently uploaded a photo:</div>
      <div class="panel-body">
      @foreach($users as $user)
      <a href="{{url($user['name'])}}">{{$user['name']}}</a> <span style="float: right;">{{$user['time']}}</span><br>
      
      @endforeach
      </div>
      </div>
           </div>
            <div class ="col-md-5 col-md-offset-1">
      <div class="panel panel-info">
      <div class="panel-heading">Panel with panel-info class</div>
      <div class="panel-body">Panel Content</div>
      </div>
           </div>
           </div>
       
                     
                @endsection
        </div>
        </div>

@endsection

              
</div>    
    </body>
</html>
