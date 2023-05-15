<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Course::create([
                'title' => $faker->sentence,
                'price' => $faker->randomNumber(2),
                'lesson' => $faker->randomNumber(2),
                'description' => $faker->paragraph,
                'class_id' => $faker->numberBetween(1, 2),
                'subject_id' => $faker->numberBetween(1, 7),
                'creator_id' => 3,
                'duration' => $faker->randomElement(['2 hours', '3 hours', '4 hours']),
                'image' => 'course_image.jpg',
                'status' => 1,
            ]);
        }
    }
}
