<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'اسوان' => [
                ['name' => 'أسوان', 'name_en' => 'Aswan'],
                ['name' => 'السيل', 'name_en' => 'Al Sel'],
                ['name' => 'صحاري', 'name_en' => 'Sahari'],
                ['name' => 'حكروب', 'name_en' => 'Hakrob'],
                ['name' => 'اطلس', 'name_en' => 'Atlas'],
            ],
            'دراو' => [
                ['name' => 'دراو', 'name_en' => 'Drau'],
            ],
            'كوم امبو' => [
                ['name' => 'كوم امبو', 'name_en' => 'Kom Ombo'],
                ['name' => 'السبعين', 'name_en' => 'Al Sabeen'],
                ['name' => 'نجاجره', 'name_en' => 'Nagagra'],
                ['name' => 'عتمور', 'name_en' => 'Atmor'],
                ['name' => 'زمالك', 'name_en' => 'Zamalek'],
            ],
            'نصر النوبه' => [
                ['name' => 'ارمنا', 'name_en' => 'Armena'],
                ['name' => 'عنيبه', 'name_en' => 'Aniba'],
                ['name' => 'مصمصص', 'name_en' => 'Masmas'],
                ['name' => 'ابريم', 'name_en' => 'Ibrim'],
                ['name' => 'جنينه', 'name_en' => 'Genina'],
                ['name' => 'قته', 'name_en' => 'Qata'],
                ['name' => 'در', 'name_en' => 'Dir'],
                ['name' => 'ديوان', 'name_en' => 'Diwan'],
                ['name' => 'ناصر', 'name_en' => 'Naser'],
                ['name' => 'كلابشه', 'name_en' => 'Kalabsha'],
            ],
            'ادفو' => [
                ['name' => 'ادفو مركز', 'name_en' => 'Edfu Center'],
                ['name' => 'رمادي', 'name_en' => 'Ramadi'],
                ['name' => 'كلح', 'name_en' => 'Kalah'],
                ['name' => 'بصيله', 'name_en' => 'Basila'],
                ['name' => 'سلايمه', 'name_en' => 'Salaima'],
            ],
            'الاقصر' => [
                ['name' => 'الاقصر', 'name_en' => 'Luxor'],
                ['name' => 'كرنك', 'name_en' => 'Karnak'],
                ['name' => 'الطيبة', 'name_en' => 'Al Tayba'],
            ],
            'الزينية' => [
                ['name' => 'الزينية', 'name_en' => 'Al Zainia'],
                ['name' => 'الحسينات', 'name_en' => 'Al Hussienat'],
            ],
            'البياضية' => [
                ['name' => 'البياضية', 'name_en' => 'Al Bayadia'],
                ['name' => 'الضبعية', 'name_en' => 'Al Dabia'],
            ],
            'ارمنت' => [
                ['name' => 'ارمنت', 'name_en' => 'Armant'],
                ['name' => 'الرزيقات', 'name_en' => 'Al Raziqat'],
            ],
            'اسنا' => [
                ['name' => 'اسنا', 'name_en' => 'Esna'],
                ['name' => 'الكلابية', 'name_en' => 'Al Kalabia'],
            ],
        ];

        $districts = District::all()->keyBy('name');

        foreach ($cities as $districtName => $cityList) {
            $districtId = $districts->get($districtName)?->id;
            if (!$districtId) continue;

            foreach ($cityList as $city) {
                City::factory()->create([
                    'name' => $city['name'],
                    'name_en' => $city['name_en'],
                    'district_id' => $districtId,
                ]);
            }
        }
    }
}
