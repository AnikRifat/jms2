<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('student_information')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'image' => '1684485795.jpg',
                'file' => 'Rocker - Bootstrap 5 Admin Dashboard Template.pdf',
                'birthday' => '2023-05-15',
                'address' => 'Sit quo quaerat alias eum pariatur modi. Similique porro sunt ut dolor voluptate est enim. Sed quam a iure nobis ab voluptas voluptatem magni...',
                'current_department' => 'Similique porro sunt ut dolor voluptate est enim.',
                'current_class' => 'Sit quo quaerat alias eum pariatur modi.',
                'current_school' => 'Sed quam a iure nobis ab voluptas voluptatem magni...',
                'created_at' => '2023-05-15 05:38:03',
                'updated_at' => '2023-05-18 19:46:00',
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'image' => '1684483678.jpg',
                'file' => '1684483679_file.jpg',
                'birthday' => '2023-05-19',
                'address' => 'RSRM Building, 3no. road, Kunjochaya R/A, E-4 fl...',
                'current_department' => 'arts',
                'current_class' => 'Hsc',
                'current_school' => 'Architecto corrupti repudiandae omnis minus est et...',
                'created_at' => '2023-05-19 08:07:59',
                'updated_at' => '2023-05-19 08:07:59',
            ],
        ]);
    }
}
