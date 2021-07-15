<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 45)->nullable(false);
            $table->string('annee', 45)->nullable(false);
            $table->string('niveau', 45)->nullable(false);
            $table->biginteger('enseignant_id')->unsigned()->nullable(true);
            ## -- CLE ETRANGERE D ENSEIGNANT --## 
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
