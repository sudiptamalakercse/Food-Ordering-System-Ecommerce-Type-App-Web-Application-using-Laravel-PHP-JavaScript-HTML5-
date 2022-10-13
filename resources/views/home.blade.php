@extends('profile.main_home')

@section('home1')
{{-- @include('profile.home_layout.preloader') --}}
    
    
@include('profile.home_layout.header')


@include('profile.home_layout.banner')


 @include('profile.home_layout.about')

@include('menu.menu')


@include('profile.chafe')


 @include('profile.home_layout.res')

 @include('profile.home_layout.sp')
 

 @include("profile.home_layout.footer")



 @include('profile.home_layout.js')
 {{-- <script src="{{ asset('/assets/js/home.js') }}"></script> --}}

@endsection