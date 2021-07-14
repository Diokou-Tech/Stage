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
        // \App\Models\User::factory(10)->create();
        \App\Models\Enseignant::factory(10)->create();
        \App\Models\Classe::factory(10)->create();
        \App\Models\Etudiant::factory(10)->create();
    }
}
