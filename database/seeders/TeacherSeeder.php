<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        DB::table('teacher_information')->insert([
            [
                'user_id' => 3,
                'image' => 'teacher.png',
                'file' => '1684483797_file.jpg',
                'birthday' => '2023-05-19',
                'address' => 'RSRM Building, 3no. road, Kunjochaya R/A, E-4 fl...',
                'profession' => 'Teacher',
                'subject' => 1,
                'created_at' => '2023-05-19 08:09:57',
                'updated_at' => '2023-05-19 08:09:57',
            ],
        ]);
    }
}
