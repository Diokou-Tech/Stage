<?php

namespace Database\Factories;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClasseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'matricule' => $this->faker->randomDigitNotNull(),
            'prenom' => $this->faker->lastName,
            'nom' => $this->faker->name,
            'sexe' => $this->faker->randomLetter(),
            'code_postal' => $this->faker->postcode,
            
            'id',
            'nom',
            'niveau',
            'annee',
            'enseignant_id',
        ];
    }
}
