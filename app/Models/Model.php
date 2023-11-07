<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;


class Model extends BaseModel
{
	public static function exeLog(String $method)
	{
		Log::info('SID:' . session()->getId() . '	LID:' . session()->get('login_id') . '	execute->' . $method);
	}
}
