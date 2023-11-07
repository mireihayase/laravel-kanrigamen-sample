<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max_post = 10;
        for( $i = 1; $i <= $max_post; $i++ ) {
            DB::table('users')->insert([
                "user_no" => $i,
                "name" => "name" . $i,
                "name_kana" => "name_kana" . $i,
                "company" => "company" . $i,
                "company_code" => "company_code" . $i,
                "company_kana" => "company_kana" . $i,
                "department_name" => "department_name" . $i,
                "job_title" => "job_title" . $i,
                "email" => "email+" . $i . '@gmail.com',
                "password" => "name" . $i,
                "email_verified_at" => date('Y-m-d H:i:s'),
                "email_accepted" => 0,
                "auth_token" => "name" . $i,
                "tel" => "tel" . $i,
                "fax" => "fax" . $i,
                "post_code" => "zip" . $i,
                "address1" => "address1" . $i,
                "address2" => "address2" . $i,
                "address3" => "address3" . $i,
                "guid_accepted" => 0,
                "remark" => 0,
                "created_user" => 'system',
                'created_at' => date('Y-m-d H:i:s'),
                "updated_user" => 'system',
                'updated_at' => date('Y-m-d H:i:s'),
                "delete_flg" => 0,
            ]);
        }
    }
}
