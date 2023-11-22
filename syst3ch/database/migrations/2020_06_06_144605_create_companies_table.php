<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->uuid('company_uuid')->unique('uk_company_uuid');
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
        Schema::dropIfExists('companies');
    }
}
