<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'saldo' => 4950000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
