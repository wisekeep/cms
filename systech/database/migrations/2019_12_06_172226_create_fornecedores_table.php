<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique('uk_fornecedor_uuid');
            $table->string('social');
            $table->enum('fornecedor', ['PJ', 'PF', 'OUTRO'])->default('PJ');
            $table->timestamp('inclusao')->useCurrent();
            $table->string('cnpj_cpf')->nullable();
            $table->string('estadual')->nullable();
            $table->string('municipal')->nullable();
            $table->string('email')->unique('uk_fornecedor_email');
            $table->string('endereco', 200)->nullable();
            $table->string('numero', 40)->nullable();
            $table->string('fone1', 15)->nullable();
            $table->string('fone2', 15)->nullable();
            $table->string('fone3', 15)->nullable();
            $table->longText('obs')->nullable();
            $table->longText('file')->nullable();
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
        Schema::dropIfExists('fornecedores');
    }
}
