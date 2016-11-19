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
      <div class="panel-body">Panel Content</div>
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

              <!--  <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>-->
           <!-- DELTE ME PLS </div>
        </div>-->
</div>    
    </body>
</html>
