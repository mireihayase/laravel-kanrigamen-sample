<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdminLogin extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$retarray = [
			'login_id' => 'required|max:30',
			'login_pw' => 'required|max:30'
		];
		return $retarray;
	}
	/**
	 * エラーメッセージ設定
	 */
	public function messages()
	{
		return [];
	}
	/**
	 * 項目名称設定
	 */
	public function attributes()
	{
		return [
			'login_id' => __("attributes.login.login_id"),
			'login_pw' => __("attributes.login.login_pw"),
		];
	}
}
