<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('id', true);
			$table->uuid('uuid');
			$table->boolean('ativa');
			$table->string('fantasia');
			$table->string('social');
			$table->string('cnpj_cpf')->nullable();
			$table->string('email');
			$table->text('obs')->nullable();
			$table->text('file')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
		DB::statement('ALTER TABLE empresas ALTER COLUMN uuid SET DEFAULT uuid_generate_v4();');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas');
	}
}
