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
        Schema::create('mng_status', function (Blueprint $table) {
            $table->string('fnc_code', 30);
            $table->string('id', 30);
            $table->string('status', 10);
            $table->string('csvout_flg')->default(0);
            $table->string('pdfout_flg')->default(0);
            $table->text('remark')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_user', 30)->default('system');
            $table->string('updated_user', 30)->default('system');
            $table->timestamp('updated_at')->useCurrent();
            $table->string('delete_flg')->default(0);
            $table->primary( 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mng_status');
    }
};
