<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('id_materia')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_maestro')->references('id')->on('maestros')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('capacitacion');
    }
}
