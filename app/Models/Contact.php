<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'contact_no';
    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_no', 'user_no');
    }

    public function status(){
        return $this->hasOne(MngStatus::class,'id', 'contact_id');
    }
}
