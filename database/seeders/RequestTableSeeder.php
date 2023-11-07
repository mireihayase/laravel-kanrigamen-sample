<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MngStatus;

class RequestTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('requests')->truncate();
		MngStatus::where('fnc_code', 'req')->delete();
		$max_post = 30;
		for ($i = 1; $i <= $max_post; $i++) {
			DB::table('requests')->insert([
				"request_no" => $i,
				"request_id" => 'req-' . $i,
				"status" => 'D01',
				"user_no" => $i,
				"name" => "name" . $i,
				"name_kana" => "name_kana" . $i,
				"company" => "company" . $i,
				"department_name" => "department_name" . $i,
				"job_title" => "job_title" . $i,
				"email" => "email+" . $i . '@gmail.com',
				"email_accepted" => 0,
				"tel" => "tel" . $i,
				"fax" => "fax" . $i,
				"post_code" => "zip" . $i,
				"address1" => "address1" . $i,
				"address2" => "address2" . $i,
				"address3" => "address3" . $i,
				"request_kind" => "request_kind" . $i,
				"request" => "request" . $i,
				"guid_accepted" => 0,
				"remark" => "remark" . $i,
				"created_user" => 'system',
				'created_at' => date('Y-m-d H:i:s'),
				"updated_user" => 'system',
				'updated_at' => date('Y-m-d H:i:s'),
				"delete_flg" => 0,
			]);


			DB::table('mng_status')->insert([
				"fnc_code" => 'req',
				"id" => 'req-' . $i,
				"status" => 'D01',
				"csvout_flg" => 0,
				"pdfout_flg" => 0,
				"remark" => "remark" . $i,
				"created_user" => 'system',
				'created_at' => date('Y-m-d H:i:s'),
				"updated_user" => 'system',
				'updated_at' => date('Y-m-d H:i:s'),
				"delete_flg" => 0,
			]);
		}
	}
}
