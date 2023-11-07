<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_no';

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'order_no', 'order_no');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_no', 'user_no');
    }

    public function status(){
        return $this->hasOne(MngStatus::class,'id', 'order_id');
    }
}
