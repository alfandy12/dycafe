<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'level' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'level' => 'user',
            'username' => 'user',
            'password' => Hash::make('12345678'),
        ]);
    }
}
