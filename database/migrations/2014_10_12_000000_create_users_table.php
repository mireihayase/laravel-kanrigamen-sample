<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $primaryKey = 'user_no';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_no');
            $table->string('name', 90)->nullable();
            $table->string('name_kana', 90)->nullable();
            $table->string('company_code', 20)->nullable();
            $table->string('company', 300)->nullable();
            $table->string('company_kana', 300)->nullable();
            $table->string('department_name', 300)->nullable();
            $table->string('job_title', 300)->nullable();
            $table->string('email', 200)->unique('email');
            $table->string('password', 90);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_accepted', 1)->default(0);
            $table->string('auth_token', 60)->nullable();
            $table->string('tel', 15)->nullable();
            $table->string('fax', 15)->nullable();
            $table->string('post_code', 10)->nullable();
            $table->string('address1', 30)->nullable();
            $table->string('address2', 300)->nullable();
            $table->string('address3', 300)->nullable();
            $table->string('guid_accepted', 1)->default(0);
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
        Schema::dropIfExists('users');
    }
};