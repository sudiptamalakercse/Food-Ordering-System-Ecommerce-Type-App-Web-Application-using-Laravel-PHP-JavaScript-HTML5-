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
    <link rel="stylesheet" href="{{ asset('/icon_css/all.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.11.3/af-2.3.7/b-2.1.1/datatables.min.css"/>
 

 @include('admin_view.css')

 <style>
  .p{
      position: absolute;
      top:149px;
      left:35%;
      
  }
  .sorting{
    font-size: 16px !important;
    color: #fff !important;
  }
  .c{
      font-size: 23px;
  }
  i{
    font-size: 23px;
  }
 #name,#price{
  font-size: 23px;
  color: #fff;
  }
  #des{
    font-size: 23px;
  color: #000;
  }
  #des1{
    font-size: 23px;
  color: #000;
  }
</style>
 
  </head>
  <body>


    <div class="p">
     
      
	<div class="wrap-table shadow">
		<div class="card">
			<div class="card-body">
				<a  data-toggle="modal" href="#modi">Add New Food</a>
				<h2>All Foods</h2>
				<table id="t" class="table table-striped v">
					<thead >


						<tr >
							<th>#</th>
							<th>title</th>
							
							<th>price</th>
							<th>decription</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="th">

						@foreach ($all_data as $sex )
						<tr>
							<td>{{ $loop->index+1 }}</td>
							<td>{{ $sex->title}}</td>
						
							<td>{{ $sex->price }}</td>
							<td>{{ $sex->description }}</td>
							<td><img src="{{ asset( $sex->photo ) }}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info t2" href="#">View</a>
         
								<a class="btn btn-sm btn-warning t" value="{{ $sex->id }} " id="edit" data-toggle="modal"  href="#mode">Edit</a>
								<a class="btn btn-sm btn-danger dd"  value="{{ $sex->id }} "   href="#">Delete</a>
							</td>
						</tr>
						@endforeach 
						
						
						

					</tbody>
				</table>
			</div>
		</div>
	</div>


  
	
    </div>


    
  @include('admin_view.body')

       
  
  @include('admin_view.js')
  
  <!-- Modal  1-->
  <div class="modal fade" id="modi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="color:red">
          <div class="er mt-4">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
            @endif
          </div>
          <div id="vox" class="err text-center mt-4" style="color:red">

            
          
          </div>

          <form  id="dick"    action="" method="" enctype="multipart/form-data">
            @csrf
            <div class="form-group x">
              <label for="">Name</label>
              <input id="name" class="form-control" type="text" value="" name="name">
            </div>
          
            <div class="form-group x">
              <label for="">price</label>
              <input id="price" class="form-control" value="" type="text" name="price">
            </div>
            <div class="form-group y">
              <label for="">decription</label>
              <textarea name="des" id="des" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="hide"><i class="fas fa-file-image"></i></label>
              <img id="s" src="" alt="" srcset="" style=" height="200px" width="200px" "    >
              <input style="display: none" name="photo" class="form-control" type="file" id="hide">
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" value="insert">
            </div>
          </form>

        </div>
        <div class="modal-footer">

          <div id="cox" class="err text-center mt-4" style="color:red">

            
          
          </div>


          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        </div>
      </div>
    </div>
  </div>



  <!-- Modal 2-->
  <div class="modal fade" id="mode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Food</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="color:red">
          <div class="er mt-4">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
            @endif
          </div>
          <div id="vox" class="err text-center mt-4" style="color:red">

            
          
          </div>

          <form  id="sick"    action="" method="" enctype="multipart/form-data">
            @csrf
            <div class="form-group x">
              <label for="">Name</label>
              <input id="name1" class="form-control" type="text" value="" name="name">
            </div>
          
            <div class="form-group x">
              <label for="">price</label>
              <input id="price1" class="form-control" value="" type="text" name="price">
            </div>
            <div class="form-group x">
             
              <input id="id1" class="form-control" value="" type="hidden" name="id">
            </div>
            <div class="form-group y">
              <label for="">decription</label>
              <textarea name="des" id="des1" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="hide1"><i class="fas fa-file-image"></i></label>
              <img id="s1" src="" alt="" srcset="" style=" height="200px" width="200px" "    >
              <input style="display: none" name="photo1" class="form-control" type="file" id="hide1">
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" value="update">
            </div>
          </form>

        </div>
        <div class="modal-footer">

          <div id="mox" class="err text-center mt-4" style="color:red">

            
          
          </div>


          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        </div>
      </div>
    </div>
  </div>
  </body>
  <script src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.11.3/af-2.3.7/b-2.1.1/datatables.min.js"></script>


  <script src="{{ asset('/assets/js/script.js') }}"></script>

</html>