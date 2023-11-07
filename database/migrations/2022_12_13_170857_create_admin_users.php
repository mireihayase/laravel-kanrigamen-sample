<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	protected $primaryKey = 'admin_no';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_users', function (Blueprint $table) {
			$table->bigIncrements('admin_no');
			$table->string('login_id', 30);
			$table->string('password', 90);
			$table->string('name', 90)->nullable();
			$table->string('name_kana', 90)->nullable();
			$table->string('email', 200);
			$table->timestamp('email_verified_at')->nullable();
			$table->string('role_code')->nullable();
			$table->text('remark')->nullable();
			$table->rememberToken()->nullable();
			$table->string('created_user', 30)->default('system');
			$table->timestamp('created_at')->useCurrent();
			$table->string('updated_user', 30)->default('system');
			$table->timestamp('updated_at')->useCurrent();
			$table->string('delete_flg')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('admin_users');
	}
};
