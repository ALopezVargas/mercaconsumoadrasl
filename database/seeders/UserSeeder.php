<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make("admin"),
            'tipo'=>1
        ]);
        User::create([
            'name'=>'Usuario',
            'email'=>'usuario@usuario.com',
            'password'=>Hash::make('usuario'),
            'email_verified_at'=>now()
        ]);
    }
}
