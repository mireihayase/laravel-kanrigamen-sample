<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Authenticatable
{
	protected $table = 'admin_users';
    protected $primaryKey = 'admin_no';

	public static function selectAdminUser(String $login_id, String $login_pw)
	{
        if(empty($login_id) || empty($login_pw)){
            return null;
        }
		$items = DB::select(
			'SELECT login_id, password from admin_users where  login_id =:login_id',
			['login_id' => $login_id]
		);
		if(empty($items[0])){
            return null;
        }
		if(Hash::check($login_pw, $items[0]->password)){
            return isset($items[0]->login_id);
        }else{
		    return null;
        }
	}
}
