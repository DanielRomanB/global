<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTableSisFactuacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sis_facturacion', function (Blueprint $table) {
            $table->string('api_remision_id')->nullable()->after('contrasena_sunat'); //remision id
            $table->string('api_remision_key')->nullable()->after('api_remision_id'); //remision clave o key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
