<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('protocolo_uuid', 40)->nullable();
            $table->integer('usuarios_id')->index('FK_protocolos_usuarios');
            $table->timestamp('protocolo_criado_em')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('empresas_id')->index('fk_proptocolos_empresas');
            $table->integer('protocolosstatus_id')->index('fk_protocolos_protocolosstatus');
            $table->string('protocolo_nome', 200)->nullable();
            $table->binary('protocolo_obs', 65535)->nullable();
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
        Schema::drop('protocolos');
    }
}
