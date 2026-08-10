<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $sub_categories = [
            'سيارات' => [
                ['name' => 'تأجير سيارات', 'name_en' => 'Car Rental'],
                ['name' => 'تصليح سيارات', 'name_en' => 'Car Repair'],
                ['name' => 'قطع غيار', 'name_en' => 'Spare Parts'],
                ['name' => 'غسيل سيارات', 'name_en' => 'Car Wash'],
                ['name' => 'ونش و نقل', 'name_en' => 'Towing & Transport'],
            ],
            'صحة' => [
                ['name' => 'مستشفيات', 'name_en' => 'Hospitals'],
                ['name' => 'عيادات', 'name_en' => 'Clinics'],
                ['name' => 'أطباء', 'name_en' => 'Doctors'],
                ['name' => 'صيدليات', 'name_en' => 'Pharmacies'],
                ['name' => 'مختبرات', 'name_en' => 'Labs'],
            ],
            'عقارات' => [
                ['name' => 'شقق للبيع', 'name_en' => 'Apartments for Sale'],
                ['name' => 'شقق للإيجار', 'name_en' => 'Apartments for Rent'],
                ['name' => 'محلات تجارية', 'name_en' => 'Commercial Shops'],
                ['name' => 'أراضي', 'name_en' => 'Land'],
                ['name' => 'إدارة عقارات', 'name_en' => 'Property Management'],
            ],
            'صيانة منزلية' => [
                ['name' => 'سباكة', 'name_en' => 'Plumbing'],
                ['name' => 'كهرباء', 'name_en' => 'Electrical'],
                ['name' => 'تكييف و تبريد', 'name_en' => 'AC & Refrigeration'],
                ['name' => 'دهان', 'name_en' => 'Painting'],
                ['name' => 'نجارة', 'name_en' => 'Carpentry'],
            ],
            'تعليم' => [
                ['name' => 'دروس خصوصية', 'name_en' => 'Private Tutoring'],
                ['name' => 'لغات', 'name_en' => 'Languages'],
                ['name' => 'تدريب مهني', 'name_en' => 'Vocational Training'],
                ['name' => 'دورات أونلاين', 'name_en' => 'Online Courses'],
            ],
            'مطاعم و حفلات' => [
                ['name' => 'مطاعم', 'name_en' => 'Restaurants'],
                ['name' => 'وجبات سريعة', 'name_en' => 'Fast Food'],
                ['name' => 'حلويات', 'name_en' => 'Desserts'],
                ['name' => 'مقاهي', 'name_en' => 'Coffee Shops'],
                ['name' => 'تجهيز حفلات', 'name_en' => 'Catering'],
            ],
            'نظافة' => [
                ['name' => 'تنظيف منازل', 'name_en' => 'Home Cleaning'],
                ['name' => 'تنظيف مكاتب', 'name_en' => 'Office Cleaning'],
                ['name' => 'تنظيف سجاد', 'name_en' => 'Carpet Cleaning'],
                ['name' => 'تنظيف واجهات', 'name_en' => 'Facade Cleaning'],
                ['name' => 'مكافحة حشرات', 'name_en' => 'Pest Control'],
            ],
            'تقنية' => [
                ['name' => 'دعم فني', 'name_en' => 'IT Support'],
                ['name' => 'تصميم مواقع', 'name_en' => 'Web Design'],
                ['name' => 'تصليح جوالات', 'name_en' => 'Phone Repair'],
                ['name' => 'شبكات', 'name_en' => 'Networking'],
                ['name' => 'برمجة', 'name_en' => 'Programming'],
            ],
            'جمال و عناية' => [
                ['name' => 'صالونات نسائية', 'name_en' => "Women's Salons"],
                ['name' => 'حلاقة رجالي', 'name_en' => 'Barbershops'],
                ['name' => 'سبا', 'name_en' => 'Spa'],
                ['name' => 'مكياج', 'name_en' => 'Makeup'],
                ['name' => 'عطور', 'name_en' => 'Perfumes'],
            ],
            'قانون و استشارات' => [
                ['name' => 'محاماة', 'name_en' => 'Lawyers'],
                ['name' => 'استشارات إدارية', 'name_en' => 'Management Consulting'],
                ['name' => 'محاسبة', 'name_en' => 'Accounting'],
                ['name' => 'ترجمة', 'name_en' => 'Translation'],
                ['name' => 'توثيق', 'name_en' => 'Notary'],
            ],
        ];

        $categories = Category::all()->keyBy('name');

        foreach ($sub_categories as $categoryName => $subs) {
            $categoryId = $categories->get($categoryName)?->id;
            if (!$categoryId) continue;

            foreach ($subs as $sub) {
                SubCategory::factory()->create([
                    'name' => $sub['name'],
                    'name_en' => $sub['name_en'],
                    'category_id' => $categoryId,
                    'active' => 1
                ]);
            }
        }
    }
}
