<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Http\Requests\ValidateAdminLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
	/**
	 * 入力画面
	 */
	public function login(Request $request)
	{
		// ログ出力
		Controller::accessLog('login/');

		// 画面出力
		return view('login/login');
	}
	/**
	 * ログイン認証
	 */
	public function auth(ValidateAdminLogin $request)
	{
		// バリデーション
		if (!$request->login_id || !$request->login_pw) {
			$hash =  array(
				'message' =>  '必須エラー',
			);
			return view('login/login')->with($hash);
		}

		// 認証処理
		$ret = AdminUser::selectAdminUser($request->login_id, $request->login_pw);
		if (!$ret) {
			$hash =  array(
				'message' =>  '認証エラー',
			);
			return view('login/login')->with($hash);
		}

		$hash = array(
			'login_id' => $ret ? $ret : "NG",
		);
        if (Auth::attempt(['login_id' => $request->login_id, 'password' => $request->login_pw])) {
            return redirect('/orders');
        }
	}

	public function logout(StatefulGuard $guard)
    {
        Auth::logout();
        return view('login/login');
    }

    public function setting(StatefulGuard $guard)
    {
        $admin_user = Auth::user();
        return view('auth/setting', compact('admin_user'));
    }

    public function update_setting(Request $request)
    {
        $admin_user = Auth::user();

        if(!empty($request->input('login_id'))){
            $admin_user->login_id = $request->input('login_id');
            $admin_user->save();
        }
        if(!empty($request->input('password'))){
            $admin_user->password = Hash::make($request->input('password'));

            $admin_user->save();
        }
        if(!empty($request->input('email'))){
            $admin_user->email = $request->input('email');
            $admin_user->save();
        }

        return view('auth/setting', compact('admin_user'));
    }
}
