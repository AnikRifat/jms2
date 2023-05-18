<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class, ContentSeeder::class, BlogSeeder::class, CategorySeeder::class, SubjectSeeder::class, TeacherSeeder::class, studentSeeder::class, CourseSeeder::class, ProductSeeder::class]);
    }
}
