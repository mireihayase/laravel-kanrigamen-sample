<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "product_code";
    public $incrementing = false;

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'product_code', 'product_code');
    }

    public function status(){
        return $this->hasOne(MngStatus::class,'id', 'product_code');

    }
}
