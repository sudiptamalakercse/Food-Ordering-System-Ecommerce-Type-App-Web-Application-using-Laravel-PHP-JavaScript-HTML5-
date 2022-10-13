<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('profile.home_layout.font')
   
    <title>Klassy Cafe - Restaurant HTML Template</title>
   
   
    @include('admin_view.css')

    @include('profile.home_layout.csshome')
    </head>
    
    <body>
 


       
        @yield('home1')

       
  </body>
</html>