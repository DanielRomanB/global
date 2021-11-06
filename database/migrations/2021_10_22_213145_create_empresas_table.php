<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //nombre de empresa
            $table->string('ruc')->unique(); //ruc
            // $table->string('url'); //url de destino para el dyndns

            $table->string('usuario_sunat')->nullable(); //estado
            $table->string('contrasena_sunat')->nullable(); //estado
            $table->boolean('estado_create_user_sunat')->default('0'); //estado desactivo

            $table->string('certificado')->nullable(); //estado
            $table->string('contrasena_certi')->nullable(); //estado
            $table->boolean('estado_certificado')->default('0'); //estado desactivo

            $table->boolean('estado_duplicado')->default('0'); //estado
            $table->boolean('estado')->default('0'); //estado desactivo
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
        Schema::dropIfExists('empresas');
    }
}
