<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('id');            
           
            $table->bigInteger('ciclo_id')->unsigned();
            $table->foreign('ciclo_id')->references('id')->on('ciclos')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')
            ->onDelete('cascade')->onUpdate('cascade');        

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            
            
            $table->date('fecha_entrega');
            $table->string('link_video')->nullable();
            $table->string('link_opcional')->nullable();
            $table->string('observaciones');
            $table->string('estado')->default('ACTIVO');
           
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
        Schema::dropIfExists('actividades');
    }
}
