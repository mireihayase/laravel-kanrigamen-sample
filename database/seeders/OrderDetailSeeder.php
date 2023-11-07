<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrderDetailSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('order_details')->truncate();
		$max_post = 40;
		for ($i = 1; $i <= $max_post; $i++) {
			DB::table('order_details')->insert([
				"order_no" => $i,
				"detail_no" => 1,
				'product_code' => 'SEMINAR0002',
				'price' => 84000,
				'quantity' => 1 + $i,
				'created_user' => '1',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_user' => '1',
				'updated_at' => date('Y-m-d H:i:s'),
				'delete_flg' => '0'
			]);
		}
		for ($i = 2; $i <= 5; $i++) {
			DB::table('order_details')->insert([
				"order_no" => 1,
				"detail_no" => $i,
				'product_code' => 'SEMINAR000' . $i,
				'price' => 0,
				'quantity' => 1 + $i,
				'created_user' => '1',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_user' => '1',
				'updated_at' => date('Y-m-d H:i:s'),
				'delete_flg' => '0'
			]);
		}
		for ($i = 2; $i <= 9; $i++) {
			DB::table('order_details')->insert([
				"order_no" => 3,
				"detail_no" => $i,
				'product_code' => 'SEMINAR000' . $i,
				'price' => 0,
				'quantity' => 1 + $i,
				'created_user' => '1',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_user' => '1',
				'updated_at' => date('Y-m-d H:i:s'),
				'delete_flg' => '0'
			]);
		}
	}
}
