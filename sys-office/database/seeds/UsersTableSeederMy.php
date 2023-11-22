<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeederMy extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.br',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Usuário',
            'email' => 'user@user.br',
            'password' => bcrypt('12345678'),
        ]);
        factory(App\User::class, 7)->create();
    }
}
