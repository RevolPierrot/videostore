<?php

namespace Database\Factories;

use App\Models\Todos;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //faker gibt zufälligen Testwert
            'text' => $this->faker->text(50),
            'done' => $this->faker->boolean,
            'created_at' => now()
        ];
    }
}
