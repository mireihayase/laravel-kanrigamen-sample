<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminUsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('admin_users')->truncate();
		DB::table('admin_users')->insert([
			['login_id' => 'mitsuishi', 'password' => Hash::make('test'), 'name' => 'aaa',
                'email' => 'test@text.com'
            ],
		]);
	}
}
