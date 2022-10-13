<?php

namespace App\Http\Controllers;

use App\Models\Cheif;
use Illuminate\Http\Request;

class CheifController extends Controller
{
    //


    public function c( $r){


        $fi=Cheif::find($r);
        $fi->delete();
        return json_encode([
            'success'=>true
        ]);

    }
    public function b(Request $r){

      
     



$loc='/images/update/chef/';
        $f=Cheif::find($r->id);
        $f->name=$r->name;
        $f->role=$r->role;
        if($r->hasFile('photo1')){
            $im=$r->file('photo1');
            $x=$im->getClientOriginalExtension();
            $name='update_chafe_'.$r->name.time().'.'.$x;
            $im->move(public_path().$loc,$name);
            $f->photo=$loc.$name;
        }
  $f->save();
        return json_encode([
            'success'=>true
        ]);

    }


    public function a($id){


        $find=Cheif::find($id);
        return json_encode([


            "data"=>$find
        ]);
    }
    public function z(){


        $all_z=Cheif::all();
        $i=0;
        foreach($all_z as $p){


            ?>
            <tr>
            <td><?php echo ++$i;   ?></td>
            <td><?php echo $p->name;   ?></td>
        
            <td><?php echo $p->role;   ?></td>
            <
            <td><img src="<?php echo $p->photo;   ?>" alt=""></td>
            <td>
                <a class="btn btn-sm btn-info t2" href="#">View</a>

                <a class="btn btn-sm btn-warning t" value="<?php echo $p->id;   ?> " id="edit" data-toggle="modal"  href="#mode">Edit</a>
                <a class="btn btn-sm btn-danger dd"  value="<?php echo $p->id;   ?> "   href="#">Delete</a>
            </td>
        </tr>

        <?php
        }
    }

    public function x(){
        $all=Cheif::all();
        return view("admin_view.chef",compact("all"));
    }
    public function y(Request $r){
      

        $m=new Cheif();
        // dd($m);
        $m->name=$r->name;
        $m->role=$r->role;


$loc="/images/chef/";
if($r->hasFile('photo1')){


    $img=$r->file('photo1');
    $ex=$img->getClientOriginalExtension();
    $name='Chef_'.$r->name.time().".".$ex;
    $img->move(public_path().$loc,$name);
    $m->photo=$loc.$name;
}
       $m->save();



return json_encode([
    'success'=>true
]);




    }
}
