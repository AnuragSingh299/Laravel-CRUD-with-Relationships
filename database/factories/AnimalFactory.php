<?php

namespace Database\Factories;
use app\Models\Animal;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Animal::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->text,
        ];
    }
}
