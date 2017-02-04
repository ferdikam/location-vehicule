<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('modele_id')->unsigned();
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->string('immatriculation')->unique();
            $table->decimal('kilometrage');
            $table->string('etat');
            $table->decimal('puissance')->nullable();
            $table->decimal('poids_vide')->nullable();
            $table->integer('places');
            $table->dateTime('date_arrivee')->nullable();
            $table->string('transmission');
            $table->string('carburant');
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
        Schema::dropIfExists('vehicules');
    }
}
