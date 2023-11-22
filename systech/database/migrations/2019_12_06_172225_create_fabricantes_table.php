<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFabricantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabricantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique('uk_fabricante_uuid');
            $table->string('fantasia');
            $table->string('social');
            $table->string('cnpj_cpf');
            $table->string('email')->unique('uk_fabricante_email');
            $table->string('site')->nullable();
            $table->longText('obs')->nullable();
            $table->longText('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement('ALTER TABLE fabricantes ALTER COLUMN uuid SET DEFAULT uuid_generate_v4();');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fabricantes');
    }
}
