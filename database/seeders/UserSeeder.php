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
                'phone' => '0123456789',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 0,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,

            ],
            [
                'id' => 2,
                'name' => 'Md Arman',
                'email' => 'student@email.com',
                'phone' => '01567875',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 1,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,

            ],
            [
                'id' => 3,
                'name' => 'Md tawsif',
                'email' => 'teacher@email.com',
                'phone' => '01567841',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'role' => 2,
                'allow' => 1,
                'complete' => 1,
                'remember_token' => null,

            ]
        ]);
    }
}
