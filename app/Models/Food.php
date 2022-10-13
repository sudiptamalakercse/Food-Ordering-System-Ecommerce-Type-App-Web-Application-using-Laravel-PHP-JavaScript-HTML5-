<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $gaurded=[

    ];

    public function food_order_info(){
        return $this->hasMany(Order::class);
    }
   
    public function food_cart(){
        return $this->hasMany(Cart::class);
    }




}
