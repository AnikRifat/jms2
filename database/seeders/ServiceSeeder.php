<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Create some sample services
        $services = [
            [
                'title' => 'Hajj Packages',
                'description' => 'We offer a range of Hajj packages to meet your needs and budget.',
                'image' => '01.jpg',
                'order' => 1,
            ],
            [
                'title' => 'Umrah Packages',
                'description' => 'Experience the beauty and spirituality of Umrah with our affordable packages.',
                'image' => '02.jpg',
                'order' => 2,
            ],
            [
                'title' => 'Ziyarat Packages',
                'description' => 'Visit the holy sites of Islam with our expertly curated Ziyarat packages.',
                'image' => '03.jpg',
                'order' => 3,
            ],
        ];

        // Insert the services into the database
        Service::insert($services);
    }
}
