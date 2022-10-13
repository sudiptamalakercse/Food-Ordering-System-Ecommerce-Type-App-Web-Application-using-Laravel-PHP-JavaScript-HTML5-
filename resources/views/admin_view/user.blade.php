<x-app-layout>
    
</x-app-layout>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Corona Admin</title>
 @include('admin_view.css')


 <style>
     .p{
         position: absolute;
         top:149px;
         left:35%;
         
     }
     .c{
         font-size: 23px;
     }
 </style>
  </head>
  <body>




    
  @include('admin_view.body')


<div class="container p">

    <div class="row">
        <div class="col-lg-10">
            <table class="table table-striped ">
                <thead>
                  <tr class="table-light c">
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">Mobile Number</th>
                  </tr>
                </thead>
                <tbody id="tb">
                
                   
                 
                </tbody>
              </table>
                  
        </div>
       
    </div>
</div>

  
  @include('admin_view.js')
  </body>
  <script src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.11.3/af-2.3.7/b-2.1.1/datatables.min.js"></script>
  <script src="{{ asset('/assets/js/script.js') }}"></script>
</html>