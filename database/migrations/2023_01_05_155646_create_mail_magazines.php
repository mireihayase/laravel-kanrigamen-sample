<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	protected $primaryKey = 'mailmag_no';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_magazines', function (Blueprint $table) {
			$table->bigIncrements('mailmag_no');
			$table->string('email', 200);
			$table->string('email2', 200)->nullable();
			$table->string('email_category', 10)->nullable();
			$table->string('email_accepted', 1)->default(0);
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
		Schema::dropIfExists('mail_magazines');
	}
};
