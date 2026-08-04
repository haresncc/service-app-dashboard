<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Governorate::factory(['name' => 'اسوان', 'name_en' => 'Aswan'])->create();
        Governorate::factory(['name' => 'الاقصر', 'name_en' => 'Luxor'])->create();
    }
}
