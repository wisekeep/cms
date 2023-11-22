<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admim',
            'email' => 'admin@admin.br',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@user.br',
            'password' => bcrypt('12345678'),
        ]);
        factory(App\User::class, 8)->create();
    }
}
