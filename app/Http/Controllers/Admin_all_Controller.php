<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\User;

class Admin_all_Controller extends Controller
{

    public function all_order()
    {

        $all = Order::all();

        $c = array();
        foreach ($all as $a) {

            $c[] = [
                'id' => $a->id,
                'name' => $a->user_info->name,
                'number' => $a->user_info->number,
                'food_name' => $a->Food_info->title,
                'quantity' => $a->quantity,
                'price' => $a->quantity * $a->Food_info->price,
            ];

        }

        return view('admin_view.order', compact('c'));
    }

    public function delete_order($id)
    {

        $x = Order::find($id);
        $x->delete();

        return redirect()->back();
    }

    public function user()
    {
        $user_Data = User::all();

        return view("admin_view.user", compact("user_Data"));
    }
    public function dlt($id)
    {

        $x = user::find($id);
        $x->delete();

    }
    public function admin_food()
    {

        $all_data = Food::all();

        return view('admin_view.food', compact('all_data'));

    }
    public function load()
    {
        $user_Data = User::all();
        foreach ($user_Data as $a) {
            ?>


        <tr >
        <th scope="row"></th>
        <td> <?php echo $a->name ?></td>
        <td><?php echo $a->email ?></td>
        <td><?php echo $a->number ?></td>



      </tr>
      <?php
}
    }
}
