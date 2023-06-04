<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@admin.com',
                'phone' => '0164367506ds0',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 0,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,
                'created_at' => '2023-05-18 19:46:00',
                'updated_at' => '2023-05-18 19:46:00',
            ],
            [
                'id' => 2,
                'name' => 'Student',
                'email' => 'student@email.com',
                'phone' => '016436s75060',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 1,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,
                'created_at' => '2023-05-18 19:46:00',
                'updated_at' => '2023-05-18 19:46:00',
            ],
            [
                'id' => 3,
                'name' => 'Teacher',
                'email' => 'teacher@email.com',
                'phone' => '016a43675060',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 2,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,
                'created_at' => '2023-05-18 19:46:00',
                'updated_at' => '2023-05-18 19:46:00',
            ],
            [
                'id' => 4,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '01643675060',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 1,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,
                'created_at' => '2023-05-19 08:02:29',
                'updated_at' => '2023-05-19 08:07:59',
            ],
            [
                'id' => 5,
                'name' => 'Test Teacher',
                'email' => 'testteacher@email.com',
                'phone' => 'reafatuld@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 2,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,
                'created_at' => '2023-05-18 19:46:00',
                'updated_at' => '2023-05-18 19:46:00',
            ],
        ]);
    }
}
