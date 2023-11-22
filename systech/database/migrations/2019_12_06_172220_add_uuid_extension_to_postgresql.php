<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class AddUuidExtensionToPostgresql extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (env('DB_CONNECTION') == 'pgsql') {
            DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
            DB::statement('ALTER TABLE empresas ALTER COLUMN uuid SET DEFAULT uuid_generate_v4();');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement('DROP EXTENSION IF EXISTS "uuid-ossp";');
    }
}
