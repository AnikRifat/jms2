<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $courses = [
            [
                'title' => 'Introduction to Programming',
                'price' => 49.99,
                'image' => '01.jpg',
                'lesson' => 10,
                'description' => 'Learn the basics of programming and get started with coding.',
            ],
            [
                'title' => 'Web Development Bootcamp',
                'price' => 79.99,
                'image' => '02.jpg',
                'lesson' => 20,
                'description' => 'Master the skills necessary to build dynamic and responsive websites.',
            ],
            [
                'title' => 'Data Science Fundamentals',
                'price' => 99.99,
                'image' => '03.jpg',
                'lesson' => 15,
                'description' => 'Discover the principles and techniques used in data science.',
            ],
            [
                'title' => 'Mobile App Development',
                'price' => 69.99,
                'image' => '04.jpg',
                'lesson' => 12,
                'description' => 'Learn how to build mobile applications for iOS and Android devices.',
            ],
            [
                'title' => 'Graphic Design for Beginners',
                'price' => 59.99,
                'image' => '05.jpg',
                'lesson' => 8,
                'description' => 'Explore the fundamentals of graphic design and unleash your creativity.',
            ],
            [
                'title' => 'Photography Masterclass',
                'price' => 89.99,
                'image' => '06.jpg',
                'lesson' => 18,
                'description' => 'Take stunning photos and enhance your photography skills.',
            ],
            [
                'title' => 'Business Management 101',
                'price' => 79.99,
                'image' => '07.jpg',
                'lesson' => 16,
                'description' => 'Learn essential business management principles and strategies.',
            ],
            [
                'title' => 'Digital Marketing Fundamentals',
                'price' => 59.99,
                'image' => '08.jpg',
                'lesson' => 12,
                'description' => 'Discover the basics of digital marketing and promote your business online.',
            ],
        ];

        foreach ($courses as $course) {
            Course::create([
                'title' => $course['title'],
                'price' => $course['price'],
                'meeting_link' => 'https://us05web.zoom.us/j/86754974617?pwd=T3J3a0ZDL1E2SnRxY1o1TUlTR1hCUT09',
                'lesson' => $course['lesson'],
                'description' => $course['description'],
                'class_id' => $faker->numberBetween(1, 2),
                'subject_id' => $faker->numberBetween(1, 7),
                'creator_id' => 3,
                'duration' => $faker->randomElement(['1', '2', '3']),
                'image' => $course['image'],
                'status' => 1,
            ]);
        }
    }
}
