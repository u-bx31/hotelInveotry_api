<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => Str::random(),
            'price' => fake()->numberBetween(20, 1000),
            'rating' => fake()->randomFloat(1, 0, 5),
            'availability' => fake()->boolean(),
            'room_types_id' => function () {
                return RoomType::all()->random()->id;
            }
        ];
    }
}
