<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public static function changLang(Request $request)
	{
		App::setLocale($request->lang ? $request->lang : 'ja');
		session()->put('locale', $request->lang ? $request->lang : 'ja');
		return redirect()->back();
	}
	public static function accessLog(String $path)
	{
		Log::info('SID:' . session()->getId() . '	LID:' . session()->get('login_id') . '	access->' . $path);
	}
}
