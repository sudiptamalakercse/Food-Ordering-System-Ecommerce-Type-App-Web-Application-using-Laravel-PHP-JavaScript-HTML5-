<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{



   

public function order(){


  

   $all=Cart::where("user_id",'=',auth()->user()->id)->get();
   Cart::where("user_id",'=',auth()->user()->id)->delete();
   $x=new Order();
   
    $allv=array();
   foreach($all as $p){


      
      $allv[]=[
          
         'uid'=>$p->user_id,
         'fid'=>$p->food_id,
         'q'=>$p->quantity,

      ];
 
    


   }




   foreach($allv as $r)
   {
       Order::insert([

         'user_id'=>$r['uid'],
         'food_id'=>$r['fid'],
         'quantity'=>$r['q'],
       ]);
   }



   return redirect()->back()->with('success',"order successfully added");



}

   public function loap(){

      $all_f=Cart::where('user_id','=',auth()->user()->id)->get();
      foreach($all_f as $f){

         // dd($f->food->photo)
    ?>
              <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img style="display: inline-block"   src="<?php echo $f->food->photo   ?>    " alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"></a><?php echo $f->food->title   ?>    </h5>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong> <?php echo $f->quantity*$f->food->price  ?>    </strong></td>
                    <td class="border-0 align-middle"><strong><?php echo $f->quantity  ?></strong></td>
                    <td class="border-0 align-middle"><a href="" map=' <?php echo $f->food_id   ?>  ' id="delete" class="text-dark"><i class="fa fa-trash"></i></a></td>
                  </tr>


<?php



      }

   }

   public function edit($fid){



      
    
      $data=Cart::where('user_id','=',auth()->user()->id)->where('food_id',"=",$fid)->delete();


      return json_encode([


         "m"=>true
      ]);



   }
public function add_cart(Request $r){

   if(auth()->user()->id){
    
   $c=new Cart();
   $c->user_id=auth()->user()->id;
   $fi=Cart::where("user_id",'=',auth()->user()->id)->where('food_id','=',$r->id)->first();
   if($fi)
   {

      $fi->quantity=$fi->quantity+$r->quantity;
      $fi->save();
   }
   else{
      $c->food_id=$r->id;
      $qt=$r->quantity;
      $c->quantity=$qt;
      
       $c->save();
   }

  
   
   return redirect('/cart')->with('success',"added to cart");


   }
   else{
       return route('login');
   }
}


public function ck()
{



  
    $n=Cart::where('user_id','=',auth()->user()->id)->count();
    $all_f=Cart::where('user_id','=',auth()->user()->id)->get();
    

    $p=array();
    
    $total=0;
    foreach($all_f as $f){


     $p[]=[
        
      'id'=>$f->food_id,
      'p_name'=>$f->find($f->id)->food->title,
      'image'=>$f->find($f->id)->food->photo,
      'price'=>$f->find($f->id)->food->price*$f->quantity,
      'quantity'=>$f->quantity,


     ];
     $total=$total+$f->find($f->id)->food->price*$f->quantity;
    }
   
  
   return view('profile.cart',compact('n','p','total'));
}
}
