<?php

use Illuminate\Database\Seeder;
use App\Companie;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Companie::class, 8)->create();
    }
}
