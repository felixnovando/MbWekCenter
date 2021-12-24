<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'gender' => 'Female',
            'role' => 'Admin',
            'remember_token' => Str::random(10)
        ]);
        DB::table('users')->insert([
            'name' => 'felix',
            'email' => 'felix@gmail.com',
            'password' => Hash::make('felix'),
            'gender' => 'Male',
            'role' => 'Customer',
            'remember_token' => Str::random(10)
        ]);
        DB::table('users')->insert([
            'name' => 'edric',
            'email' => 'edric@gmail.com',
            'password' => Hash::make('edric'),
            'gender' => 'Male',
            'role' => 'Customer',
            'remember_token' => Str::random(10)
        ]);
    }
}
