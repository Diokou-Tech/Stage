<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

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
            'sexe' => $this->faker->randomLetter(),
            'code_postal' => $this->faker->postcode,
            'portable' => 00336544233232,
            'email' => $this->faker->email,
            'adresse' => $this->faker->city,
            'portable' => 00033345645,
            'classe_id' => random_int(1,10)
        ];
    }
}
