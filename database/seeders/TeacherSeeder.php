<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'user_id' => 3,
            'image' => 'flexible tours logo png-01.png',
            'file' => 'sm travels logo-01.png',
            'birthday' => '2023-05-14',
            'address' => '84592 Theresa Ways',
            'profession' => 'Teacher',
            'subject' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
