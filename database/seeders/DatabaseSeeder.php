<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Governorate;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            GovernorateSeeder::class,
            DistrictSeeder::class,
            CitySeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            UserSeeder::class,
            // ServiceSeeder::class,
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Governorate::factory(10)->create();

        // District::factory()
        //     ->recycle(Governorate::all())
        //     ->count(20)
        //     ->create();

        // City::factory()
        //     ->recycle(District::all())
        //     ->count(50)
        //     ->create();

        // Category::factory(10)->create();

        // SubCategory::factory()
        //     ->recycle(Category::all())
        //     ->count(20)
        //     ->create();

        // Service::factory()
        //     ->recycle(Category::all())
        //     ->count(50)
        //     ->create();
    }
}
