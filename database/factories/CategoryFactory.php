<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'collect_id' => \App\Models\Collect::inRandomOrder()->first()->id,
            'name' => $this->faker->realText(20),
            'slug' => $this->faker->realText(20),
            'description' => $this->faker->realText(50),
            'status' => $this->faker->boolean(50),
        ];
    }
}
