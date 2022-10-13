<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cheif;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
   



    public function food(){
       
        $food=Food::all();
        $ca=Cheif::all();
        if(auth()->user()){
            $n=Cart::where('user_id','=',auth()->user()->id)->count();
        }
        else{
            $n=0;
        }
    //   $n=0;
        return view('home',compact('food','ca','n'));
        
    }


    public function edit($id){


        $f=Food::find($id);
        return json_encode([

         'data'=>$f

        ]);
    }
    public function dlt($id){


        $f=Food::find($id);
        $f->delete();
        return json_encode([

         'data'=>true

        ]);
    }
    

    public function admin_food_update(Request $r){

        
        $find=Food::find($r->id);
        $find->title=$r->name;
        $find->price=$r->price;
        $find->description=$r->des;

   $loc='/images/upload/update/';
        if($r->hasFile('photo1')){


            $img=$r->file('photo1');
            $ex=$img->getClientOriginalExtension();
            $name='Update_'.$r->name.time().".".$ex;
            $img->move(public_path().$loc,$name);

            $find->photo=$loc.$name;
            

        }
        $find->save();
        return json_encode([

              'success'=>'update'
            
        ]);
    }

    public function all_food(){

    
        $all_food=Food::all();
  $i=0;
        foreach($all_food as $a){

       
      ?>



                    <tr>
							<td><?php  echo ++$i   ?></td>
							<td> <?php  echo $a->title   ?>    </td>
							<td>  <?php  echo $a->price   ?>  </td>
							<td>  <?php  echo $a->description   ?>  </td>
						
					
							<td><img src=" <?php  echo $a->photo   ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info vv" href="#">View</a>
                          
								<a class="btn btn-sm btn-warning t" value="<?php  echo $a->id   ?>" id="edit" data-toggle="modal"  href="#mode">Edit</a>
								<a class="btn btn-sm btn-danger dd"  value="<?php  echo $a->id   ?>" href="#">Delete</a>
							</td>
						</tr>





      <?php
        }

    }




    public function admin_food_insert(Request $r){
   
        $r->validate([
               
            'name'=>'required|string',
            'price'=>"required|numeric",
            'des'=>'required|string',
            'photo'=>'required'
       

        ]);





        $p=new Food();

        $loc='/images/upload/';
        $name=$r->has("name")?$r->get('name'):" ";
        $p->title=$name;

        $price=$r->has("name")?$r->get('price'):0;
        $p->price=$price;
        $des=$r->has("des")?$r->get('des'):"this product doesnot have any description";
        $p->description=$des;
        if($r->hasFile('photo')){


            
            $image=$r->file("photo");
            // dd($image);
            $exten=$image->getClientOriginalExtension();
            $name="product_".time().".".$exten;
            $image->move(public_path().$loc,$name);
            $p->photo=$loc.$name;

            $p->save();
        }
        // $p->save();
      
        
        return json_encode([
           "success"=>true
         
        ]);









    }
}
