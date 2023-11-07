<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	protected $primaryKey = 'product_code';
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->string('product_code', 30)->primary();
			$table->string('product_name', 300)->nullable();
			$table->string('product_name_kana', 300)->nullable();
			$table->double('price', 11, 3)->nullable();
			$table->double('quantity', 11, 3)->nullable();
			$table->string('attribute', 100)->nullable();
			$table->timestamp('disp_from')->nullable();
			$table->timestamp('disp_to')->nullable();
			$table->string('status', 30)->default('A01')->nullable();
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
		Schema::dropIfExists('products');
	}
};
