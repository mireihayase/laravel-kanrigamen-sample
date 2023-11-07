<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	protected $primaryKey = 'request_no';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requests', function (Blueprint $table) {
			$table->bigIncrements('request_no');
			$table->string('request_id', 30);
			$table->string('status', 30)->default('C01')->nullable();
			$table->integer('user_no')->nullable();
			$table->string('name', 90)->nullable();
			$table->string('name_kana', 90)->nullable();
			$table->string('company', 300)->nullable();
			$table->string('company_kana', 300)->nullable();
			$table->string('department_name', 300)->nullable();
			$table->string('job_title', 300)->nullable();
			$table->string('email', 200);
			$table->string('email_accepted', 1)->default(0);
			$table->string('tel', 15)->nullable();
			$table->string('fax', 15)->nullable();
			$table->string('post_code', 10)->nullable();
			$table->string('address1', 30)->nullable();
			$table->string('address2', 300)->nullable();
			$table->string('address3', 300)->nullable();
			$table->string('request_kind', 100);
			$table->text('request')->nullable();
			$table->string('guid_accepted', 1)->default(0)->nullable();
			$table->text('remark')->nullable();
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
		Schema::dropIfExists('requests');
	}
};
