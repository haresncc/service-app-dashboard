<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $aswanId = Governorate::where('name', 'اسوان')->first()->id;
        $luxorId = Governorate::where('name', 'الاقصر')->first()->id;

        $districts = [
            ['name' => 'اسوان', 'name_en' => 'Aswan', 'governorate_id' => $aswanId],
            ['name' => 'دراو', 'name_en' => 'Drau', 'governorate_id' => $aswanId],
            ['name' => 'كوم امبو', 'name_en' => 'Kom Ombo', 'governorate_id' => $aswanId],
            ['name' => 'نصر النوبه', 'name_en' => 'Nasr El Nuba', 'governorate_id' => $aswanId],
            ['name' => 'ادفو', 'name_en' => 'Edfu', 'governorate_id' => $aswanId],
            ['name' => 'الاقصر', 'name_en' => 'Luxor', 'governorate_id' => $luxorId],
            ['name' => 'الزينية', 'name_en' => 'Al Zainia', 'governorate_id' => $luxorId],
            ['name' => 'البياضية', 'name_en' => 'Al Bayadia', 'governorate_id' => $luxorId],
            ['name' => 'ارمنت', 'name_en' => 'Armant', 'governorate_id' => $luxorId],
            ['name' => 'اسنا', 'name_en' => 'Esna', 'governorate_id' => $luxorId],
        ];

        foreach ($districts as $district) {
            District::factory()->create($district);
        }
    }
}
