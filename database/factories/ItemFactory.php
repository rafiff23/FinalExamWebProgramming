<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_name' => fake()->name(),
            'item_desc' => collect(fake()->paragraphs(1))->map(
                fn ($p) => "<p>$p</p>"
            )->implode(''),
            'price' => mt_rand(10,15)*100
        ];
    }
}
