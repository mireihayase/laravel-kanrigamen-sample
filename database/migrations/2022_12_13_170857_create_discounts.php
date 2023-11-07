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
		Schema::create('discounts', function (Blueprint $table) {
			$table->string('product_code', 30);
			$table->string('discount_kind', 30);
			$table->integer('boundary_val')->default(0);
			$table->double('discount_amount', 11, 3)->nullable();
			$table->double('discounted_price', 11, 3)->nullable();
			$table->string('created_user', 30)->default('system');
			$table->timestamp('created_at')->useCurrent();
			$table->string('updated_user', 30)->default('system');
			$table->timestamp('updated_at')->useCurrent();
			$table->string('delete_flg')->default(0);
			$table->primary(['product_code', 'discount_kind', 'boundary_val']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('discounts');
	}
};
