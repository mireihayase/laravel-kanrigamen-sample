<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MngStatus extends Model
{
    use HasFactory;

    protected $table = 'mng_status';

    public function order(){
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id', 'product_code');
    }

    public function contact(){
        return $this->belongsTo(Contact::class, 'id', 'contact_no');
    }
}
