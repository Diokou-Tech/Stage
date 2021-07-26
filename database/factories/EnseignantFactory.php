<?php

namespace Database\Factories;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnseignantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enseignant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricule' => $this->faker->randomDigitNotNull(),
            'prenom' => $this->faker->lastName,
            'nom' => $this->faker->name,
            'email' => $this->faker->email,
            'portable' => 00033345645,
            'user_id' => random_int(1,10)
        ];
    }
}
