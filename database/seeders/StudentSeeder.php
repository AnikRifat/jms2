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

                'user_id' => 2,
                'image' => 'student.png',
                'file' => '1684483679_file.jpg',
                'birthday' => '2000-05-19',
                'address' => 'newyork califoirnia',
                'current_department' => 'arts',
                'current_class' => 'Hsc',
                'current_school' => 'Universtiy of Havard',
            ],
        ]);
    }
}
