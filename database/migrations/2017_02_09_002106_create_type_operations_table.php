<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('operations', function (Blueprint $table) {
            $table->integer('type_operation_id')->unsigned();
            $table->foreign('type_operation_id')->references('id')->on('type_operations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_operations');
        Schema::table('operations', function (Blueprint $table) {
            $table->dropColumn('type_operation_id');
        });
    }
}
