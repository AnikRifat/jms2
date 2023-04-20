<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'website_name' => 'THe Sawari',
            'website_description' => 'Make a Tour with us',
            'website_logo' => '1680634184.png',
            'website_favicon' => '1680634184.png',
            'website_email' => 'info@thesawari.com',
            'website_phone' => '+880 1776 666 661',
            'website_address' => 'House: 2, Road: 4, Block: E Section-12, Mirpur, Pallabi, Dhaka-121',
            'about_content' =>'Our legacy of helping Muslims in performing their obligatory religious duty Hajj, and non-obligatory religious duty Umrah, goes back to over two decades, when the visionary Haji Abdur Rahman laid the foundation of Sawari in 2000. Since our inception, every year we have enabled thousands of pilgrims to successfully fulfil their promise to Allah. Our expert team of experienced professionals in Bangladesh and Saudi Arabia are committed towards ensuring that every aspect of this holy pilgrimage is executed flawlessly, and the pilgrim is in a relaxed state of mind during the sacred journey.

            At Sawari, we pride ourselves in providing excellent service and focusing only on one goal: your absolute comfort. We are recognized by the Government of Bangladesh and the Government of Saudi Arabia for our commitment of delivering an exceptional experience for pilgrims who perform Hajj as well as Umrah with us.

            Based upon the tour package that you select, we provide you with luxurious accommodation, which is closest to the places of worship during your period of stay in Makkah, Madinah and Mina and Arafat. This makes it easier for you to perform your religious duty in comfort. We are renowned for serving delicious food during Hajj, where we offer you a variety of dishes so that you are fully nourished and discharge your religious obligation smoothly. For transporting you between different points during the pilgrimage, we use comfortable buses with wide seats.

            For those pilgrims who want to perform their Hajj and Umrah in absolute comfort at a price that justifies the premium facilities we offer, Sawari is their first choice. We look forward to providing exceptionally comfortable service to Allahs guests in the Holy Land',
            'about_image' => '1680173512.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
