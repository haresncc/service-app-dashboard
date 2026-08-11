<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // $car = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17a2 2 0 0 1-2-2v-4.5a2 2 0 0 1 .5-1.3l2.5-3A2 2 0 0 1 7.5 6h9a2 2 0 0 1 1.5.7l2.5 3a2 2 0 0 1 .5 1.3V15a2 2 0 0 1-2 2"/><circle cx="7" cy="15" r="2"/><circle cx="17" cy="15" r="2"/><path d="M5 13h14"/></svg>';
        // $health = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.5-2.5 2-5 2-7a6 6 0 0 0-12 0c0 2 1 4.5 2 7"/><path d="M12 22s-8-5-8-11a4 4 0 0 1 8 0"/></svg>';
        // $building = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M8 10h.01"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/><path d="M12 14h.01"/></svg>';
        // $wrench = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>';
        // $book = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><path d="M8 7h8"/><path d="M8 11h6"/></svg>';
        // $utensils = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2h0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>';
        // $sparkles = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.25 3.75L7 8l3.75 1.25L12 13l1.25-3.75L17 8l-3.75-1.25z"/><path d="M17 17.5 16 20l-3.5-1-1 2.5-3-1.5-1 2-2-3-3 1 1.5-4L2 13l3-1-1-3 4 .5L10 8l2 1.5"/></svg>';
        // $monitor = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>';
        // $sparkle = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.607a7.5 7.5 0 0 0-4.74-12.577C14.97 3.028 13.82 3 12 3"/><path d="M9 3a7.48 7.48 0 0 1 3 5.5A7.48 7.48 0 0 1 9 14"/><path d="M3 12a7.5 7.5 0 0 0 10.5 6.5"/></svg>';
        // $balance = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M8 5h8"/><path d="M5 10s2.5-2 7-2 7 2 7 2"/><path d="M5 14s2.5 2 7 2 7-2 7-2"/></svg>';

        $categories = [
            ['name' => 'تاجير سيارات', 'name_en' => 'Car Rental', 'icon' => 'van'],
            ['name' => 'سيارات', 'name_en' => 'Cars', 'icon' => 'car'],
            ['name' => 'اطباء', 'name_en' => 'Doctors', 'icon' => 'stethoscope'],
            ['name' => 'صحة', 'name_en' => 'Healthcare', 'icon' => 'heart-pulse'],
            ['name' => 'عقارات', 'name_en' => 'Real Estate', 'icon' => 'building-2'],
            ['name' => 'صيانة منزلية', 'name_en' => 'Home Maintenance', 'icon' => 'drill'],
            ['name' => 'تعليم', 'name_en' => 'Education', 'icon' => 'book-open'],
            ['name' => 'مطاعم و حفلات', 'name_en' => 'Restaurants & Catering', 'icon' => 'utensils'],
            ['name' => 'نظافة', 'name_en' => 'Cleaning', 'icon' => 'broom-sparkles'],
            ['name' => 'تقنية', 'name_en' => 'Technology', 'icon' => 'cpu'],
            ['name' => 'جمال و عناية', 'name_en' => 'Beauty & Care', 'icon' => 'spray-can'],
            ['name' => 'قانون و استشارات', 'name_en' => 'Legal & Consulting', 'icon' => 'scale'],
        ];

        foreach ($categories as $cat) {
            Category::factory(['active' => 0])->create($cat);
        }
    }
}
