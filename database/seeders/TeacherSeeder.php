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
                'id' => 1,
                'user_id' => 3,
                'image' => 'flexible tours logo png-01.png',
                'file' => 'sm travels logo-01.png',
                'birthday' => '2023-05-14',
                'address' => '84592 Theresa Ways',
                'profession' => 'Teacher',
                'subject' => 1,
                'created_at' => '2023-05-18 19:46:00',
                'updated_at' => '2023-05-18 19:46:00',
            ],
            [
                'id' => 2,
                'user_id' => 5,
                'image' => '1684483797.jpg',
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
