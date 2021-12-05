<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->nullable();
            $table->string('paterno', 50)->nullable();
            $table->string('materno', 50)->nullable();
            $table->integer('edad')->nullable();
            $table->string('sexo', 10)->nullable();
            $table->string('edo_civil', 20)->nullable();
            $table->string('curp', 20)->nullable();
            $table->string('origen', 40)->nullable();
            $table->string('ocupacion', 255)->nullable();
            $table->string('domicilio', 255)->nullable();
            $table->string('num_ext', 30)->nullable();
            $table->string('num_int', 30)->nullable();
            $table->string('colonia', 30)->nullable();
            $table->string('tel1', 20)->nullable();
            $table->string('tel2', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
