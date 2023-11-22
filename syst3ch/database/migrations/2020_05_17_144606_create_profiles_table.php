<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('profile_id', 'pk_profile_id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_profiles_users')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('profile_uuid')->unique('uk_profile_uuid');
            $table->longText('imagem')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('rg_emissor')->nullable();
            $table->date('data_aviversario');
            $table->string('email_alternativo')->unique('uk_email_alternativo');
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('cep')->nullable();
            $table->string('fone1')->nullable();
            $table->string('fone2')->nullable();
            $table->string('fone3')->nullable();
            $table->string('fone4')->nullable();
            $table->longText('obs')->nullable();
            $table->longText('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        if (env('DB_CONNECTION') == 'pgsql') {
            DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
            DB::statement('ALTER TABLE profiles ALTER COLUMN profile_uuid SET DEFAULT uuid_generate_v4();');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
