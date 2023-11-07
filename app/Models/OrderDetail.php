<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_no';
    public $incrementing = false;

    public function products(){
        return $this->hasMany(Product::class, 'product_code', 'product_code');
    }
}
