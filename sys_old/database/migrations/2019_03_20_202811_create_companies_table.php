<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->uuid('companie_uuid')->nullable();
            $table->boolean('companie_ativa')->default(1);
            $table->string('companies_nome_fantasia')->nullable();
            $table->string('companie_razao_social');
            $table->string('companie_insc_cnpj_cpf');
            $table->longText('companie_obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique('companie_insc_cnpj_cpf');
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
