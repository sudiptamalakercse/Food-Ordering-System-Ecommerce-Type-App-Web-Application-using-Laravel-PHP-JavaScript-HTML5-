<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Is_Admin extends Controller
{
    public function is_admin(){
        if(auth()->user()->is_admin==1){
            return view('admin_view.admin');
        }
        if(auth()->user()->is_admin==0){
            return redirect("/");
        }
    }
}
