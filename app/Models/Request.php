<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $primaryKey = 'request_no';

    public function user(){
        return $this->belongsTo(User::class, 'user_no', 'user_no');
    }

    public function status(){
        return $this->hasOne(MngStatus::class,'id', 'request_id');
    }
}
