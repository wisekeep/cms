<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {

            User::create([
                'name'           => 'Administrador',
                'email'          => 'admin@admin.br',
                'email_verified_at' => now(),
                'password'       => bcrypt('12345678'),
                'remember_token' => Str::random(10)
            ]);
            User::create([
                'name'           => 'Gerente',
                'email'          => 'manager@manager.br',
                'email_verified_at' => now(),
                'password'       => bcrypt('12345678'),
                'remember_token' => Str::random(10)
            ]);
            User::create([
                'name'           => 'Usuário',
                'email'          => 'user@user.br',
                'email_verified_at' => now(),
                'password'       => bcrypt('12345678'),
                'remember_token' => Str::random(10)
            ]);
        }
        factory(User::class, 7)->create();
    }
}
