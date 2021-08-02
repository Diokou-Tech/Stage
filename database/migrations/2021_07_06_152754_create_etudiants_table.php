<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule', 45)->nullable(false);
            $table->string('prenom', 45)->nullable(false);
            $table->string('nom', 45)->nullable(false);
            // $table->string('sexe', 10)->nullable(false);
            $table->string('email')->unique('email');
            $table->string('portable', 45)->nullable(true);

            ##-- CLES ETRANGERES --##
            $table->biginteger('classe_id')->unsigned()->nullable(true);
            $table->biginteger('user_id')->unsigned()->nullable(true);
            $table->timestamps();
            ##-- REFERENCE DE CLE ETRANGERE --##
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
