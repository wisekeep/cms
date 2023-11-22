<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoqueTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uuid');
            $table->integer('empresa')->nullable()->index('fk_estoque_empresa_idx');
            $table->string('codigo');
            $table->string('EAN')->nullable();
            $table->boolean('ativo')->default(1);
            $table->string('item');
            $table->integer('quantidate_anterior')->default(0);
            $table->integer('quantidate_atual')->default(0);
            $table->dateTime('ultima_compra')->nullable();
            $table->dateTime('ultima_venda')->nullable();
            $table->integer('fornecedor')->nullable();
            $table->binary('obs')->nullable();
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
        Schema::drop('estoque');
    }
}
