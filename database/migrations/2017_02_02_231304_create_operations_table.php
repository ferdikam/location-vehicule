<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vehicule_id')->unsigned();
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');

            //$table->string('name');
            $table->dateTime('date');
            $table->string('montant');
            $table->boolean('validated')->default(0);
            $table->dateTime('date_next')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('operations');
    }
}
