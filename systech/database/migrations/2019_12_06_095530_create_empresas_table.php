<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique('uk_empresa_uuid');
            $table->boolean('ativa')->default(1);
            $table->string('fantasia')->nullable();
            $table->string('social');
            $table->string('cnpj_cpf')->unique();
            $table->string('email')->unique('uk_empresa_email');
            $table->longText('obs')->nullable();
            $table->binary('arquivos')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // Índeces e Foreign Keys
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
