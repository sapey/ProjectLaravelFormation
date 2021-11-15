<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{

    protected $model = Formation::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence(100),
            'type' => $this->faker->sentence,
            'price' => mt_rand(),
            'picture' => $this->faker->imageUrl,
            'cours' => $this->faker->sentence(200)
        ];
    }
}
