@extends('profile.main_home')


@section("home1")

@include('profile.home_layout.header')

<div class="px-4 px-lg-0">
    <!-- For demo purpose -->
   
    <!-- End -->
  
    <div class="  mt-5">
      <div class="container mt-5">
          


      
   
        <div class="row justify-content-center">
          <div class="col-lg-6 p-5 bg-white rounded shadow-sm mb-5">
            <div id="d" style="color:#000; font-size:24px">
        
            </div>
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
               @endif
            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Product</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Quantity</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Remove</div>
                    </th>
                  </tr>
                </thead>
                <tbody id="tbx">

                  @foreach ($p as $x)
                    
               
                  {{-- <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img style="display: inline-block"   src="{{ asset($x['image']) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $x['p_name'] }}</a></h5>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>${{ $x['price'] }}</strong></td>
                    <td class="border-0 align-middle"><strong>{{ $x['quantity'] }}</strong></td>
                    <td class="border-0 align-middle"><a href="" map='{{ $x['id'] }}' id="delete" class="text-dark"><i class="fa fa-trash"></i></a></td>
                  </tr> --}}
                  @endforeach
         
                </tbody>
              </table>
            </div>
            <!-- End -->
          </div>
        </div>
  
        <div class="row py-5 p-4 bg-white rounded shadow-sm justify-content-center">
   
          <div class="col-lg-8">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
            <div class="p-4">
              <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{ $total }}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                  <h5 class="font-weight-bold"> {{ $total+10  }}</h5>
                </li>
              </ul><a href="{{ route('order') }}" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </div>

  @include('profile.home_layout.js')
@endsection()