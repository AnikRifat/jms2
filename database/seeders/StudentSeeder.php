<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'user_id' => 2,
            'image' => 'flexible tours logo png-01.png',
            'file' => 'Rocker - Bootstrap 5 Admin Dashboard Template.pdf',
            'birthday' => '2023-05-15',
            'address' => 'Sit quo quaerat alias eum pariatur modi.',
            'current_department' => 'Similique porro sunt ut dolor voluptate est enim.',
            'current_class' => 'Sed quam a iure nobis ab voluptas voluptatem magni...',
            'current_school' => '2023-05-15 05:38:03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
