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
                ['name' => 'أسوان', 'name_en' => 'Aswan', 'latitude' => '24.091071', 'longitude' => '32.897306'],
                ['name' => 'السيل', 'name_en' => 'Al Sel', 'latitude' => '24.08530409315538', 'longitude' => '32.91297374092284'],
                ['name' => 'صحاري', 'name_en' => 'Sahari', 'latitude' => '23.98064786094362', 'longitude' => '32.84446142421406'],
                ['name' => 'نجع المحطه', 'name_en' => 'Naja Mahta', 'latitude' => '24.066925665673768', 'longitude' => '32.88553184207255'],
                ['name' => 'حكروب', 'name_en' => 'Hakrob', 'latitude' => '24.096229056340103', 'longitude' => '32.911691281622005'],
                ['name' => 'اطلس', 'name_en' => 'Atlas', 'latitude' => '24.10387678370946', 'longitude' => '32.902392292190974'],
                ['name' => 'ابوسمبل', 'name_en' => 'Abusimbel', 'latitude' => '22.3371195', 'longitude' => '31.6257973'],
            ],
            'دراو' => [
                ['name' => 'دراو', 'name_en' => 'Drau', 'latitude' => '24.398987', 'longitude' => '32.9198035'],
            ],
            'كوم امبو' => [
                ['name' => 'كوم امبو', 'name_en' => 'Kom Ombo', 'latitude' => '24.4762478', 'longitude' => '32.9495225'],
                ['name' => 'السبعين', 'name_en' => 'Al Sabeen', 'latitude' => '24.483758459576975', 'longitude' => '32.947202087758704'],
                ['name' => 'نجاجره', 'name_en' => 'Nagagra', 'latitude' => '24.46850957565555', 'longitude' => '32.94235802009507'],
                ['name' => 'عتمور', 'name_en' => 'Atmor', 'latitude' => '24.524324391812254', 'longitude' => '32.997480049526594'],
                ['name' => 'زمالك', 'name_en' => 'Zamalek', 'latitude' => '24.53092937052126', 'longitude' => '33.0201120907758'],
            ],
            'نصر النوبه' => [
                ['name' => 'دار السلام', 'name_en' => 'DarElsalam', 'latitude' => '24.39083483765163', 'longitude' => '32.930098638055746'],
                ['name' => 'بلانه', 'name_en' => 'Blana', 'latitude' => '24.358773829604605', 'longitude' => '32.94042938759557'],
                ['name' => 'اندان', 'name_en' => 'Adendan', 'latitude' => '24.39277523639977', 'longitude' => '32.975586223395425'],
                ['name' => 'قسطل', 'name_en' => 'Qostol', 'latitude' => '24.401958261460532', 'longitude' => '33.018471741661415'],
                ['name' => 'توماس وعافيه', 'name_en' => 'TomasAfya', 'latitude' => '24.400478706860955', 'longitude' => '33.02184498880622'],
                ['name' => 'ابو-سمبل', 'name_en' => 'AboSembel', 'latitude' => '24.407651685789375', 'longitude' => '33.031581899893716'],
                ['name' => 'توشكي', 'name_en' => 'Toshka', 'latitude' => '24.41426475346475', 'longitude' => '33.039985657692526'],
                ['name' => 'خريت', 'name_en' => 'Kherit', 'latitude' => '24.46099674838996', 'longitude' => '33.074014546957166'],
                ['name' => 'ارمنا', 'name_en' => 'Armena', 'latitude' => '24.459691101449508', 'longitude' => '33.058066131682395'],
                ['name' => 'عنيبه', 'name_en' => 'Aniba', 'latitude' => '24.459267145554417', 'longitude' => '33.049427406741884'],
                ['name' => 'مصمصص', 'name_en' => 'Masmas', 'latitude' => '24.456699168751303', 'longitude' => '33.02281707314053'],
                ['name' => 'ابريم', 'name_en' => 'Ibrim', 'latitude' => '24.48406841767503', 'longitude' => '33.02371237408411'],
                ['name' => 'جنينه', 'name_en' => 'Genina', 'latitude' => '24.516479706896607', 'longitude' => '33.03695324171584'],
                ['name' => 'قته', 'name_en' => 'Qata', 'latitude' => '24.52575831678791', 'longitude' => '33.03675492829236'],
                ['name' => 'در', 'name_en' => 'Dir', 'latitude' => '24.531127230456587', 'longitude' => '33.035822346829065'],
                ['name' => 'ديوان', 'name_en' => 'Diwan', 'latitude' => '24.534714332234863', 'longitude' => '33.03544931424376'],
                ['name' => 'ناصر', 'name_en' => 'Naser', 'latitude' => '24.5308182', 'longitude' => '33.0418676'],
                ['name' => 'مالكي', 'name_en' => 'Malki', 'latitude' => '24.53915501337798', 'longitude' => '33.05565847262375'],
                ['name' => 'كلابشه', 'name_en' => 'Kalabsha', 'latitude' => '24.630508185453813', 'longitude' => '32.947150228811125'],
            ],
            'ادفو' => [
                ['name' => 'ادفو مركز', 'name_en' => 'Edfu Center', 'latitude' => '24.980278', 'longitude' => '32.8747219'],
                ['name' => 'رمادي', 'name_en' => 'Ramadi', 'latitude' => '24.793874443773973', 'longitude' => '32.90992443760559'],
                ['name' => 'الرديسيه', 'name_en' => 'AlRadesia', 'latitude' => '24.965153080465114', 'longitude' => '32.90733582735'],
                ['name' => 'كلح', 'name_en' => 'Kalah', 'latitude' => '25.037249442192625', 'longitude' => '32.850426843036416'],
                ['name' => 'بصيله', 'name_en' => 'Basila', 'latitude' => '25.103413031921125', 'longitude' => '32.7926647463841'],
                ['name' => 'سلايمه', 'name_en' => 'Salaima', 'latitude' => '25.021610808595817', 'longitude' => '32.86625770586813'],
            ],
            // 'الاقصر' => [
            //     ['name' => 'الاقصر', 'name_en' => 'Luxor'],
            //     ['name' => 'كرنك', 'name_en' => 'Karnak'],
            //     ['name' => 'الطيبة', 'name_en' => 'Al Tayba'],
            // ],
            // 'الزينية' => [
            //     ['name' => 'الزينية', 'name_en' => 'Al Zainia'],
            //     ['name' => 'الحسينات', 'name_en' => 'Al Hussienat'],
            // ],
            // 'البياضية' => [
            //     ['name' => 'البياضية', 'name_en' => 'Al Bayadia'],
            //     ['name' => 'الضبعية', 'name_en' => 'Al Dabia'],
            // ],
            // 'ارمنت' => [
            //     ['name' => 'ارمنت', 'name_en' => 'Armant'],
            //     ['name' => 'الرزيقات', 'name_en' => 'Al Raziqat'],
            // ],
            // 'اسنا' => [
            //     ['name' => 'اسنا', 'name_en' => 'Esna'],
            //     ['name' => 'الكلابية', 'name_en' => 'Al Kalabia'],
            // ],
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
                    'latitude' => $city['latitude'],
                    'longitude' => $city['longitude'],
                ]);
            }
        }
    }
}
