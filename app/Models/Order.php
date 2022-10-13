<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $gaurded=[
    

    ];

    public function user_info(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Food_info(){
        return $this->belongsTo(Food::class,'food_id','id');
    }


}
