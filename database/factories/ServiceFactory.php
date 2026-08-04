<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => fn(array $attributes) => Str::slug($attributes["name"]),
            'image' => null,
            'phone_number' => fake()->numerify('011########'),
            'phone_number2' => fake()->numerify('012########'),
            'information' => json_encode([
                'theme' => fake()->randomElement(['light', 'dark']),
                'notifications' => fake()->boolean(),
                'language' => fake()->languageCode(),
            ]),
            'sub_category_id' => SubCategory::factory(),
            'city_id' => City::factory(),
        ];
    }
}
