<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->uuid('profile_uuid')->nullable();
            $table->longText('profile_image')->nullable();
            $table->string('profile_cpf', 40)->nullable();
            $table->string('profile_rg', 40)->nullable();
            $table->string('profile_rg_emissor', 40)->nullable();
            $table->string('profile_endereco')->nullable();
            $table->string('profile_numero', 40)->nullable();
            $table->string('profile_bairro', 40)->nullable();
            $table->string('profile_cidade', 40)->nullable();
            $table->string('profile_estado', 2)->nullable();
            $table->string('profile_pais', 40)->nullable();
            $table->string('profile_cep', 10)->nullable();
            $table->string('profile_fone1', 15)->nullable();
            $table->string('profile_fone2', 15)->nullable();
            $table->string('profile_fone3', 15)->nullable();
            $table->string('profile_fone4', 15)->nullable();
            $table->longText('profile_obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // Relacionamento
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('RESTRICT')
                ->onDelete('RESTRICT');
            $table->unique('profile_uuid');
        });
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
