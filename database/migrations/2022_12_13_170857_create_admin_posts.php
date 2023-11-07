<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_posts', function (Blueprint $table) {
			$table->string('func_code', 30);
			$table->integer('admin_no')->default(0);
			$table->string('role_code', 30)->default(0);
			$table->string('create', 1)->default(0);
			$table->string('read', 1)->default(0);
			$table->string('update', 1)->default(0);
			$table->string('delete', 1)->default(0);
			$table->string('created_user', 30)->default('system');
			$table->timestamp('created_at')->useCurrent();
			$table->string('updated_user', 30)->default('system');
			$table->timestamp('updated_at')->useCurrent();
			$table->string('delete_flg')->default(0);
			$table->primary(['func_code', 'admin_no', 'role_code']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('admin_posts');
	}
};
