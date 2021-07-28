<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Enseignant::factory(20)->create();
        \App\Models\Classe::factory(4)->create();
        \App\Models\Etudiant::factory(20)->create();
        \App\Models\Stage::factory(20)->create();
    }   
}
