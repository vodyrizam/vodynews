<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::insert([
            ['name'=>'admin'],
            ['name'=>'penulis'],
            ['name'=>'validator'],
        ]);

        User::create([
            'name'=>'Admin',
            'email'=>'admin@mail.com',
            'password'=>bcrypt('password'),
            'role_id'=>1
        ]);

        User::create([
            'name'=>'Penulis',
            'email'=>'penulis@mail.com',
            'password'=>bcrypt('password'),
            'role_id'=>2
        ]);

        User::create([
            'name'=>'Validator',
            'email'=>'validator@mail.com',
            'password'=>bcrypt('password'),
            'role_id'=>3
        ]);
    }
}
