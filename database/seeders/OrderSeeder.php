<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\MngStatus;

class OrderSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('orders')->truncate();
		MngStatus::where('fnc_code', 'hrd')->delete();
		$max_post = 10;
		for ($i = 1; $i <= $max_post; $i++) {
			DB::table('orders')->insert([
				"order_no" => $i,
				"order_id" => 'hrd-' . $i,
				"status" => 'B02',
				"user_no" => $i,
				"name" => "あname" . $i,
				"send_name" => "あsend_name" . $i,
				"name_kana" => "アname_kana" . $i,
				//                "send_name_kana" => "send_name_kana" . $i,
				"company" => "あcompany" . $i,
				"send_company" => "あsend_company" . $i,
				"company_kana" => "アcompany_kana" . $i,
				"department_name" => "あdepartment_name" . $i,
				"send_department_name" => "あsend_department_name" . $i,
				"job_title" => "あjob_title" . $i,
				"send_job_title" => "あsend_job_title" . $i,
				"email" => "email+" . $i . '@gmail.com',
				"email_accepted" => 0,
				"tel" => "tel" . $i,
				"send_tel" => "send_tel" . $i,
				"fax" => "fax" . $i,
				"post_code" => "zip" . $i,
				"send_post_code" => "szip" . $i,
				"address1" => "あaddress1" . $i,
				"address2" => "あaddress2" . $i,
				"address3" => "あaddress3" . $i,
				"send_address1" => "あsend_address1" . $i,
				"send_address2" => "あsend_address2" . $i,
				"send_address3" => "あsend_address3" . $i,
				"total" => 1000 + $i,
				"postage" => 100 + $i,
				"payment_method" => "あpayment_method" . $i,
				"guid_accepted" => 0,
				"remark" => "あremark" . $i,
				"created_user" => 'system',
				'created_at' => date('Y-m-d H:i:s'),
				"updated_user" => 'system',
				'updated_at' => date('Y-m-d H:i:s'),
				"delete_flg" => 0,
			]);

			DB::table('mng_status')->insert([
				"fnc_code" => 'hrd',
				"id" => 'hrd-' . $i,
				"status" => 'B01',
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
