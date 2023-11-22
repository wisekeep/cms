<?php

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empresa::class, 8)->create();
    }
}
