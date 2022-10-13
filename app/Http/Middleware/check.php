<?php

namespace App\Http\Middleware;

use App\Http\Controllers\FoodController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class check 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()){

           if(Auth::user()->is_admin==1){
                
                return redirect('/check');
            }
      

           
        }
       
        return $next($request);

        
      
    }
}
