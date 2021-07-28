<?php

namespace Database\Factories;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;

class StageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entreprise' => $this->faker->company,
            'secteur_activite' => $this->faker->lastName,
            'lieu' => $this->faker->word(2),
            'theme' => $this->faker->word(250), 
            'tuteur_entreprise' => $this->faker->firstName, 
            'tuteur_entreprise_tel' => $this->faker->numberBetween(2789,456789), 
            'tuteur_entreprise_email' => $this->faker->email, 
            'date_debut' => $this->faker->date(), 
            'date_fin' => $this->faker->date, 
            'fiche' => 'fiche_test.pdf',
            'signe' => random_int(1,20) > 10 ? false : true ,
            'voeux_ens1'=> random_int(1,20) ,
            'voeux_ens2' => random_int(1,20),
            'voeux_ens3' => random_int(1,20),
            'etudiant_id' => random_int(1,20),
            'enseignant_id' => random_int(1,20) > 10 ? null :random_int(1,20),
            'classe_id' => random_int(1,4),
        ];
    }
}
