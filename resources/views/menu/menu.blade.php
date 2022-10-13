  <!-- ***** Menu Area Starts ***** -->


  
  <section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">


                @foreach ($food as $f )
                    
                <div class="item">
                    <div class='card card1' style="background-image: url({{ $f->photo  }});">
                        <div class="price"><h6>${{ $f->price }}</h6></div>
                        <div class='info'>
                          <h1 class='title'>{{ $f->title }}</h1>
                          <p class='description'>{{ $f->description }}</p>
                          <div class="main-text-button">
                              <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                          </div>
                        </div>
                    </div>
                  
                    {{-- <form id="cart"   action="{{ route('add_cart') }}" method="POST"   enctype="multipart/form-data">
                        @csrf

               
                         <input name="quantity" type="number" min="1" idm={{ $f->id }} value="1" id="c">
                         <input type="text" value="{{ $f->id }}"  >
                
                         <button type="button" style="color: #000" class="btn btn-success">Add To Cart</button>

                    </form> --}}

                    <form action="{{ url('/add_to_cart') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <input name="quantity" type="number" min="1"  value="1" id="c">
                        <input  name="id" type="hidden" value="{{ $f->id }}"  >
               
                        <button type="submit" style="color: #000" class="btn btn-success">Add To Cart</button>
                    </form>
                </div>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                   @endif
           
          
                @endforeach

          
               
            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->