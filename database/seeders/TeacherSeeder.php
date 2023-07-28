<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        for ($i = 2; $i <= 11; $i++) {
            DB::table('teacher_information')->insert([
                'user_id' => $i,
                'image' => 'teacher.png',
                'file' => '1684483797_file.jpg',
                'birthday' => '1993-05-19',
                'address' => 'RSRM Building, 3no. road, Kunjochaya R/A, E-4 fl...',
                'profession' => 'Teacher',
                'subject' => rand(1, 7), // Generate random subject ID from 1 to 7
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
