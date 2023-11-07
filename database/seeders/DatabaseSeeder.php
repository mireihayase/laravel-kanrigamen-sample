<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(AdminUsersSeeder::class);
		$this->call(UsersSeeder::class);
		$this->call(OrderSeeder::class);
		$this->call(OrderDetailSeeder::class);
		//$this->call(ProductsTableSeeder::class);
		$this->call(ContactSeeder::class);
		$this->call(RequestTableSeeder::class);
		// \App\Models\User::factory(10)->create();

		// \App\Models\User::factory()->create([
		//     'name' => 'Test User',
		//     'email' => 'test@example.com',
		// ]);
	}
}
