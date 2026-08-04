<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $cities = City::all();
        $subs = SubCategory::all()->keyBy(function ($s) {
            return $s->category->name . ':' . $s->name;
        });

        $services = [
            'سيارات:تأجير سيارات' => [
                ['name' => 'سما لتأجير السيارات', 'name_en' => 'Sama Car Rental'],
                ['name' => 'الرملة لتأجير السيارات', 'name_en' => 'Raml Car Rental'],
            ],
            'سيارات:تصليح سيارات' => [
                ['name' => 'ورشة أبو علي', 'name_en' => 'Abu Ali Auto Repair'],
                ['name' => 'النجم لتصليح السيارات', 'name_en' => 'Najm Auto Repair'],
            ],
            'سيارات:قطع غيار' => [
                ['name' => 'معرض التويota لقطع الغيار', 'name_en' => 'Toyota Spare Parts'],
                ['name' => 'بن هلال لقطع الغيار', 'name_en' => 'Bin Hilal Spare Parts'],
            ],
            'سيارات:غسيل سيارات' => [
                ['name' => 'استخدام السيارات', 'name_en' => 'Car Wash Pro'],
                ['name' => 'النظافة لغسيل السيارات', 'name_en' => 'Clean Car Wash'],
            ],
            'سيارات:ونش و نقل' => [
                ['name' => 'ونش الغزالة', 'name_en' => 'Gazala Towing'],
                ['name' => 'النقل السريع', 'name_en' => 'Quick Transport'],
            ],

            'صحة:مستشفيات' => [
                ['name' => 'مستشفى طرابلس الجامعي', 'name_en' => 'Tripoli University Hospital'],
                ['name' => 'مستشفى الحياة', 'name_en' => 'Al Hayat Hospital'],
            ],
            'صحة:عيادات' => [
                ['name' => 'عيادة الدكتور حسن', 'name_en' => 'Dr. Hassan Clinic'],
                ['name' => 'مجمع عيادات النور', 'name_en' => 'Al Noor Medical Complex'],
            ],
            'صحة:أطباء' => [
                ['name' => 'د. أحمد عبدالله', 'name_en' => 'Dr. Ahmed Abdullah'],
                ['name' => 'د. سارة محمود', 'name_en' => 'Dr. Sara Mahmoud'],
            ],
            'صحة:صيدليات' => [
                ['name' => 'صيدلية النجاح', 'name_en' => 'Al Najah Pharmacy'],
                ['name' => 'صيدلية الشفاء', 'name_en' => 'Al Shifa Pharmacy'],
            ],
            'صحة:مختبرات' => [
                ['name' => 'مختبر الأمل', 'name_en' => 'Al Amal Lab'],
                ['name' => 'مختبر البرج', 'name_en' => 'Al Burj Lab'],
            ],

            'عقارات:شقق للبيع' => [
                ['name' => 'مجموعة الفلاح العقارية', 'name_en' => 'Al Falah Real Estate'],
                ['name' => 'بيت الخبرة العقاري', 'name_en' => 'Khibra Real Estate'],
            ],
            'عقارات:شقق للإيجار' => [
                ['name' => 'عقارات الساحل', 'name_en' => 'Al Sahel Rentals'],
                ['name' => 'دار الإيجار', 'name_en' => 'Dar Al Ijar'],
            ],
            'عقارات:محلات تجارية' => [
                ['name' => 'سوق التجار', 'name_en' => 'Souq Al Tujjar'],
                ['name' => 'عقارات المدينة', 'name_en' => 'Madina Commercial'],
            ],
            'عقارات:أراضي' => [
                ['name' => 'أراضي الخير', 'name_en' => 'Al Khair Lands'],
                ['name' => 'الاستثمار العقاري', 'name_en' => 'Real Estate Investment'],
            ],
            'عقارات:إدارة عقارات' => [
                ['name' => 'إدارة الأملاك المتحدة', 'name_en' => 'United Property Management'],
                ['name' => 'شركة الحارس', 'name_en' => 'Al Haris Property Management'],
            ],

            'صيانة منزلية:سباكة' => [
                ['name' => 'سباكة الفتح', 'name_en' => 'Al Fath Plumbing'],
                ['name' => 'أبو سباك', 'name_en' => 'Abu Sabbak Plumbing'],
            ],
            'صيانة منزلية:كهرباء' => [
                ['name' => 'كهرباء النور', 'name_en' => 'Al Noor Electrical'],
                ['name' => 'مؤسسة التيار', 'name_en' => 'Tayyar Electrical'],
            ],
            'صيانة منزلية:تكييف و تبريد' => [
                ['name' => 'تبريد ليبيا', 'name_en' => 'Libya Cooling'],
                ['name' => 'صيانة التكييف', 'name_en' => 'AC Maintenance'],
            ],
            'صيانة منزلية:دهان' => [
                ['name' => 'الوان للدهان', 'name_en' => 'Alwan Painting'],
                ['name' => 'دهانات الفن', 'name_en' => 'Fann Painting'],
            ],
            'صيانة منزلية:نجارة' => [
                ['name' => 'نجارة الأصيل', 'name_en' => 'Al Aseel Carpentry'],
                ['name' => 'مفروشات خشبية', 'name_en' => 'Wooden Furniture'],
            ],

            'تعليم:دروس خصوصية' => [
                ['name' => 'مركز التفوق', 'name_en' => 'Al Tafawuq Center'],
                ['name' => 'دروس خصوصية الرياضيات', 'name_en' => 'Math Tutoring Center'],
            ],
            'تعليم:لغات' => [
                ['name' => 'مركز اللغات الحديث', 'name_en' => 'Modern Language Center'],
                ['name' => 'معهد بريطانيا', 'name_en' => 'Britain Institute'],
            ],
            'تعليم:تدريب مهني' => [
                ['name' => 'مركز التدريب المهني', 'name_en' => 'Vocational Training Center'],
                ['name' => 'أكاديمية المهارات', 'name_en' => 'Skills Academy'],
            ],
            'تعليم:دورات أونلاين' => [
                ['name' => 'منصة تعلم', 'name_en' => 'Taalam Platform'],
                ['name' => 'دورات أونلاين', 'name_en' => 'Online Courses Hub'],
            ],

            'مطاعم و حفلات:مطاعم' => [
                ['name' => 'مطعم البحر', 'name_en' => 'Al Bahr Restaurant'],
                ['name' => 'مطعم الأندلس', 'name_en' => 'Andalus Restaurant'],
            ],
            'مطاعم و حفلات:وجبات سريعة' => [
                ['name' => 'برجر هاوس', 'name_en' => 'Burger House'],
                ['name' => 'بيتزا المدينة', 'name_en' => 'Madina Pizza'],
            ],
            'مطاعم و حفلات:حلويات' => [
                ['name' => 'حلويات المدينة', 'name_en' => 'Madina Sweets'],
                ['name' => 'باتيسيري النخبة', 'name_en' => 'Al Nokhba Patisserie'],
            ],
            'مطاعم و حفلات:مقاهي' => [
                ['name' => 'قهوة الصباح', 'name_en' => 'Sabah Coffee'],
                ['name' => 'مقهى الروشن', 'name_en' => 'Al Rawshan Cafe'],
            ],
            'مطاعم و حفلات:تجهيز حفلات' => [
                ['name' => 'تجهيزات الأفراح', 'name_en' => 'Wedding Catering'],
                ['name' => 'حفلات الربيع', 'name_en' => 'Spring Events'],
            ],

            'نظافة:تنظيف منازل' => [
                ['name' => 'شركة النظافة المثالية', 'name_en' => 'Perfect Clean Company'],
                ['name' => 'تنظيف المنزل', 'name_en' => 'Home Cleaning Services'],
            ],
            'نظافة:تنظيف مكاتب' => [
                ['name' => 'كلين أوفيس', 'name_en' => 'Clean Office'],
                ['name' => 'تنظيف المؤسسات', 'name_en' => 'Institutional Cleaning'],
            ],
            'نظافة:تنظيف سجاد' => [
                ['name' => 'تنظيف السجاد الفاخر', 'name_en' => 'Luxury Carpet Cleaning'],
                ['name' => 'مكنسة السجاد', 'name_en' => 'Carpet Vacuum'],
            ],
            'نظافة:تنظيف واجهات' => [
                ['name' => 'تنظيف واجهات الأبراج', 'name_en' => 'Tower Facade Cleaning'],
                ['name' => 'المنظار', 'name_en' => 'Al Manzar Cleaning'],
            ],
            'نظافة:مكافحة حشرات' => [
                ['name' => 'مبيدات الحشرات', 'name_en' => 'Insecticides Pro'],
                ['name' => 'الرشاش لمكافحة الحشرات', 'name_en' => 'Rashash Pest Control'],
            ],

            'تقنية:دعم فني' => [
                ['name' => 'دعمكم التقني', 'name_en' => 'Domek IT Support'],
                ['name' => 'فني الكمبيوتر', 'name_en' => 'Computer Tech'],
            ],
            'تقنية:تصميم مواقع' => [
                ['name' => 'ويب ليبيا', 'name_en' => 'Web Libya'],
                ['name' => 'مصمم المواقع', 'name_en' => 'Site Designer'],
            ],
            'تقنية:تصليح جوالات' => [
                ['name' => 'تصليح الجوال', 'name_en' => 'Mobile Repair'],
                ['name' => 'شاشات', 'name_en' => 'Screens Fix'],
            ],
            'تقنية:شبكات' => [
                ['name' => 'شبكات النخبة', 'name_en' => 'Elite Networking'],
                ['name' => 'إنترنت ليبيا', 'name_en' => 'Libya Internet'],
            ],
            'تقنية:برمجة' => [
                ['name' => 'مطوري ليبيا', 'name_en' => 'Libya Developers'],
                ['name' => 'برمجة تطبيقات', 'name_en' => 'App Programming'],
            ],

            'جمال و عناية:صالونات نسائية' => [
                ['name' => 'صالون الوردة', 'name_en' => 'Al Warda Salon'],
                ['name' => 'صالون لمسة جمال', 'name_en' => 'Touch of Beauty Salon'],
            ],
            'جمال و عناية:حلاقة رجالي' => [
                ['name' => 'حلاقة الزعيم', 'name_en' => "Al Za'im Barbershop"],
                ['name' => 'بربر شوب', 'name_en' => 'Barber Shop'],
            ],
            'جمال و عناية:سبا' => [
                ['name' => 'سبا الاسترخاء', 'name_en' => 'Relaxation Spa'],
                ['name' => 'مساج البحر', 'name_en' => 'Sea Massage'],
            ],
            'جمال و عناية:مكياج' => [
                ['name' => 'فنانة المكياج', 'name_en' => 'Makeup Artist'],
                ['name' => 'مكياج سارة', 'name_en' => 'Sara Makeup'],
            ],
            'جمال و عناية:عطور' => [
                ['name' => 'عطور الشرق', 'name_en' => 'Sharq Perfumes'],
                ['name' => 'الند للعطور', 'name_en' => 'Al Nad Perfumes'],
            ],

            'قانون و استشارات:محاماة' => [
                ['name' => 'مكتب المحامي سالم', 'name_en' => 'Salem Law Office'],
                ['name' => 'المحامون المتحدون', 'name_en' => 'United Lawyers'],
            ],
            'قانون و استشارات:استشارات إدارية' => [
                ['name' => 'استشارات النجاح', 'name_en' => 'Najah Consulting'],
                ['name' => 'مجموعة الخبراء', 'name_en' => 'Experts Group'],
            ],
            'قانون و استشارات:محاسبة' => [
                ['name' => 'مكتب المحاسبة', 'name_en' => 'Accounting Office'],
                ['name' => 'مدقق الحسابات', 'name_en' => 'Audit Pro'],
            ],
            'قانون و استشارات:ترجمة' => [
                ['name' => 'مكتب الترجمة المعتمد', 'name_en' => 'Certified Translation Office'],
                ['name' => 'ترجمان', 'name_en' => 'Turjuman Translation'],
            ],
            'قانون و استشارات:توثيق' => [
                ['name' => 'توثيق العقود', 'name_en' => 'Contract Notary'],
                ['name' => 'الشهر العقاري', 'name_en' => 'Real Estate Registry'],
            ],
        ];

        foreach ($services as $key => $items) {
            $sub = $subs->get($key);
            if (!$sub) continue;

            foreach ($items as $item) {
                $city = $cities->random();
                Service::factory()->create([
                    'name' => $item['name'],
                    'name_en' => $item['name_en'],
                    'sub_category_id' => $sub->id,
                    'city_id' => $city->id,
                ]);
            }
        }
    }
}
