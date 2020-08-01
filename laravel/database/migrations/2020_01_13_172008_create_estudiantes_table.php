<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipo_doc');
            $table->string('num_doc');
            $table->date('fecha_nac');
            $table->string('lugar_nac');
            $table->string('estrato')->nullable();
            $table->string('direccion');
            $table->string('eps')->nullable();
            $table->string('zona')->nullable();
            $table->string('tipo_san')->nullable();
            $table->string('genero')->nullable();
            $table->string('desplazado')->nullable();           
            $table->string('folio');
            $table->string('tiempo_sin_estudiar');         
            $table->string('estado')->default();
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
        Schema::dropIfExists('estudiantes');
    }
}
